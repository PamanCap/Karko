<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function create()
    {
        return view('admin.vehicles.create');
    }
    public function edit(Vehicle $vehicle)
    {

        return view(
            'admin.vehicles.edit',
            compact('vehicle')
        );
    }
    public function update(
        Request $request,
        Vehicle $vehicle
    ) 
    {
        $data = $request->validate([
            'plate_number' => 'required',
            'brand' => 'required',
            'type' => 'required',
            'ownership' => 'required',
            'service_date' => 'required|date',
        ]);

        $vehicle->update($data);

        return redirect(
            '/admin/bookings?tab=vehicles'
        );
    }
    public function destroy(
        Vehicle $vehicle
    ) {

        $vehicle->delete();


        return redirect(
            '/admin/bookings?tab=vehicles'
        );
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'plate_number' => 'required',
            'brand' => 'required',
            'type' => 'required',
            'ownership' => 'required',
            'service_date' => 'required|date',
        ]);


        $data['status'] = 'available';


        Vehicle::create($data);


        return redirect()
            ->route('bookings.index', [
                'tab' => 'vehicles'
            ]);
    }
}
