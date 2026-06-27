<?php
    $isAdminRegionIndexPage =  strpos(Route::currentRouteName(), 'admin.regions.index') === 0;
 $isAdminRegionCreatePage =  strpos(Route::currentRouteName(), 'admin.regions.create') === 0;
  $isAdminRegionEditPage =  strpos(Route::currentRouteName(), 'admin.regions.edit') === 0;
   $isAdminRegionPage = $isAdminRegionIndexPage || $isAdminRegionCreatePage || $isAdminRegionEditPage;
?>
<div class="mb-8 cursor-pointer">
    <a
        class="flex flex-row relative" href="<?php echo e(route('admin.regions.index')); ?>">
        <span
            class="material-symbols-outlined mr-4 w-[24px] h-[24px] <?php echo e($isAdminRegionPage == true ? 'text-primary_color' : 'text-natural'); ?>">screenshot_region</span>
        <span
            class="text-base font-medium <?php echo e($isAdminRegionPage == true ? 'text-primary_color' : 'text-natural'); ?>">Regions</span>
    </a>
</div>
<?php /**PATH /Users/harmlessprince/webprojects/laravel/pmsapp/resources/views/partials/asides/desktop/admin/region.blade.php ENDPATH**/ ?>