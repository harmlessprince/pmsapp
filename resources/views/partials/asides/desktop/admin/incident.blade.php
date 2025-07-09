@php
    $isAdminIncidentPage =  strpos(Route::currentRouteName(), 'incidents.index') === 0;

@endphp
<div class="mb-8 cursor-pointer">
    <a
        class="flex flex-row relative" href="{{route('incidents.index')}}">
        <span class="material-symbols-outlined mr-4 w-[24px] h-[24px] {{ $isAdminIncidentPage == true ? 'text-primary_color' : 'text-natural'}}">e911_emergency</span>
        <span class="text-base font-medium {{ $isAdminIncidentPage == true ? 'text-primary_color' : 'text-natural'}}">Incident Report</span>
    </a>
</div>
