<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApprovalController extends Controller
{
    public function index()
    {
        $tab = request(
            'tab',
            'request'
        );
        $requests = Approval::with([
            'booking.vehicle',
            'booking.driver'
        ])
            ->where(
                'approver_id',
                auth()->id()
            )
            ->where(
                'status',
                'pending'
            )
            ->get();
        $histories = Approval::with([
            'booking.vehicle',
            'booking.driver'
        ])
            ->where(
                'approver_id',
                auth()->id()
            )
            ->whereIn(
                'status',
                [
                    'approved',
                    'rejected'
                ]
            )
            ->get();
        return view(
            'approver.approvals.index',
            compact(
                'tab',
                'requests',
                'histories'
            )
        );
    }
    public function approve(
        Approval $approval
    ) {
        DB::transaction(function ()
        use ($approval) {
            $approval->update([
                'status' => 'approved',
                'approved_at' => now()
            ]);
            $nextApproval =
                Approval::where(
                    'booking_id',
                    $approval->booking_id
                )
                ->where(
                    'level',
                    $approval->level + 1
                )
                ->first();
            if ($nextApproval) {
                $nextApproval->update([

                    'status' => 'pending'

                ]);
            } else {
                $approval->booking->update([
                    'status' => 'approved'

                ]);
                $approval
                    ->booking
                    ->vehicle
                    ->update([

                        'status' => 'in_use'

                    ]);
            }
        });

        return back();
    }
    public function reject(
        Approval $approval
    ) {
        DB::transaction(function ()
        use ($approval) {
            $approval->update([
                'status' => 'rejected'

            ]);
            $approval
                ->booking
                ->update([

                    'status' => 'rejected'

                ]);
            $approval
                ->booking
                ->vehicle
                ->update([
                    'status' => 'available'

                ]);
            $approval
                ->booking
                ->driver
                ->update([
                    'status' => 'available'

                ]);
        });
        return back();
    }
}
