<div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="w-full table-fixed">
        <thead>
            <tr class="border-b">
                <th class="p-4 text-left w-16">
                    No
                </th>
                <th class="p-4 text-left">
                    Vehicles
                </th>
                <th class="p-4 text-left">
                    Driver
                </th>
                <th class="p-4 text-left">
                    Date
                </th>
                <th class="p-4 text-left">
                    Description
                </th>
                <th class="p-4 text-left">
                    Approval
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
            @foreach ($bookings as $booking)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-4">
                        {{ $loop->iteration }}
                    </td>
                    <td class="p-4">
                        {{ $booking->vehicle->plate_number }}
                        -
                        {{ $booking->vehicle->brand }}
                    </td>
                    <td class="p-4">
                        {{ $booking->driver->name }}
                    </td>
                    <td class="p-4">
                        {{ $booking->start_date }}
                        -
                        {{ $booking->end_date }}
                    </td>
                    <td class="p-4">
                        {{ $booking->purpose }}
                    </td>
                    <td class="p-4">
                        @php
                            $totalApproval = $booking->approvals->count();
                            $approved = $booking->approvals->where('status', 'approved')->count();
                        @endphp
                        @if ($booking->status == 'rejected')
                            <span class="text-red-500">
                                Rejected
                            </span>
                        @elseif($approved == $totalApproval)
                            <span class="text-green-500">
                                Approved
                            </span>
                        @else
                            <span class="text-yellow-500">
                                {{ $approved }}/{{ $totalApproval }}
                                Approve
                            </span>
                        @endif
                    </td>
                    <td class="p-4">
                        @if ($booking->status == 'pending')
                            <span class="px-3 py-1 bg-yellow-100 rounded-full">
                                Pending
                            </span>
                        @elseif($booking->status == 'approved')
                            <span class="px-3 py-1 bg-green-100 rounded-full">
                                Approved
                            </span>
                        @elseif($booking->status == 'rejected')
                            <span class="px-3 py-1 bg-red-100 rounded-full">
                                Rejected
                            </span>
                        @endif
                    </td>
                    <td class="p-4">
                        @php
                            $totalApproval = $booking->approvals->count();
                            $approved = $booking->approvals->where('status', 'approved')->count();
                        @endphp
                        @if ($booking->status == 'rejected')
                            <span class="text-red-500">
                                Rejected
                            </span>
                        @elseif($totalApproval > 0 && $approved == $totalApproval)
                            <span class="text-green-500">
                                Approved
                            </span>
                        @else
                            <span class="text-yellow-500">
                                {{ $approved }}/{{ $totalApproval }}
                                Approve
                            </span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
