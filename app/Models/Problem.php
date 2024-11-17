<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    /** @use HasFactory<\Database\Factories\ProblemFactory> */
    use HasFactory;

    public function trigger()
    {
        return $this->hasOne(Trigger::class);
    }

    public function impact()
    {
        return $this->hasOne(Impact::class);
    }

    public function solution()
    {
        return $this->hasOne(Solution::class);
    }

    // One-to-Many relationship
    public function news()
    {
        return $this->hasMany(News::class);
    }
}
