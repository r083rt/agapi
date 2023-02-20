<?php

namespace App\Http\Controllers\API\v2\admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class Kongres2022Controller extends Controller
{
    public $member;

    public function __construct()
    {
        $this->member = User::whereNotNull('user_activated_at')->whereHas('role', function ($query) {
            $query->whereIn('id', [2, 7, 9, 10, 11]);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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

    public function searchMember($keyword)
    {
        $members = $this->member
            // ->where('name', 'like', '%' . $keyword . '%')
            // ->orWhere('email', 'like', '%' . $keyword . '%')
            // ->orWhere('kta_id', 'like', '%' . $keyword . '%')
            // nested where
            ->where(function ($query) use ($keyword) {
                $query
                    ->where('name', 'like', '%' . $keyword . '%')
                    ->orWhere('email', 'like', '%' . $keyword . '%')
                    ->orWhere('kta_id', 'like', '%' . $keyword . '%');
            })
            ->withCount(['payments as is_paid_kongres_panitia' => function ($query) {
                $query
                    ->where('status', 'success')
                    ->where('payment_id', 3642); // untuk panitia
            }])
            ->withCount(['payments as is_paid_kongres_peserta' => function ($query) {
                $query
                    ->where('status', 'success')
                    ->where('payment_id', 3643); // untuk peserta
            }])
            ->withCount(['payments as is_paid_kongres_partisipan' => function ($query) {
                $query
                    ->where('status', 'success')
                    ->where('payment_id', 3644); // untuk partisipan
            }])
            ->paginate();
        return response()->json($members);
    }

    public function addMemberPayment($id, $key)
    {
        $kongresId = null;
        $price = null;
        if ($key == 'panitia') {
            $kongresId = 3642;
            $price = 1350000;
        } else if ($key == 'peserta') {
            $kongresId = 3643;
            $price = 1350000;
        } else if ($key == 'partisipan') {
            $kongresId = 3644;
            $price = 200000;
        }
        $member = User::findOrFail($id);
        $payment = new Payment([
            'payment_type' => 'App\Models\Event',
            'payment_id' => $kongresId,
            'key' => 'pembayaran_acara',
            'status' => 'success',
            'value' => $price,
            'type' => 'IN',
            'note' => 'Pembayaran manual oleh admin',
        ]);
        $member->payments()->save($payment);

        $expired_at = $member->user_activated_at->addMonths(6);

        if ($expired_at < now()) {
            $member->user_activated_at = date('Y-m-d H:i:s');
            $member->expired_at = date('Y-m-d H:i:s', strtotime('+6 months'));
            $member->save();
        } else {
            $member->user_activated_at = date('Y-m-d H:i:s', strtotime($member->user_activated_at . ' +6 months'));
            $member->expired_at = date('Y-m-d H:i:s', strtotime($member->expired_at . ' +6 months'));
            $member->save();
        }

        return response()->json(
            $member->loadCount([
                'payments as is_paid_kongres_panitia' => function ($query) {
                    $query
                        ->where('status', 'success')
                        ->where('payment_id', 3642); // untuk panitia
                }
            ])
                ->loadCount(['payments as is_paid_kongres_peserta' => function ($query) {
                    $query
                        ->where('status', 'success')
                        ->where('payment_id', 3643); // untuk peserta
                }])
                ->loadCount(['payments as is_paid_kongres_partisipan' => function ($query) {
                    $query
                        ->where('status', 'success')
                        ->where('payment_id', 3644); // untuk partisipan
                }])
        );
    }

    public function rollbackPayment($id, $key)
    {
    }
}
