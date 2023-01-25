<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\User;
use Carbon\Carbon;

class WatzapController extends Controller
{
    //
    public function convertPhoneNumber($nohp)
    {
        $hp = null;
        // kadang ada penulisan no hp 0811 239 345
        $nohp = str_replace(" ", "", $nohp);
        // kadang ada penulisan no hp (0274) 778787
        $nohp = str_replace("(", "", $nohp);
        // kadang ada penulisan no hp (0274) 778787
        $nohp = str_replace(")", "", $nohp);
        // kadang ada penulisan no hp 0811.239.345
        $nohp = str_replace(".", "", $nohp);

        // cek apakah no hp mengandung karakter + dan 0-9
        if (!preg_match('/[^+0-9]/', trim($nohp))) {
            // cek apakah no hp karakter 1-3 adalah +62
            if (substr(trim($nohp), 0, 3) == '+62') {
                $hp = trim($nohp);
            }
            // cek apakah no hp karakter 1 adalah 0
            elseif (substr(trim($nohp), 0, 1) == '0') {
                $hp = '62' . substr(trim($nohp), 1);
            }
        }
        return $hp;
    }

    public function getActiveUserByProvince($provinceId, $total)
    {
        $province = Province::findOrFail($provinceId);

        $content = "nama,no_hp,email";
        $content .= "\n";

        $users = User::
            // where expired_at > Carbon::now()
            where('expired_at', '>', Carbon::now())
            ->whereHas('profile', function ($query) use ($province) {
                $query->where('province_id', $province->id);
            })
            ->with('profile')
            ->paginate($total ?? 50);

        foreach ($users as $u => $user) {
            # code...
            $user->profile->contact = $this->convertPhoneNumber($user->profile->contact);
            $name = $user->name;
            $contact = $user->profile->contact;

            if ($contact) {
                $name = str_replace(",", " ", $name);
                $name = str_replace(".", " ", $name);
                $content .= "$name,$contact,$user->email";
                $content .= "\n";
            }
        }

        // file name that will be used in the download
        $fileName = "watzap_user_active_$province->name.txt";

        // use headers in order to generate the download
        $headers = [
            'Content-type' => 'text/plain',
            'Content-Disposition' => sprintf('attachment; filename="%s"', $fileName),
        ];
        // make a response, with the content, a 200 response code and the headers
        return response()->make($content, 200, $headers);
    }

    public function getActiveUsers($total, $startDate, $toDate)
    {
        // ambil data user yang aktif yang punya payment 35000 dan rentang tanggal created_at nya antara startDate dan toDate
        $content = "nama,no_hp,email";
        $content .= "\n";

        $user = User::has('profile')->with('profile')
            ->join('payments', 'users.id', '=', 'payments.user_id')
            ->where('payments.value', '=', 35000)
            ->where('payments.created_at', '>=', $startDate)
            ->where('payments.created_at', '<=', $toDate)
            ->select('users.*', 'payments.created_at as payment_created_at', 'payments.value as payment_value')
            ->orderBy('payment_created_at', 'desc')
            ->paginate($total ?? 50);
        foreach ($user as $u => $user) {
            # code...
            $user->profile->contact = $this->convertPhoneNumber($user->profile->contact);
            $name = $user->name;
            $contact = $user->profile->contact;
            if ($contact) {
                $name = str_replace(",", " ", $name);
                $name = str_replace(".", " ", $name);
                $date = $user->payment_created_at;
                $content .= "$name,$contact,$user->email";
                $content .= "\n";
            }
        }
        // file name that will be used in the download
        $fileName = "watzap_user_active.txt";
        // use headers in order to generate the download
        $headers = [
            'Content-type' => 'text/plain',
            'Content-Disposition' => sprintf('attachment; filename="%s"', $fileName),
        ];
        // make a response, with the content, a 200 response code and the headers
        return response()->make($content, 200, $headers);
    }

    public function info()
    {
        $expired = User::where('expired_at', '>', Carbon::now())->count();
        $active = User::where('expired_at', '<', Carbon::now())->count();
        $total = User::count();
        $data = [
            'expired' => $expired,
            'active' => $active,
            'total' => $total,
        ];
        return response()->json($data);
    }
}
