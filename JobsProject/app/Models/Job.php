<?php

namespace App\Models;
use App\Models\Apply;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    // public function apply(){
    //     return $this->hasMany(User::class);
    // }
    public $timestamps = false;
    public function jobApply()
    {
        return $this->hasMany(Apply::class);
    }
}
