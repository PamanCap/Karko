<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ServiceController extends Controller
{
    public function index()
    {
        $services =
            Service::with('vehicle')
            ->latest()
            ->get();

        return view(
            'admin.services.index',
            compact('services')
        );
    }
    public function create()
    {
        $vehicles =
            Vehicle::where(
                'status',
                'available'
            )
            ->get();
        return view(
            'admin.services.create',
            compact('vehicles')
        );
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'vehicle_id' => 'required',
            'date' => 'required',
            'description' => 'required',
            'cost' => 'required'
        ]);
        DB::transaction(function ()
        use ($data) {
            Service::create([

                'vehicle_id' => $data['vehicle_id'],
                'date' => $data['date'],
                'description' => $data['description'],
                'cost' => $data['cost'],
                'status' => 'in_progress'

            ]);
            Vehicle::find(
                $data['vehicle_id']
            )
                ->update([

                    'status' => 'maintenance'

                ]);
        });
        return redirect()
            ->route(
                'services.index'
            );
    }
    public function complete(
        Service $service
    ) {
        DB::transaction(function ()
        use ($service) {
            $service->update([

                'status' => 'completed'
            ]);
            $service
                ->vehicle
                ->update([
                    'status' => 'available'

                ]);
        });
        return back();
    }
}
