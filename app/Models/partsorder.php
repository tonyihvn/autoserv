<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class partsorder extends Model
{
    use HasFactory;

    protected $guarded = [];

<<<<<<< HEAD
=======
    public function part()
    {
        return $this->hasOne(parts::class, 'id', 'pid');
    }

    public function contact()
    {
        return $this->hasOne(contacts::class,'customerid','customerid');
    }

>>>>>>> master
    public function jobs()
    {
        return $this->belongsTo(jobs::class, 'jobno', 'jobno');
    }

    public function stock()
    {
        return $this->hasOne(Stock::class,'part_id','pid');
    }
}
