@extends('layouts.app')


@section('content')
    <h1 class="text-3xl font-bold mb-8">
        Booking Vehicle
    </h1>


    <form method="POST" action="{{ route('bookings.store') }}" class="bg-white p-8 rounded-xl">
        @csrf
        <label>
            Vehicle
        </label>
        <select name="vehicle_id" class="border w-full mb-5 p-2">

            @foreach ($vehicles as $vehicle)
                <option value="{{ $vehicle->id }}">

                    {{ $vehicle->plate_number }}
                    -
                    {{ $vehicle->brand }}

                </option>
            @endforeach
        </select>
        <label>
            Driver
        </label>
        <select name="driver_id" class="border w-full mb-5 p-2">
            @foreach ($drivers as $driver)
                <option value="{{ $driver->id }}">

                    {{ $driver->name }}
                </option>
            @endforeach
        </select>
        <label>
            Start Date
        </label>
        <input type="date" name="start_date" class="border w-full mb-5 p-2" />
        <label>
            End Date
        </label>

        <input type="date" name="end_date" class="border w-full mb-5 p-2" />
        <label>
            Purpose
        </label>
        <textarea name="purpose" class="border w-full mb-5 p-2"></textarea>
        <label>
            Approver Level 1
        </label>
        <select name="approver_1" class="border w-full mb-5 p-2">
            @foreach ($approvers as $user)
                <option value="{{ $user->id }}">

                    {{ $user->name }}

                </option>
            @endforeach
        </select>
        <label>
            Approver Level 2
        </label>
        <select name="approver_2" class="border w-full mb-5 p-2">
            @foreach ($approvers as $user)
                <option value="{{ $user->id }}">

                    {{ $user->name }}

                </option>
            @endforeach
        </select>

        <button type="submit" class="bg-teal-500 text-white px-5 py-2 rounded">
            Submit Booking
        </button>

    </form>
@endsection
