<!-- aside for mobile view -->
<aside id="mobileAside" class="bg-background_color w-[100%] h-screen px-5% py-1% text-natural fixed border border-r-[0.5px]
        border-l-[0] border-t-[0] border-b-[0] border-r-natural z-50 hidden lg:hidden z-[500] fixed top-0 left-0">
    @if(auth()->user()->isCompanyOwner())
        {{-- <a class="flex flex-row items-center mb-16" href="{{route('company.dashboard')}}">
            <img src="{{ asset('assets/images/logo-red-dot.png') }}" alt="dashboard" class="mr-2"/>
            <span class="text-lg font-bold text-red-700">PERFTRAKA</span>
        </a> --}}
        <div class="flex flex-row items-center mb-16">
            <img src="{{ asset('assets/images/logo-red-dot.png') }}" alt="dashboard" class="mr-2"/>
            <span class="text-lg font-medium text-primary_color">PERFTRAKA</span>
            <div class="flex-1"></div>
            <img onclick="toggleSideBar()" width="22" height="22" src="https://img.icons8.com/ios/22/ffffff/cancel.png"
                 alt="cancel"/>
        </div>
        @include('partials.asides.desktop.dash')
        @include('partials.asides.desktop.company.analytics')
        @include('partials.asides.desktop.company.transactions')
        @include('partials.asides.desktop.company.management')
    @elseif(auth()->user()->isAdministrator())
        {{-- <a class="flex flex-row items-center mb-16" href="{{route('admin.dashboard')}}">
            <img src="{{ asset('assets/images/logo-red-dot.png') }}" alt="dashboard" class="mr-2"/>
            <span class="text-lg font-bold text-red-700">PERFTRAKA</span>
        </a> --}}
        <div class="flex flex-row items-center mb-16">
            <img src="{{ asset('assets/images/logo-red-dot.png') }}" alt="dashboard" class="mr-2"/>
            <span class="text-lg font-medium text-primary_color">PERFTRAKA</span>
            <div class="flex-1"></div>
            <img onclick="toggleSideBar()" width="22" height="22" src="https://img.icons8.com/ios/22/ffffff/cancel.png"
                 alt="cancel"/>
        </div>
        @include('partials.asides.desktop.dash')
        @include('partials.asides.desktop.admin.users')
        @include('partials.asides.desktop.admin.company')
        @include('partials.asides.desktop.admin.tag')
        @include('partials.asides.desktop.admin.site')
        @include('partials.asides.desktop.admin.scan')
        @include('partials.asides.desktop.admin.attendance')
        @if(auth()->user()->isSuperAdmin())
            @include('partials.asides.desktop.admin.admin')
        @endif
        @include('partials.asides.desktop.admin.faq')
    @endif
    <div class="mb-8 cursor-pointer">
        <span class="text-natural text-base font-medium">Log out</span>
    </div>
</aside>
<!-- end of side bar -->
