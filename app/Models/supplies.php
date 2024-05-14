<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplies extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function part()
    {
        return $this->hasOne(parts::class,'id','part_id');
    }
}
