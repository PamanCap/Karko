<?php

namespace App\Http\Controllers;


use App\Models\Vehicle;
use App\Models\Booking;


class DashboardController extends Controller
{


    public function index()
    {


        // menghitung semua kendaraan

        $totalVehicles =
            Vehicle::count();




        // menghitung kendaraan tersedia

        $availableVehicles =
            Vehicle::where(
                'status',
                'available'
            )
            ->count();




        // menghitung kendaraan digunakan

        $inUseVehicles =
            Vehicle::where(
                'status',
                'in_use'
            )
            ->count();





        // data chart booking per bulan

        $monthlyUsage =
            Booking::selectRaw(
                'MONTH(created_at) as month, COUNT(*) as total'
            )
            ->groupBy(
                'month'
            )
            ->pluck(
                'total',
                'month'
            );





        return view(
            'dashboard',
            compact(

                'totalVehicles',

                'availableVehicles',

                'inUseVehicles',

                'monthlyUsage'

            )
        );
    }
}
