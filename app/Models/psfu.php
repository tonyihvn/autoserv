<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class psfu extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function jobs()
    {
        return $this->belongsTo(jobs::class, 'jobno', 'jobno');
    }
}
