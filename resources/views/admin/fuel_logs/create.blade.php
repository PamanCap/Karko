@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-8">
        Add Fuel Log
    </h1>


    <form method="POST" enctype="multipart/form-data" action="{{ route('fuel-logs.store') }}" class="bg-white p-8 rounded-xl">
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
            Date
        </label>
        <input type="date" name="date" class="border w-full mb-5 p-2" />
        <label>
            Liter
        </label>
        <input type="number" name="liter" class="border w-full mb-5 p-2" />
        <label>
            Cost
        </label>
        <input type="number" name="cost" class="border w-full mb-5 p-2" />
        <label>
            Receipt Image
        </label>
        <input type="file" name="receipt_image" class="border w-full mb-5 p-2" />
        <button class="bg-teal-500 text-white px-5 py-2 rounded">

            Save

        </button>
    </form>
@endsection
