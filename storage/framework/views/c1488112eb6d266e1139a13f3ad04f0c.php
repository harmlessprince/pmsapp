<?php
    $isAdminCompanyIndexPage =  strpos(Route::currentRouteName(), 'admin.companies.index') === 0;
 $isAdminCompanyCreatePage =  strpos(Route::currentRouteName(), 'admin.companies.create') === 0;
  $isAdminCompanyEditPage =  strpos(Route::currentRouteName(), 'admin.companies.edit') === 0;
   $isAdminCompanyPage = $isAdminCompanyIndexPage || $isAdminCompanyCreatePage || $isAdminCompanyEditPage;
?>
<div class="mb-8 cursor-pointer">
    <a
        class="flex flex-row relative" href="<?php echo e(route('admin.companies.index')); ?>">
        <span
            class="material-symbols-outlined mr-4 w-[24px] h-[24px] <?php echo e($isAdminCompanyPage == true ? 'text-primary_color' : 'text-natural'); ?>">account_balance</span>
        <span
            class="text-base font-medium <?php echo e($isAdminCompanyPage == true ? 'text-primary_color' : 'text-natural'); ?>">Companies</span>
    </a>
</div>
<?php /**PATH /Users/harmlessprince/webprojects/laravel/pmsapp/resources/views/partials/asides/desktop/admin/company.blade.php ENDPATH**/ ?>