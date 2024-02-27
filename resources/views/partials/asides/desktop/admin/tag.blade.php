{{--@php--}}
{{--    $isTagManagement =  strpos(Route::currentRouteName(), 'admin.tags.index') === 0;--}}
{{--    $isUserManagement =  strpos(Route::currentRouteName(), 'company.users.index') === 0;--}}
{{--    $isSiteManagement = strpos(Route::currentRouteName(), 'company.sites.index') === 0;--}}
{{--    $isManagement = $isTagManagement || $isUserManagement || $isSiteManagement;--}}

{{--@endphp--}}
<div class="mb-8 cursor-pointer">
    <a
        class="flex flex-row relative" href="{{route('admin.tags.index')}}">
        <span class="material-symbols-outlined mr-4 w-[24px] h-[24px] text-natural">sell</span>
        <span class="text-base font-medium text-natural">Tags</span>
    </a>
</div>
