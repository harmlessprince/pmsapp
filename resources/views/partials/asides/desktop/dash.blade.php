@php
    $isDashboard = strpos(Route::currentRouteName(), 'company.dashboard') === 0 || strpos(Route::currentRouteName(), 'admin-dashboard') === 0;
@endphp

@auth
    @if(auth()->user()->isCompanyOwner())

        <a class="flex flex-row mb-8 cursor-pointer" href="{{route('company.dashboard')}}">
            <span class="material-symbols-outlined mr-4 w-[24px] h-[24px] {{ $isDashboard == true ? 'text-primary_color' : 'text-natural'}}">dashboard</span>
            <span class="{{ $isDashboard == true ? 'text-primary_color' : 'text-natural'}} text-base font-medium">Dashboard</span>
        </a>
    @elseif(auth()->user()->isAdministrator())
        <a class="flex flex-row mb-8 cursor-pointer" href="{{route('admin.dashboard')}}">
            <span class="material-symbols-outlined mr-4 w-[24px] h-[24px] {{ $isDashboard == true ? 'text-primary_color' : 'text-natural'}}">dashboard</span>
            <span class="{{ $isDashboard == true ? 'text-primary_color' : 'text-natural'}} text-base font-medium">Dashboard</span>
        </a>
    @endif
@endauth
