@extends('layouts.app')

@section('content')
    <div class="mb-10">
        <h1 class="text-3xl font-bold">

            Dashboard

        </h1>
        <p class="text-gray-500">

            Booking rental activity summary

        </p>
    </div>
    <div class="
grid
grid-cols-1
md:grid-cols-2
xl:grid-cols-3
gap-8
mb-12
">
        <div class="
bg-slate-800
text-white
rounded-xl
p-8
">
            <p class="text-xl">

                Total Vehicles

            </p>
            <h1 class="text-3xl font-bold mt-5">
                {{ $totalVehicles }} Vehicles
            </h1>
        </div>
        <div class="
bg-slate-800
text-white
rounded-xl
p-8
">

            <p class="text-xl">

                Available

            </p>
            <h1 class="text-3xl font-bold mt-5">
                {{ $availableVehicles }} Vehicles
            </h1>
        </div>
        <div class="
bg-slate-800
text-white
rounded-xl
p-8
">

            <p class="text-xl">

                In Use

            </p>
            <h1 class="text-3xl font-bold mt-5">

                {{ $inUseVehicles }} Vehicles
            </h1>
        </div>


    </div>
    <div class="mt-12">


        <div class="flex flex-col md:flex-row justify-between md:items-center gap-5 mb-5">


            <h2 class="text-2xl font-bold">

                Monthly vehicle usage chart

            </h2>



            <a href="{{ route('reports.bookings') }}" class="bg-teal-500 px-5 py-2 rounded-lg text-white">
                Download Booking Report
            </a>
        </div>


        <div class="bg-white rounded-xl p-4 md:p-8 w-full">


            <div class="relative h-[350px] w-full">

                <canvas id="bookingChart"></canvas>

            </div>


        </div>



    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <script>
        const ctx =
            document.getElementById(
                'bookingChart'
            );



        new Chart(ctx, {


            type: 'line',


            data: {


                labels: [

                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'

                ],


                datasets: [{


                    label: 'Vehicle Usage',


                    data: [

                        @for ($i = 1; $i <= 12; $i++)

                            {{ $monthlyUsage[$i] ?? 0 }},
                        @endfor

                    ]


                }]


            }


        });
    </script>
@endsection
