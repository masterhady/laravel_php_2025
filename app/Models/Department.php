<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    protected $fillable = ["name", 'description', 'user_id'];

    public function teachers(){
        return $this->hasMany(Teacher::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
