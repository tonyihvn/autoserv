<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function job()
    {
        return $this->hasOne(jobs::class, 'id', 'job_no');
    }

    public function customer()
    {
        return $this->hasOne(contacts::class, 'customerid', 'customerid');
    }

}
