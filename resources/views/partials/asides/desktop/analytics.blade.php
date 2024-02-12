<div class="mb-8 cursor-pointer">
    <div onclick="toggledropdown()" id="dropdownAnalyticsLink" class="flex flex-row relative">
        <img src="{{asset('assets/images/chart.png')}}" alt="dashboard" class="mr-4"/>
        <span class="text-natural text-base font-medium">Analytics</span>
        <img src="{{asset('assets/images/dropdown.png')}}" alt="dashboard"
             class="mr-4 w-3 h-1.5 absolute right-0 bottom-2"/>
    </div>
    <div id="dropdownAnalytics" class="hidden">
        <ul class="">
            <li>
                <a href="{{route('scans.analytics')}}"
                   class="block pl-[16%] pt-2 text-natural font-headerWeight text-normal hover:text-primary_color">Scan
                    Analytics</a>
            </li>
            <li>
                <a href="/pages/attendanceanalytics.html"
                   class="block  pl-[16%] pt-2 text-natural font-headerWeight text-normal hover:text-primary_color">Attendance
                    Anaytics</a>
            </li>
        </ul>
    </div>
</div>
