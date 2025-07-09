<?php
    $isAdminScanPage =  strpos(Route::currentRouteName(), 'admin.scan.index') === 0;
?>
<div class="mb-8 cursor-pointer">
    <a
        class="flex flex-row relative" href="<?php echo e(route('admin.scan.index')); ?>">
        <span
            class="material-symbols-outlined mr-4 w-[24px] h-[24px] <?php echo e($isAdminScanPage == true ? 'text-primary_color' : 'text-natural'); ?>">barcode_scanner</span>
        <span
            class="text-base font-medium <?php echo e($isAdminScanPage == true ? 'text-primary_color' : 'text-natural'); ?>">Scan</span>
    </a>
</div>
<?php /**PATH /Users/harmlessprince/webprojects/laravel/pmsapp/resources/views/partials/asides/desktop/admin/scan.blade.php ENDPATH**/ ?>