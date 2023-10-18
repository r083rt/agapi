<?php

namespace App\Models;

// softDelete
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    //use softDelete
    use SoftDeletes;
    protected $guarded = ['id'];

    protected $appends = ['is_paid', 'is_attended', 'attended_at'];

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
        if (auth('api')->check()) {
            return $this->payments()->where('status', 'success')
                ->where('user_id', '=', auth('api')->user()->id)
                ->count() > 0;
        }
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
        return $this->morphMany('App\Models\File', 'file')->where('key', 'guide_book');
    }

    public function guide_place()
    {
        return $this->morphOne('App\Models\File', 'file')->where('key', 'guide_place');
    }

    public function banner()
    {
        return $this->morphOne('App\Models\File', 'file')->where('key', 'banner');
    }

    public function creator()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function getIsAttendedAttribute()
    {
        // jika ada user ter autentikasi
        if (auth('api')->check()) {
            return $this->attended_users()->where('user_id', auth('api')->user()->id)->count() > 0;
        }
    }

    public function getAttendedAtAttribute()
    {
        // jika ada user ter autentikasi
        if (auth('api')->check()) {
            if ($this->attended_users()->where('user_id', auth('api')->user()->id)->count() > 0) {
                return $this->attended_users()->where('user_id', auth('api')->user()->id)->first()->pivot->created_at;
            }
        }
    }

    public function location()
    {
        return $this->morphOne(Location::class, 'locationable');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\EventCategory', 'category_id');
    }

    public function session_detail()
    {
        return $this->hasMany(EventSession::class, 'event_id', 'id');
    }


    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
