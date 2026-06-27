<?php
    $isAdminFaqIndexPage =  strpos(Route::currentRouteName(), 'admin.faqs.index') === 0;
 $isAdminFaqCreatePage =  strpos(Route::currentRouteName(), 'admin.faqs.create') === 0;
  $isAdminFaqEditPage =  strpos(Route::currentRouteName(), 'admin.faqs.edit') === 0;
   $isAdminFaqPage = $isAdminFaqIndexPage || $isAdminFaqCreatePage || $isAdminFaqEditPage;
?>
<div class="mb-8 cursor-pointer">
    <a
        class="flex flex-row relative" href="<?php echo e(route('admin.faqs.index')); ?>">
        <span
            class="material-symbols-outlined mr-4 w-[24px] h-[24px] <?php echo e($isAdminFaqPage == true ? 'text-primary_color' : 'text-natural'); ?>">help</span>
        <span
            class="text-base font-medium <?php echo e($isAdminFaqPage == true ? 'text-primary_color' : 'text-natural'); ?>">Faqs</span>
    </a>
</div>
<?php /**PATH /Users/harmlessprince/webprojects/laravel/pmsapp/resources/views/partials/asides/desktop/admin/faq.blade.php ENDPATH**/ ?>