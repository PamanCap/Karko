@extends('layouts.app')


@section('content')
    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-3xl font-bold">
                Service Logs
            </h1>

            <p class="text-gray-500">
                Manage vehicle maintenance history
            </p>

        </div>


        <a href="{{ route('services.create') }}" class="bg-teal-500 px-5 py-2 rounded-lg text-white">
            Add Service
        </a>

    </div>



    <div class="bg-white rounded-xl shadow overflow-hidden">


        <table class="w-full table-fixed">


            <thead>

                <tr class="border-b">

                    <th class="p-4 text-left">
                        Vehicle
                    </th>


                    <th class="p-4 text-left">
                        Date
                    </th>


                    <th class="p-4 text-left">
                        Description
                    </th>


                    <th class="p-4 text-left">
                        Cost
                    </th>


                    <th class="p-4 text-left">
                        Status
                    </th>


                    <th class="p-4 text-left">
                        Action
                    </th>

                </tr>

            </thead>



            <tbody>


                @foreach ($services as $service)
                    <tr class="border-b">


                        <td class="p-4">

                            {{ $service->vehicle->plate_number }}

                            -

                            {{ $service->vehicle->brand }}

                        </td>



                        <td class="p-4">

                            {{ $service->date }}

                        </td>



                        <td class="p-4">

                            {{ $service->description }}

                        </td>




                        <td class="p-4">

                            Rp {{ number_format($service->cost) }}

                        </td>



                        <td class="p-4">


                            @if ($service->status == 'in_progress')
                                <span class="px-3 py-1 bg-yellow-100 rounded-full">
                                    In Progress
                                </span>
                            @else
                                <span class="px-3 py-1 bg-green-100 rounded-full">
                                    Completed
                                </span>
                            @endif
                        </td>


                        <td class="p-4">


                            @if ($service->status == 'in_progress')
                                <form method="POST" action="{{ route('services.complete', $service->id) }}">

                                    @csrf
                                    @method('PATCH')


                                    <button class="bg-blue-500 text-white px-3 py-1 rounded">

                                        Complete

                                    </button>


                                </form>
                            @else
                                <span class="text-gray-400">

                                    -

                                </span>
                            @endif


                        </td>


                    </tr>
                @endforeach


            </tbody>


        </table>


    </div>
@endsection
