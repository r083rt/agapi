<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function departmentable()
    {
        return $this->morphTo();
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'parent_id', 'id');
    }

    public function division()
    {
        return $this->belongsTo(DepartmentDivision::class);
    }

    public function sub_departments()
    {
        return $this->hasMany(Department::class, 'parent_id')->with('user.profile');
    }

    public function children()
    {
        return $this->sub_departments()->with('children');
    }
}
