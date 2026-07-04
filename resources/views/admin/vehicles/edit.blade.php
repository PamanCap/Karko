@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-8">
        Edit Vehicle
    </h1>
    <form method="POST" action="{{ route('vehicles.update', $vehicle->id) }}" class="bg-white p-8 rounded-xl">
        @csrf
        @method('PUT')
        <label>
            Plate Number
        </label>
        <input name="plate_number" value="{{ $vehicle->plate_number }}" class="border w-full mb-5 p-2" />
        <label>
            Brand
        </label>
        <input name="brand" value="{{ $vehicle->brand }}" class="border w-full mb-5 p-2" />

        <label>
            Type
        </label>
        <select name="type" class="border w-full mb-5 p-2">
            <option value="passenger" {{ $vehicle->type == 'passenger' ? 'selected' : '' }}>
                Passenger
            </option>
            <option value="cargo" {{ $vehicle->type == 'cargo' ? 'selected' : '' }}>
                Cargo
            </option>
        </select>
        <label>
            Ownership
        </label>
        <select name="ownership" class="border w-full mb-5 p-2">
            <option value="company" {{ $vehicle->ownership == 'company' ? 'selected' : '' }}>
                Company
            </option>
            <option value="rental" {{ $vehicle->ownership == 'rental' ? 'selected' : '' }}>
                Rental
            </option>
        </select>
        <label>
            Service Date
        </label>
        <input type="date" name="service_date" value="{{ $vehicle->service_date }}" class="border w-full mb-5 p-2" />
        <button type="submit" class="bg-teal-500 px-5 py-2 text-white rounded">
            Update
        </button>
    </form>
@endsection
