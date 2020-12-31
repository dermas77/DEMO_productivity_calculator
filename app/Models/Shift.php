<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    public function workcenter()
    {
        return $this->hasOne( WorkCenter::class);
    }

    public function workers()
    {
        return $this->belongsToMany( Worker::class);
    }
}
