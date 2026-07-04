<?php

namespace App\Http\Controllers;


use App\Models\Booking;
use App\Models\Vehicle;
use App\Models\Driver;
use App\Models\User;
use App\Models\Approval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{


    public function index()
    {
        $tab = request(
            'tab',
            'booking'
        );
        $bookings = Booking::with([
            'vehicle',
            'driver',
            'approvals'
        ])
            ->latest()
            ->get();
        $vehicles = Vehicle::latest()
            ->get();
        return view(
            'admin.bookings.index',
            compact(
                'tab',
                'bookings',
                'vehicles'
            )
        );
    }
    public function create()
    {
        $vehicles = Vehicle::where(
            'status',
            'available'
        )->get();

        $drivers = Driver::where(
            'status',
            'available'
        )->get();

        $approvers = User::where(
            'role',
            'approver'
        )->get();

        return view(
            'admin.bookings.create',
            compact(
                'vehicles',
                'drivers',
                'approvers'
            )
        );
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'vehicle_id' => 'required',
            'driver_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'purpose' => 'required',
            'approver_1' => 'required',
            'approver_2' => 'required',
        ]);
        DB::transaction(function () use ($data) {
            $booking = Booking::create([
                'vehicle_id' => $data['vehicle_id'],
                'driver_id' => $data['driver_id'],
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
                'purpose' => $data['purpose'],
                'status' => 'pending',
                'created_by' => auth()->id(),

            ]);
            Approval::create([
                'booking_id' => $booking->id,
                'approver_id' => $data['approver_1'],
                'level' => 1,
                'status' => 'pending',
            ]);
            Approval::create([
                'booking_id' => $booking->id,
                'approver_id' => $data['approver_2'],
                'level' => 2,
                'status' => 'waiting',

            ]);
            Vehicle::where(
                'id',
                $data['vehicle_id']
            )
                ->update([
                    'status' => 'booked'
                ]);
            Driver::where(
                'id',
                $data['driver_id']
            )
                ->update([
                    'status' => 'assigned'
                ]);
        });
        return redirect()
            ->route('bookings.index')
            ->with(
                'success',
                'Booking created successfully'
            );
    }
    public function complete(
        Booking $booking
    ) {
        DB::transaction(function ()
        use ($booking) {
            $booking->update([
                'status' => 'completed'
            ]);
            $booking
                ->vehicle
                ->update([
                    'status' => 'available'
                ]);
            $booking
                ->driver
                ->update([
                    'status' => 'available'
                ]);
        });
        return redirect()
            ->route('bookings.index');
    }
}
