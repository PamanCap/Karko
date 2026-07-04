<?php
namespace App\Http\Controllers;

use App\Models\FuelLog;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class FuelLogController extends Controller
{
    public function index()
    {
        $fuelLogs =
            FuelLog::with('vehicle')
            ->latest()
            ->get();
        return view(
            'admin.fuel_logs.index',
            compact('fuelLogs')
        );
    }
    public function create()
    {
        $vehicles =
            Vehicle::all();
        return view(
            'admin.fuel_logs.create',
            compact('vehicles')
        );
    }
    public function store(
        Request $request
    ) {
        $data = $request->validate([
            'vehicle_id' => 'required',
            'date' => 'required|date',
            'liter' => 'required',
            'cost' => 'required',
            'receipt_image' => 'nullable|image'

        ]);
        if (
            $request->hasFile('receipt_image')
        ) {
            $data['receipt_image'] =
                $request
                ->file('receipt_image')
                ->store(
                    'receipts',
                    'public'
                );
        }
        $data['created_by']
            =
            auth()->id();
        FuelLog::create(
            $data
        );
        return redirect()
            ->route(
                'fuel-logs.index'
            );
    }
}
