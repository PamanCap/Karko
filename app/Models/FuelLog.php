<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class FuelLog extends Model
{

    protected $table = 'fuel_logs';


    protected $fillable = [

        'vehicle_id',
        'date',
        'liter',
        'cost',
        'receipt_image',
        'created_by'

    ];


    public function vehicle()
    {
        return $this->belongsTo(
            Vehicle::class
        );
    }
}
