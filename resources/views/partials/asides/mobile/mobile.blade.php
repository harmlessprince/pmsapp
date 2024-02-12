<!-- aside for mobile view -->
<aside id="mobileAside" class="bg-background_color w-[100%] h-screen px-5% py-1% text-natural fixed border border-r-[0.5px]
        border-l-[0] border-t-[0] border-b-[0] border-r-natural z-50 hidden lg:hidden absolute top-0 left-0">
    <div class="flex flex-row items-center mb-16">
        <img src="{{asset('assets/images/logo.png')}}" alt="dashboard" class="mr-2"/>
        <span class="text-lg font-medium text-primary_color">PERFTRAKA</span>
        <div class="flex-1"></div>
        <img onclick="toggleSideBar()" width="22" height="22" src="https://img.icons8.com/ios/22/ffffff/cancel.png"
             alt="cancel"/>
    </div>
    @include('partials.asides.desktop.dash')
    @include('partials.asides.desktop.analytics')
    @include('partials.asides.desktop.transactions')
    @include('partials.asides.desktop.management')
    <div class="mb-8 cursor-pointer">
        <span class="text-natural text-base font-medium">Log out</span>
    </div>
</aside>
<!-- end of side bar -->
