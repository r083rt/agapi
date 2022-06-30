<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $guarded = ['id'];

    protected $appends = ['is_paid'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function author()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function event_guests()
    {
        return $this->hasMany('App\Models\EventGuest');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'event_guests')->withPivot('created_at')->withTimestamps()->orderBy('created_at', 'desc');
    }

    public function payments()
    {
        return $this->morphMany('App\Models\Payment', 'payment');
    }

    public function getIsPaidAttribute()
    {
        return $this->payments()->where('status', 'success')->count() > 0;
    }

    public function partisipants()
    {
        return $this->belongsToMany('App\Models\User', 'event_guests')->withPivot('created_at')->withTimestamps()->orderBy('created_at', 'desc');
    }

    // users yang sudah melakukan pembayaran dan sukses dikatakan telah terdaftar
    public function registered_users()
    {
        return $this->belongsTomany('App\Models\User', 'payments', 'payment_id', 'user_id')->where('status', 'success')->where('payment_type', 'App\Models\Event');
    }

    // users yang sudah melakukan absensi hadir
    public function attended_users()
    {
        return $this->belongsToMany('App\Models\User', 'event_guests', 'event_id', 'user_id')->withTimestamps()->orderBy('created_at', 'desc');
    }

    public function guide_book()
    {
        return $this->morphOne('App\Models\File', 'file')->where('key', 'guide_book');
    }

    public function banner()
    {
        return $this->morphOne('App\Models\File', 'file')->where('key', 'banner');
    }

    public function creator()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

}
