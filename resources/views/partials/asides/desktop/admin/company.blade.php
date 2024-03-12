@php
    $isAdminCompanyIndexPage =  strpos(Route::currentRouteName(), 'admin.companies.index') === 0;
 $isAdminCompanyCreatePage =  strpos(Route::currentRouteName(), 'admin.companies.create') === 0;
  $isAdminCompanyEditPage =  strpos(Route::currentRouteName(), 'admin.companies.edit') === 0;
   $isAdminCompanyPage = $isAdminCompanyIndexPage || $isAdminCompanyCreatePage || $isAdminCompanyEditPage;
@endphp
<div class="mb-8 cursor-pointer">
    <a
        class="flex flex-row relative" href="{{route('admin.companies.index')}}">
        <span
            class="material-symbols-outlined mr-4 w-[24px] h-[24px] {{ $isAdminCompanyPage == true ? 'text-primary_color' : 'text-natural'}}">account_balance</span>
        <span
            class="text-base font-medium {{ $isAdminCompanyPage == true ? 'text-primary_color' : 'text-natural'}}">Companies</span>
    </a>
</div>
