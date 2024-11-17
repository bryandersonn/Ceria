<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Impact extends Model
{
    /** @use HasFactory<\Database\Factories\ImpactFactory> */
    use HasFactory;

    public function problem()
    {
        return $this->belongsTo(Problem::class);
    }
}
