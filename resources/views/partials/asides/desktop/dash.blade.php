@auth
    @if(auth()->user()->isCompanyOwner())

        <a class="flex flex-row mb-8 cursor-pointer" href="{{route('company.dashboard')}}">
            <img
                src="{{asset('assets/images/colored_dashboard.png')}}"
                alt="dashboard"
                class="mr-4"
            />
            <span class="text-primary_color text-base font-medium">Dashboard</span>
        </a>
    @elseif(auth()->user()->isAdministrator())
        <a class="flex flex-row mb-8 cursor-pointer" href="{{route('admin-dashboard')}}">
            <img
                src="{{asset('assets/images/colored_dashboard.png')}}"
                alt="dashboard"
                class="mr-4"
            />
            <span class="text-primary_color text-base font-medium">Dashboard</span>
        </a>
    @endif
@endauth
