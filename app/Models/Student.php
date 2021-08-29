<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];


    public function student_class()
    {
        return $this->belongsTo(StudentClass::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
