<div class="mb-8 cursor-pointer">
    <div onclick="toggleManagement()" id="dropdownNavbarLink" data-dropdown-toggle="dropdownAnalytics"
         class="flex flex-row relative">
        <img src="{{asset('assets/images/management.png')}}" alt="dashboard" class="mr-4"/>
        <span class="text-natural text-base font-medium">Management</span>
        <img src="{{asset('assets/images/dropdown.png')}}" alt="dashboard"
             class="mr-4 w-3 h-1.5 absolute right-0 bottom-2"/>
    </div>
    <div id="dropdownManagements" class="hidden">
        <ul class="">
            <li>
                <a href="{{route('company.users.index')}}"
                   class="block pl-[16%] pt-2 text-natural font-headerWeight text-normal hover:text-primary_color">Users
                    management</a>
            </li>
            <li>
                <a href="{{route('company.tags.index')}}"
                   class="block pl-[16%] pt-2 text-natural font-headerWeight text-normal hover:text-primary_color">Tags
                    management</a>
            </li>
            <li>
                <a href="{{route('company.sites.index')}}"
                   class="block pl-[16%] pt-2 text-natural font-headerWeight text-normal hover:text-primary_color">Sites
                    management</a>
            </li>
        </ul>
    </div>
</div>
