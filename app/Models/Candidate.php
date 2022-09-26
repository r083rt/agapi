<?php

namespace App\Models;

use App\Models\Votable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $guarderd = ["id"];
    protected $fillable = ["user_id"];
    protected $appends = ["votables_count"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function votes()
    {
        return $this->belongsToMany('App\Models\User', 'votes', 'candidate_id', 'user_id');
        // return $this->hasMany(Vote::class);
    }

    public function getVotablesCountAttribute()
    {
        return Votable::count();
    }
}
