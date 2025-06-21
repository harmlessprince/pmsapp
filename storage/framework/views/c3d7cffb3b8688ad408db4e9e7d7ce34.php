<?php
    $isDashboard = strpos(Route::currentRouteName(), 'company.dashboard') === 0 || strpos(Route::currentRouteName(), 'admin.dashboard') === 0;
?>

<?php if(auth()->guard()->check()): ?>
    <?php if(auth()->user()->isCompanyOwner()): ?>

        <a class="flex flex-row mb-8 cursor-pointer" href="<?php echo e(route('company.dashboard')); ?>">
            <span class="material-symbols-outlined mr-4 w-[24px] h-[24px] <?php echo e($isDashboard == true ? 'text-primary_color' : 'text-natural'); ?>">dashboard</span>
            <span class="<?php echo e($isDashboard == true ? 'text-primary_color' : 'text-natural'); ?> text-base font-medium">Dashboard</span>
        </a>
    <?php elseif(auth()->user()->isAdministrator()): ?>
        <a class="flex flex-row mb-8 cursor-pointer" href="<?php echo e(route('admin.dashboard')); ?>">
            <span class="material-symbols-outlined mr-4 w-[24px] h-[24px] <?php echo e($isDashboard == true ? 'text-primary_color' : 'text-natural'); ?>">dashboard</span>
            <span class="<?php echo e($isDashboard == true ? 'text-primary_color' : 'text-natural'); ?> text-base font-medium">Dashboard</span>
        </a>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH /Users/harmlessprince/webprojects/laravel/pmsapp/resources/views/partials/asides/desktop/dash.blade.php ENDPATH**/ ?>