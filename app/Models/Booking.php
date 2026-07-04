<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'vehicle_id',
        'driver_id',
        'start_date',
        'end_date',
        'purpose',
        'status',
        'created_by'
    ];
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
    public function approvals()
    {
        return $this->hasMany(Approval::class);
    }
}
