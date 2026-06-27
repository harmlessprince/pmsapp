<?php
    $isAdminIndexPage =  strpos(Route::currentRouteName(), 'admin.admin.index') === 0;
    $isAdminCreatePage =  strpos(Route::currentRouteName(), 'admin.admin.create') === 0;
     $isAdminEditPage =  strpos(Route::currentRouteName(), 'admin.admin.edit') === 0;
    $isAdminPage = $isAdminCreatePage || $isAdminIndexPage || $isAdminEditPage;
?>
<div class="mb-8 cursor-pointer">
    <a
        class="flex flex-row relative" href="<?php echo e(route('admin.admin.index')); ?>">
        <span class="material-symbols-outlined mr-4 w-[24px] h-[24px] <?php echo e($isAdminPage == true ? 'text-primary_color' : 'text-natural'); ?>  ">shield_person</span>
        <span class="<?php echo e($isAdminPage == true ? 'text-primary_color' : 'text-natural'); ?> font-medium text-natural">Manage Admins</span>
    </a>
</div>
<?php /**PATH /Users/harmlessprince/webprojects/laravel/pmsapp/resources/views/partials/asides/desktop/admin/admin.blade.php ENDPATH**/ ?>