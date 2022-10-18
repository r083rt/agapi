<?php
namespace App\Helper;

use App\Models\User;

class Membership
{

    // perpanjang user_expired_at berdasarkan user_id
    public static function renew($user_id, $days)
    {
        $user = User::find($user_id);
        // expired ditambah 1
        $user->expired_at = now()->addDays($days);
        $user->save();
    }

    // tambah masa aktif
    public static function add($user_id, $days)
    {
        $user = User::find($user_id);
        $user->expired_at = \Carbon\Carbon::parse($user->expired_at)->addDays($days);

        $user->save();
    }

    // cek apakah user masih aktif
    public static function isActive($user_id)
    {
        $user = User::find($user_id);
        if ($user->expired_at > now()) {
            return true;
        } else {
            return false;
        }
    }

}
