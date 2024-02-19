<!-- beginning of side bar -->
<!-- aside foor desktop view -->
<aside id="asideBar" class="bg-background_color w-[15%] h-screen px-1% py-1% text-natural fixed border border-r-[0.5px]
        border-l-[0] border-t-[0] border-b-[0] border-r-natural z-50 max-lg:hidden">
    @if(auth()->user()->isCompanyOwner())
        <a class="flex flex-row items-center mb-16" href="{{route('company.dashboard')}}">
            <img src="{{ asset('assets/images/logo-red-dot.png') }}" alt="dashboard" class="mr-2"/>
            <span class="text-lg font-bold text-red-700">PERFTRAKA</span>
        </a>
    @elseif(auth()->user()->isAdministrator())
        <a class="flex flex-row items-center mb-16" href="{{route('admin-dashboard')}}">
            <img src="{{ asset('assets/images/logo-red-dot.png') }}" alt="dashboard" class="mr-2"/>
            <span class="text-lg font-bold text-red-700">PERFTRAKA</span>
        </a>
    @endif

    @include('partials.asides.desktop.dash')
    @include('partials.asides.desktop.analytics')
    @include('partials.asides.desktop.transactions')
    @include('partials.asides.desktop.management')
</aside>
