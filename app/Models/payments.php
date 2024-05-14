<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payments extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function jobs()
    {
        return $this->belongsTo(jobs::class, 'jobno', 'jobno');
    }

    public function contact()
    {
        return $this->belongsTo(contacts::class, 'customerid', 'customerid');
    }
}