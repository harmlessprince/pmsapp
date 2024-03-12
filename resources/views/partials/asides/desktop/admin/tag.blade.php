@php
    $isAdminTagIndexPage =  strpos(Route::currentRouteName(), 'admin.tags.index') === 0;
 $isAdminTagCreatePage =  strpos(Route::currentRouteName(), 'admin.tags.create') === 0;
  $isAdminTagEditPage =  strpos(Route::currentRouteName(), 'admin.tags.edit') === 0;
   $isAdminTagPage = $isAdminTagIndexPage || $isAdminTagCreatePage || $isAdminTagEditPage;
@endphp
<div class="mb-8 cursor-pointer">
    <a
        class="flex flex-row relative" href="{{route('admin.tags.index')}}">
        <span class="material-symbols-outlined mr-4 w-[24px] h-[24px] {{ $isAdminTagPage == true ? 'text-primary_color' : 'text-natural'}}">sell</span>
        <span class="text-base font-medium {{ $isAdminTagPage == true ? 'text-primary_color' : 'text-natural'}}">Tags</span>
    </a>
</div>
