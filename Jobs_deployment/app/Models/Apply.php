<?php

namespace App\Models;
use App\Models\User;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    use HasFactory;
    protected $fillable=['user_id','job_id','current_salary','expected_salary','cv'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function jobs()
    {
        return $this->belongsToMany(Job::class);
    }
}
