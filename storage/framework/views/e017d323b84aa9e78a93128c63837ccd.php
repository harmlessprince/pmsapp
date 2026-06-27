<!-- beginning of side bar -->
<!-- aside foor desktop view -->
<aside id="asideBar" class="bg-background_color w-[15%] h-screen px-1% py-1% text-natural fixed border border-r-[0.5px]
        border-l-[0] border-t-[0] border-b-[0] border-r-natural  max-lg:hidden">
    <?php if(auth()->user()->isCompanyOwner()): ?>
        <a class="flex flex-row items-center mb-16" href="<?php echo e(route('company.dashboard')); ?>">
            <img src="<?php echo e(asset('assets/images/logo-red-dot.png')); ?>" alt="dashboard" class="mr-2"/>
            <span class="text-lg font-bold text-red-700">PERFTRAKA</span>
        </a>
        <?php echo $__env->make('partials.asides.desktop.dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('partials.asides.desktop.company.analytics', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('partials.asides.desktop.company.transactions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('partials.asides.desktop.company.management', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php elseif(auth()->user()->isAdministrator()): ?>
        <a class="flex flex-row items-center mb-16" href="<?php echo e(route('admin.dashboard')); ?>">
            <img src="<?php echo e(asset('assets/images/logo-red-dot.png')); ?>" alt="dashboard" class="mr-2"/>
            <span class="text-lg font-bold text-red-700">PERFTRAKA</span>
        </a>
        <?php echo $__env->make('partials.asides.desktop.dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('partials.asides.desktop.admin.users', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('partials.asides.desktop.admin.company', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('partials.asides.desktop.admin.tag', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('partials.asides.desktop.admin.site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('partials.asides.desktop.admin.scan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('partials.asides.desktop.admin.attendance', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('partials.asides.desktop.admin.region', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('partials.asides.desktop.admin.incident', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php if(auth()->user()->isSuperAdmin()): ?>
            <?php echo $__env->make('partials.asides.desktop.admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php endif; ?>
        <?php echo $__env->make('partials.asides.desktop.admin.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>


</aside>
<?php /**PATH /Users/harmlessprince/webprojects/laravel/pmsapp/resources/views/partials/asides/desktop/desktop.blade.php ENDPATH**/ ?>