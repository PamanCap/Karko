@extends('layouts.app')


@section('content')
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold">
                Drivers
            </h1>
            <p class="text-gray-500">
                Manage company drivers
            </p>
        </div>
        <a href="{{ route('drivers.create') }}" class="bg-teal-500 px-5 py-2 rounded-lg text-white">
            Add Driver
        </a>
    </div>

    <div class="bg-white rounded-xl shadow">
        <table class="w-full">
            <thead>
                <tr class="border-b ">
                    <th class="p-4 text-left">
                        No
                    </th>

                    <th class="p-4 text-left">
                        Driver Name
                    </th>

                    <th class="p-4 text-left">
                        Phone Number
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
                @forelse($drivers as $driver)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-4">
                            {{ $loop->iteration }}
                        </td>
                        <td class="p-4 font-medium">
                          {{ $driver->name }}
                        </td>
                        <td class="p-4">
                            {{ $driver->phone_number }}
                        </td>
                        <td class="p-4">
                            @if ($driver->status == 'available')
                                <span class="px-3 py-1 rounded-full bg-green-100 text-black-600 text-sm">
                                    Available
                                </span>
                            @else
                                <span class="px-3 py-1 rounded-full bg-yellow-100 text-black-600 text-sm">
                                    Assigned
                                </span>
                            @endif

                        </td>

                        <td class="p-4">

                            <div class="flex gap-3">
                                <a href="{{ route('drivers.edit', $driver->id) }}" class="text-blue-600">
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('drivers.destroy', $driver->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Delete driver?')" class="text-red-600">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-8 text-center text-gray-500">
                            No drivers available
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
