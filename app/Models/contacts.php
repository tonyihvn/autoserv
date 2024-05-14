<?php

namespace App\Models;
// use App\Models\vehicle;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contacts extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function vehicles()
    {
        return $this->hasMany(vehicle::class, 'customerid', 'customerid');
    }

    public function jobs()
    {
        return $this->hasMany(jobs::class, 'customerid', 'customerid');
    }

    public function payments()
    {
        return $this->hasMany(payments::class, 'customerid', 'customerid');
    }


}
