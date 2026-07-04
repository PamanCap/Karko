@extends('layouts.app')


@section('content')
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold">
                Booking
            </h1>
            <p class="text-gray-500">
                Manage Vehicles Rental
            </p>
        </div>

        <div>
            @if ($tab == 'booking')
                <a href="{{ route('bookings.create') }}" class="bg-teal-500 px-5 py-2 rounded-lg text-white">
                    Booking Now
                </a>
            @endif

            @if ($tab == 'vehicles')
                <a href="{{ route('vehicles.create') }}" class="bg-teal-500 px-5 py-2 rounded-lg text-white">
                    Add Vehicles
                </a>
            @endif
        </div>
    </div>

    <div class="flex mt-8 border rounded-lg overflow-hidden">

        <a href="?tab=booking"
            class="
    w-1/2 py-3 text-center

    {{ $tab == 'booking' ? 'bg-slate-800 text-white' : 'bg-white' }}
    ">
            Booking Vehicles
        </a>
        <a href="?tab=vehicles"
            class="
    w-1/2 py-3 text-center
    {{ $tab == 'vehicles' ? 'bg-slate-800 text-white' : 'bg-white' }}
    ">
            Vehicles List
        </a>
    </div>


    <div class="mt-8">
        @if ($tab == 'booking')
            @include('admin.bookings.partials.booking-list')
        @endif

        @if ($tab == 'vehicles')
            @include('admin.bookings.partials.vehicle-list')
        @endif

    </div>
@endsection
