<div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="w-full table-fixed">
        <thead>
            <tr class="border-b">
                <th class="p-4 text-left">
                    No
                </th>
                <th class="p-4 text-left">
                    Vehicle
                </th>
                <th class="p-4 text-left">
                    Driver
                </th>
                <th class="p-4 text-left">
                    Purpose
                </th>
                <th class="p-4 text-left">
                    Level
                </th>
                <th class="p-4 text-left">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($requests as $approval)
                <tr class="border-b">
                    <td class="p-4">
                        {{ $loop->iteration }}
                    </td>
                    <td class="p-4">
                        {{ $approval->booking->vehicle->plate_number }}

                        -

                        {{ $approval->booking->vehicle->brand }}
                    </td>
                    <td class="p-4">
                        {{ $approval->booking->driver->name }}
                    </td>
                    <td class="p-4">
                        {{ $approval->booking->purpose }}
                    </td>
                    <td class="p-4">
                        Level {{ $approval->level }}
                    </td>
                    <td class="p-4">
                        <div class="flex flex-wrap gap-2">
                            <form method="POST" action="{{ route('approvals.approve', $approval->id) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded">
                                    Approve
                                </button>
                            </form>
                            <form method="POST" action="{{ route('approvals.reject', $approval->id) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">
                                    Reject
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center p-8 text-gray-500">
                        No approval request
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
