<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parts extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function stock()
    {
        return $this->hasOne(stock::class,'part_id','id');
    }
}
