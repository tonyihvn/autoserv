<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attendances extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function personnel()
    {
        return $this->belongsTo(personnel::class, 'personnel_id', 'id');
    }
}
