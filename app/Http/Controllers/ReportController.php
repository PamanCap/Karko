<?php
namespace App\Http\Controllers;


use App\Models\Booking;

class ReportController extends Controller
{

    public function bookingReport()
    {

        $bookings =
            Booking::with([
                'vehicle',
                'driver'
            ])
            ->get();
        $filename =
            'monthly_vehicle_report.csv';
        $headers = [
            "Content-Type" => "text/csv",
            "Content-Disposition" =>
            "attachment; filename=$filename"

        ];

        $callback =
            function ()
            use ($bookings) {

                $file =
                    fopen(
                        'php://output',
                        'w'
                    );

                fputcsv($file, [
                    'Vehicle',
                    'Driver',
                    'Start Date',
                    'End Date',
                    'Purpose',
                    'Status'
                ]);

                foreach (
                    $bookings
                    as
                    $booking
                ) {


                    fputcsv($file, [

                        $booking
                            ->vehicle
                            ->plate_number,


                        $booking
                            ->driver
                            ->name,


                        $booking
                            ->start_date,


                        $booking
                            ->end_date,


                        $booking
                            ->purpose,


                        $booking
                            ->status

                    ]);
                }

                fclose($file);
            };

        return response()
            ->stream(
                $callback,
                200,
                $headers
            );
    }
}
