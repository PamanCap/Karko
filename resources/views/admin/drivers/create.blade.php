@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-8">
        Add Driver
    </h1>

    <form method="POST" action="{{ route('drivers.store') }}" class="bg-white p-8 rounded-xl">
        @csrf

        <label>
            Name
        </label>
        <input name="name" class="border w-full mb-5 p-2" />
        <label>
            Phone Number
        </label>
        <input name="phone_number" class="border w-full mb-5 p-2" />
        <button class="bg-teal-500 text-white px-5 py-2 rounded">
            Save
        </button>
    </form>
@endsection
