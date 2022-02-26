<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.user.index');
    }
    public function index2()
    {
        return view('pages.user2.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function accountarea()
    {
        return view('pages.accountarea.index');
    }

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

    public function perpanjang($total)
    {
        $content = "";
        $content .= "\n";
        $users = User::where('user_activated_at', '<', (new \Carbon\Carbon)->submonths(6))
            ->has('profile')
            ->with('profile', 'pns_status')
            ->orderBy('created_at', 'desc')
            ->paginate($total ?? 50);
        foreach ($users as $u => $user) {
            # code...
            $user->profile->contact = $this->convertPhoneNumber($user->profile->contact);
            $user->late_paid = Carbon::parse(Carbon::now())->diffInMonths(Carbon::parse($user->user_activated_at));
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
        $fileName = "watzap_perpanjang.txt";

        // use headers in order to generate the download
        $headers = [
            'Content-type' => 'text/plain',
            'Content-Disposition' => sprintf('attachment; filename="%s"', $fileName),
        ];
        // make a response, with the content, a 200 response code and the headers
        return response()->make($content, 200, $headers);

    }

    public function guruPns($total)
    {
        $content = "";
        $content .= "\n";
        $users = User::
            has('profile')
            ->with('profile', 'pns_status')
            ->whereHas('pns_status', function ($query) {
                $query->where('is_pns', 1);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($total ?? 50);
        foreach ($users as $u => $user) {
            # code...
            $user->profile->contact = $this->convertPhoneNumber($user->profile->contact);
            $user->late_paid = Carbon::parse(Carbon::now())->diffInMonths(Carbon::parse($user->user_activated_at));
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
        $fileName = "watzap_guruPns.txt";

        // use headers in order to generate the download
        $headers = [
            'Content-type' => 'text/plain',
            'Content-Disposition' => sprintf('attachment; filename="%s"', $fileName),
        ];
        // make a response, with the content, a 200 response code and the headers
        return response()->make($content, 200, $headers);

    }

    public function guruNonPns($total)
    {
        $content = "";
        $content .= "\n";

        $users = User::has('profile')
            ->with('profile', 'pns_status')
            ->whereHas('pns_status', function ($query) {
                $query->where('is_pns', 0);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($total ?? 50);
        foreach ($users as $u => $user) {
            # code...
            $user->profile->contact = $this->convertPhoneNumber($user->profile->contact);
            $user->late_paid = Carbon::parse(Carbon::now())->diffInMonths(Carbon::parse($user->user_activated_at));
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
        $fileName = "watzap_guruNonPns.txt";

        // use headers in order to generate the download
        $headers = [
            'Content-type' => 'text/plain',
            'Content-Disposition' => sprintf('attachment; filename="%s"', $fileName),
        ];
        // make a response, with the content, a 200 response code and the headers
        return response()->make($content, 200, $headers);

    }

    public function userreport2()
    {
        $users = User::where('user_activated_at', '<', (new \Carbon\Carbon)->submonths(6))
            ->has('profile')
            ->with('profile', 'pns_status')
            ->paginate();
        foreach ($users as $u => $user) {
            # code...
            $user->profile->contact = $this->convertPhoneNumber($user->profile->contact);
            $user->late_paid = Carbon::parse(Carbon::now())->diffInMonths(Carbon::parse($user->user_activated_at));
        }
        // return response()->json($users);
        // dd($users->data);
        return view('pages.userreport2.index', ['users' => $users]);
    }

    public function getrandomavatar()
    {
        $user = User::where('avatar', '!=', 'users/default.png')->where('avatar', '!=', '/users/default.png')->get()->random(1)->first()->avatar;
        // return response()->json($user);
        return response(Storage::disk('public')->get($user))->header('Content-Type', 'image/png');
    }
}
