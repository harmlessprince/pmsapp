@php
    $isCompanyRegionIndexPage =  strpos(Route::currentRouteName(), 'company.regions.index') === 0;
 $isCompanyRegionCreatePage =  strpos(Route::currentRouteName(), 'company.regions.create') === 0;
  $isCompanyRegionEditPage =  strpos(Route::currentRouteName(), 'company.regions.edit') === 0;
   $isCompanyRegionPage = $isCompanyRegionIndexPage || $isCompanyRegionCreatePage || $isCompanyRegionEditPage;
@endphp
<div class="mb-8 cursor-pointer">
    <a
        class="flex flex-row relative" href="{{route('company.regions.index')}}">
        <span
            class="material-symbols-outlined mr-4 w-[24px] h-[24px] {{ $isCompanyRegionPage == true ? 'text-primary_color' : 'text-natural'}}">screenshot_region</span>
        <span
            class="text-base font-medium {{ $isCompanyRegionPage == true ? 'text-primary_color' : 'text-natural'}}">Regions</span>
    </a>
</div>
