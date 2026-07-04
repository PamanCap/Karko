<aside id="sidebar"
    class="fixed left-0 top-0 h-screen w-64 bg-white border-r flex flex-col transition-all duration-300">


    <div class="p-5">


        <button id="toggleSidebar" class="mb-10">

            <x-heroicon-o-bars-3 class="w-5 h-5" />
        </button>


        <ul class="space-y-5">   
            <li>
                <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('approver.dashboard') }}"
                    class="flex items-center gap-3">
                    <x-heroicon-o-home class="w-5 h-5" />
                    <span class="menu-text">
                        Dashboard
                    </span>
                </a>
            </li>


            @if (auth()->user()->role === 'admin')
                <li>
                    <a href="{{ route('bookings.index') }}" class="flex items-center gap-3">
                        <x-heroicon-o-presentation-chart-line class="w-5 h-5" />
                        <span class="menu-text">
                            Bookings
                        </span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('drivers.index') }}" class="flex items-center gap-3">
                        <x-heroicon-o-user-group class="w-5 h-5" />
                        <span class="menu-text">
                            Drivers
                        </span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('fuel-logs.index') }}" class="flex items-center gap-3">
                        <x-heroicon-o-document-text class="w-5 h-5" />
                        <span class="menu-text">
                            Fuel Logs
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('services.index') }}" class="flex items-center gap-3">
                        <x-heroicon-o-wrench-screwdriver class="w-5 h-5" />
                        <span class="menu-text">
                            Service Logs
                        </span>
                    </a>
                </li>
            @endif


            @if (auth()->user()->role === 'approver')
                <li>
                    <a href="{{ route('approvals.index') }}" class="flex items-center gap-3">
                        <x-heroicon-o-check-circle class="w-5 h-5" />
                        <span class="menu-text">
                            Approval
                        </span>
                    </a>
                </li>
            @endif
        </ul>
    </div>

    <div class="mt-auto p-5">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex items-center gap-3">
                <x-heroicon-o-arrow-left-end-on-rectangle class="w-5 h-5" />
                <span class="menu-text">
                    Log Out
                </span>
            </button>
        </form>
    </div>

</aside>
