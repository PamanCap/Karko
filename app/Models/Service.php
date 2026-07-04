<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [

        'vehicle_id',
        'date',
        'description',
        'cost',
        'status'

    ];


    public function vehicle()
    {
        return $this->belongsTo(
            Vehicle::class
        );
    }
}
