<div class="bg-white rounded-xl shadow overflow-hidden">

    <table class="w-full table-fixed">
        <thead>
            <tr>
                <th class="p-4 text-left w-16">No</th>
                <th class="p-4 text-left">Plate Number</th>
                <th class="p-4 text-left">Brand</th>
                <th class="p-4 text-left">Type</th>
                <th class="p-4 text-left">Ownership</th>
                <th class="p-4 text-left">Status</th>
                <th class="p-4 text-left">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vehicles as $vehicle)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-4">
                        {{ $loop->iteration }}
                    </td>
                    <td class="p-4">
                        {{ $vehicle->plate_number }}
                    </td>
                    <td class="p-4">
                        {{ $vehicle->brand }}
                    </td>
                    <td class="p-4">
                        {{ $vehicle->type }}
                    </td>
                    <td class="p-4">
                        {{ $vehicle->ownership }}
                    </td>
                    <td class="p-4">


                        @if ($vehicle->status == 'available')
                            <span
                                class="
            px-3
            py-1
            rounded-full
            bg-green-100
            text-black-700
            text-sm
        ">

                                Available

                            </span>
                        @elseif($vehicle->status == 'booked')
                            <span
                                class="
            px-3
            py-1
            rounded-full
            bg-yellow-100
            text-black-700
            text-sm
        ">
                                Booked

                            </span>
                        @elseif($vehicle->status == 'in_use')
                            <span
                                class="
            px-3
            py-1
            rounded-full
            bg-blue-100
            text-black-700
            text-sm
        ">
                                In Use
                            </span>
                        @elseif($vehicle->status == 'maintenance')
                            <span
                                class="
            px-3
            py-1
            rounded-full
            bg-red-100
            text-black-700
            text-sm
        ">
                                Maintenance
                            </span>
                        @endif
                    </td>
                    <td class="p-4 flex justify-content gap-3">
                        <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="text-blue-500">
                            Edit
                        </a>
                        <form method="POST" action="{{ route('vehicles.destroy', $vehicle->id) }}">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Delete this vehicle?')" class="text-red-500">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
