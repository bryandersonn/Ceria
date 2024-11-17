<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    /** @use HasFactory<\Database\Factories\SolutionFactory> */
    use HasFactory;

    public function problem()
    {
        return $this->belongsTo(Problem::class);
    }
}
