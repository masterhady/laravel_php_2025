<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', "description", "duration", "price", "user_id"];


    public function user(){
        return $this->belongsTo(User::class);
    }
}
