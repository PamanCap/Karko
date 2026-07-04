@extends('layouts.app')

@section('content')
    <div>

        <h1 class="text-3xl font-bold">
            Approval
        </h1> 
        <p class="text-gray-500">
        Manage vehicle booking approvals
        </p>

    </div>

    <div class="flex mt-8 border rounded-lg overflow-hidden">
        <a href="?tab=request"
            class="
        w-1/2 py-3 text-center

        {{ $tab == 'request' ? 'bg-slate-800 text-white' : 'bg-white' }}
        ">
            Approval Request
        </a>
        <a href="?tab=history"
            class="
        w-1/2 py-3 text-center

        {{ $tab == 'history' ? 'bg-slate-800 text-white' : 'bg-white' }}
        ">
            Approval History
        </a>
    </div>
    <div class="mt-8">
        @if ($tab == 'request')
            @include('approver.approvals.partials.request')
        @endif
        @if ($tab == 'history')
            @include('approver.approvals.partials.history')
        @endif
    </div>
@endsection
