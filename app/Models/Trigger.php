<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trigger extends Model
{
    /** @use HasFactory<\Database\Factories\TriggerFactory> */
    use HasFactory;

    public function problem()
    {
        return $this->belongsTo(Problem::class);
    }
}
