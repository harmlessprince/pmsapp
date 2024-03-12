@php
    $isAdminAttendancePage =  strpos(Route::currentRouteName(), 'admin.attendance.index') === 0;

@endphp
<div class="mb-8 cursor-pointer">
    <a
        class="flex flex-row relative" href="{{route('admin.attendance.index')}}">
        <span class="material-symbols-outlined mr-4 w-[24px] h-[24px] {{ $isAdminAttendancePage == true ? 'text-primary_color' : 'text-natural'}}">person_check</span>
        <span class="text-base font-medium {{ $isAdminAttendancePage == true ? 'text-primary_color' : 'text-natural'}}">Attendance</span>
    </a>
</div>
