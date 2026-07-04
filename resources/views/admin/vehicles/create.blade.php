@extends('layouts.app')


@section('content')
    <h1 class="text-3xl font-bold mb-8">
        Add Vehicle
    </h1>

    <form method="POST" action="{{ route('vehicles.store') }}" class="bg-white p-8 rounded-xl">
        @csrf

        <label>
            Plate Number
        </label>

        <input type="text" name="plate_number" class="border w-full mb-5 p-2">

        <label>
            Brand
        </label>

        <input type="text" name="brand" class="border w-full mb-5 p-2">

        <label>
            Type
        </label>

        <select name="type" class="border w-full mb-5 p-2">

            <option value="passenger">
                Passenger Vehicle
            </option>


            <option value="cargo">
                Cargo Vehicle
            </option>


        </select>


        <label>
            Ownership
        </label>
        <select name="ownership" class="border w-full mb-5 p-2">
            <option value="company">
                Company
            </option>
            <option value="rental">
                Rental
            </option>
        </select>

        <label>
            Next Service Date
        </label>
        <input type="date" name="service_date" class="border w-full mb-5 p-2">
        <button class="bg-teal-500 px-5 py-2 rounded text-white">
            Save Vehicle
        </button>

    </form>
@endsection
