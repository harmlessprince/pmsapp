@php
    $isAdminRegionIndexPage =  strpos(Route::currentRouteName(), 'admin.regions.index') === 0;
 $isAdminRegionCreatePage =  strpos(Route::currentRouteName(), 'admin.regions.create') === 0;
  $isAdminRegionEditPage =  strpos(Route::currentRouteName(), 'admin.regions.edit') === 0;
   $isAdminRegionPage = $isAdminRegionIndexPage || $isAdminRegionCreatePage || $isAdminRegionEditPage;
@endphp
<div class="mb-8 cursor-pointer">
    <a
        class="flex flex-row relative" href="{{route('admin.regions.index')}}">
        <span
            class="material-symbols-outlined mr-4 w-[24px] h-[24px] {{ $isAdminRegionPage == true ? 'text-primary_color' : 'text-natural'}}">pin_drop</span>
        <span
            class="text-base font-medium {{ $isAdminRegionPage == true ? 'text-primary_color' : 'text-natural'}}">Regions</span>
    </a>
</div>
