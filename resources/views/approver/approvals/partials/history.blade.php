<div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="w-full table-fixed">
        <thead>
            <tr>

                <th class="p-4 text-left">
                    No
                </th>
                <th class="p-4 text-left">
                    Vehicle
                </th>
                <th class="p-4 text-left">
                    Level
                </th>
                <th class="p-4 text-left">
                    Status
                </th>
            </tr>

        </thead>


        <tbody>
            @foreach ($histories as $approval)
                <tr class="border-t">
                    <td class="p-4">
                        {{ $loop->iteration }}
                    </td>
                    <td class="p-4">
                        {{ $approval->booking->vehicle->brand }}
                    </td>
                    <td class="p-4">
                        Level {{ $approval->level }}
                    </td>
                    <td class="p-4">
                        {{ ucfirst($approval->status) }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
