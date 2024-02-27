@php
    $isScanAnalytics =  strpos(Route::currentRouteName(), 'company.scans.analytics') === 0;
    $isAttendanceAnalytics =  strpos(Route::currentRouteName(), 'company.attendance.analytics') === 0;
    $isAnalytics = $isScanAnalytics || $isAttendanceAnalytics;

@endphp

<div class="mb-8 cursor-pointer">
    <div onclick="toggleAnalytics()"  class="flex flex-row relative"  id="dropdownNavbarLink" >

        <span class="material-symbols-outlined mr-4 w-[24px] h-[24px] {{ $isAnalytics == true ? 'text-primary_color' : 'text-natural'}}">equalizer</span>
        <span class="{{ $isAnalytics == true ? 'text-primary_color' : 'text-natural'}} text-base font-medium">Analytics</span>
        <img src="{{asset('assets/images/dropdown.png')}}" alt="dashboard"
             class="mr-4 w-3 h-1.5 absolute right-0 bottom-2"/>
    </div>
    <div id="dropdownAnalytics" class="hidden">
        <ul class="">
            <li>
                <a href="{{route('company.scans.analytics')}}"
                   class="block pl-[16%] pt-2 font-headerWeight text-normal hover:text-primary_color  {{ $isScanAnalytics ? 'text-primary_color' : 'text-natural'}}">Scan
                    Analytics</a>
            </li>
            <li>
                <a href="{{route('company.attendance.analytics')}}"
                   class="block  pl-[16%] pt-2 font-headerWeight text-normal hover:text-primary_color {{ $isAttendanceAnalytics ? 'text-primary_color' : 'text-natural'}}">Attendance
                    Analytics</a>
            </li>
        </ul>
    </div>
</div>
