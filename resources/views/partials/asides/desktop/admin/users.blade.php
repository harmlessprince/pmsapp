@php
    $isAdminIndexPage =  strpos(Route::currentRouteName(), 'admin.users.index') === 0;
    $isAdminCreatePage =  strpos(Route::currentRouteName(), 'admin.users.create') === 0;
     $isAdminEditPage =  strpos(Route::currentRouteName(), 'admin.users.edit') === 0;
    $isAdminUserPage = $isAdminIndexPage || $isAdminCreatePage || $isAdminEditPage;
@endphp
<div class="mb-8 cursor-pointer">
    <a
        class="flex flex-row relative" href="{{route('admin.users.index')}}">
        <span
            class="material-symbols-outlined mr-4 w-[24px] h-[24px] {{ $isAdminUserPage == true ? 'text-primary_color' : 'text-natural'}}">person</span>
        <span class="text-base font-medium {{ $isAdminUserPage == true ? 'text-primary_color' : 'text-natural'}}">Personnel's</span>
    </a>
</div>
