@php
    $isTagManagement =  strpos(Route::currentRouteName(), 'company.tags.index') === 0;
    $isUserManagement =  strpos(Route::currentRouteName(), 'company.users.index') === 0;
    $isSiteManagement = strpos(Route::currentRouteName(), 'company.sites.index') === 0;
    $isIncidentManagement = strpos(Route::currentRouteName(), 'company.incidents.index') === 0;
    $isManagement = $isTagManagement || $isUserManagement || $isSiteManagement || $isIncidentManagement;

@endphp
<div class="mb-8 cursor-pointer">
    <div onclick="toggleSidebarDropdown('dropdownManagements')" id="dropdownNavbarLink"
         class="flex flex-row relative">
        <span class="material-symbols-outlined mr-4 w-[24px] h-[24px] {{ $isManagement ? 'text-primary_color' : 'text-natural'}}">person</span>
        <span class="text-base font-medium {{ $isManagement ? 'text-primary_color' : 'text-natural'}}" >Management</span>
        <img src="{{asset('assets/images/dropdown.png')}}" alt="dashboard"
             class="mr-4 w-3 h-1.5 absolute right-0 bottom-2"/>
    </div>
    <div id="dropdownManagements" class="hidden dropdownMenuContent">
        <ul class="">
            <li>
                <a href="{{route('company.users.index')}}"
                   class="block pl-[16%] pt-2 text-natural font-headerWeight text-normal hover:text-primary_color {{ $isUserManagement ? 'text-primary_color' : 'text-natural'}}">Personnel
                    Management</a>
            </li>
            <li>
                <a href="{{route('company.tags.index')}}"
                   class="block pl-[16%] pt-2 text-natural font-headerWeight text-normal hover:text-primary_color {{ $isTagManagement ? 'text-primary_color' : 'text-natural'}}">Tag
                    Management</a>
            </li>
            <li>
                <a href="{{route('company.sites.index')}}"
                   class="block pl-[16%] pt-2 text-natural font-headerWeight text-normal hover:text-primary_color {{ $isSiteManagement ? 'text-primary_color' : 'text-natural'}}">Site
                    Management</a>
            </li>
            <li>
                <a href="{{route('incidents.index')}}"
                   class="block pl-[16%] pt-2 text-natural font-headerWeight text-normal hover:text-primary_color {{ $isIncidentManagement ? 'text-primary_color' : 'text-natural'}}">Incident
                    Management</a>
            </li>
        </ul>
    </div>
</div>
