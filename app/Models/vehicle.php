<?php

namespace App\Models;
// use App\Models\contacts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function contacts()
    {
        return $this->belongsTo(contacts::class, 'customerid', 'customerid');
    }

    
}
