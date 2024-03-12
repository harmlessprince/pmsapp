@php
    $isAdminScanPage =  strpos(Route::currentRouteName(), 'admin.scan.index') === 0;
@endphp
<div class="mb-8 cursor-pointer">
    <a
        class="flex flex-row relative" href="{{route('admin.scan.index')}}">
        <span
            class="material-symbols-outlined mr-4 w-[24px] h-[24px] {{ $isAdminScanPage == true ? 'text-primary_color' : 'text-natural'}}">barcode_scanner</span>
        <span
            class="text-base font-medium {{ $isAdminScanPage == true ? 'text-primary_color' : 'text-natural'}}">Scan</span>
    </a>
</div>
