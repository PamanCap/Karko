@extends('layouts.app')


@section('content')
    <h1 class="text-3xl font-bold mb-8">

        Add Service

    </h1>




    <form method="POST" action="{{ route('services.store') }}" class="bg-white rounded-xl p-8">


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
            Service Date
        </label>


        <input type="date" name="date" class="border w-full mb-5 p-2" />






        <label>
            Description
        </label>


        <textarea name="description" class="border w-full mb-5 p-2"></textarea>







        <label>
            Cost
        </label>


        <input type="number" name="cost" class="border w-full mb-5 p-2" />





        <button class="bg-teal-500 text-white px-5 py-2 rounded">

            Save Service

        </button>




    </form>
@endsection
