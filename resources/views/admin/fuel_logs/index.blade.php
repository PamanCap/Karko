@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold">
                Fuels Logs
            </h1>
            <p class="text-gray-500">
                Manage fuel logs
            </p>
        </div>
        <a href="{{ route('fuel-logs.create') }}" class="bg-teal-500 px-5 py-2 rounded-lg text-white">
            Add Fuel Logs
        </a>
    </div>

    <div class="bg-white rounded-xl shadow">
        <table class="w-full table-fixed">
            <tr class="border-b">
                <th class="p-4 text-left">
                    Vehicle
                </th>
                <th class="p-4 text-left">
                    Date
                </th>
                <th class="p-4 text-left">
                    Liter
                </th>
                <th class="p-4 text-left">
                    Cost
                </th>
            </tr>
            @foreach ($fuelLogs as $fuel)
                <tr class="border-b">
                    <td class="p-4">
                        {{ $fuel->vehicle->plate_number }}

                        -
                        {{ $fuel->vehicle->brand }}
                    </td>
                    <td class="p-4">
                        {{ $fuel->date }}
                    </td>
                    <td class="p-4">

                        {{ $fuel->liter }}

                        L

                    </td>
                    <td class="p-4">
                        Rp {{ number_format($fuel->cost) }}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
