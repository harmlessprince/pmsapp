<?php
    $isAdminIndexPage =  strpos(Route::currentRouteName(), 'admin.users.index') === 0;
    $isAdminCreatePage =  strpos(Route::currentRouteName(), 'admin.users.create') === 0;
     $isAdminEditPage =  strpos(Route::currentRouteName(), 'admin.users.edit') === 0;
    $isAdminUserPage = $isAdminIndexPage || $isAdminCreatePage || $isAdminEditPage;
?>
<div class="mb-8 cursor-pointer">
    <a
        class="flex flex-row relative" href="<?php echo e(route('admin.users.index')); ?>">
        <span
            class="material-symbols-outlined mr-4 w-[24px] h-[24px] <?php echo e($isAdminUserPage == true ? 'text-primary_color' : 'text-natural'); ?>">person</span>
        <span class="text-base font-medium <?php echo e($isAdminUserPage == true ? 'text-primary_color' : 'text-natural'); ?>">Personnel</span>
    </a>
</div>
<?php /**PATH /Users/harmlessprince/webprojects/laravel/pmsapp/resources/views/partials/asides/desktop/admin/users.blade.php ENDPATH**/ ?>