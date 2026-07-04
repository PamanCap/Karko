<?php
namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{

    public function index()
    {

        $drivers = Driver::latest()
            ->get();


        return view(
            'admin.drivers.index',
            compact('drivers')
        );
    }

    public function create()
    {

        return view(
            'admin.drivers.create'
        );
    }

    public function store(Request $request)
    {

        $data = $request->validate([

            'name' => 'required',

            'phone_number' => 'required',

        ]);

        $data['status'] =
            'available';

        Driver::create(
            $data
        );

        return redirect()
            ->route(
                'drivers.index'
            );
    }


    public function edit(
        Driver $driver
    ) {
        return view(
            'admin.drivers.edit',
            compact('driver')
        );
    }

    public function update(
        Request $request,
        Driver $driver
    ) {
        $data = $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
        ]);

        $driver->update(
            $data
        );

        return redirect()
            ->route(
                'drivers.index'
            );
    }

    public function destroy(
        Driver $driver
    ) {
        $driver->delete();
        return back();
    }
}
