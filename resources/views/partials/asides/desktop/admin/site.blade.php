@php
    $isAdminSiteIndexPage =  strpos(Route::currentRouteName(), 'admin.sites.index') === 0;
 $isAdminSiteCreatePage =  strpos(Route::currentRouteName(), 'admin.sites.create') === 0;
  $isAdminSiteEditPage =  strpos(Route::currentRouteName(), 'admin.sites.edit') === 0;
   $isAdminSitePage = $isAdminSiteIndexPage || $isAdminSiteCreatePage || $isAdminSiteEditPage;
@endphp
<div class="mb-8 cursor-pointer">
    <a
        class="flex flex-row relative" href="{{route('admin.sites.index')}}">
        <span
            class="material-symbols-outlined mr-4 w-[24px] h-[24px] {{ $isAdminSitePage == true ? 'text-primary_color' : 'text-natural'}}">pin_drop</span>
        <span
            class="text-base font-medium {{ $isAdminSitePage == true ? 'text-primary_color' : 'text-natural'}}">Sites</span>
    </a>
</div>
