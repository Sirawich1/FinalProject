<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class customer extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function Order()
    {
        # code...
        return $this->hasMany(order::class);
    }

    public function RepairJob()
    {
        # code...
        return $this->hasMany(repairjob::class);
    }
}
