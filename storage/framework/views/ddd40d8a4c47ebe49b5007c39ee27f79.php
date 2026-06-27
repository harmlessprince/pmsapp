<!-- aside for mobile view -->
<aside id="mobileAside" class="bg-background_color w-[100%] h-screen px-5% py-1% text-natural border border-r-[0.5px]
        border-l-[0] border-t-[0] border-b-[0] border-r-natural hidden lg:hidden z-50 fixed top-0 left-0">
    <?php if(auth()->user()->isCompanyOwner()): ?>
        <div class="flex flex-row items-center mb-16">
            <img src="<?php echo e(asset('assets/images/logo-red-dot.png')); ?>" alt="dashboard" class="mr-2"/>
            <span class="text-lg font-medium text-primary_color">PERFTRAKA</span>
            <div class="flex-1"></div>
            <img onclick="toggleSideBar()" width="22" height="22"
            src="https://img.icons8.com/ios/22/ffffff/cancel.png"
                 alt="cancel"/>
        </div>
        <?php echo $__env->make('partials.asides.desktop.dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('partials.asides.desktop.company.analytics', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('partials.asides.desktop.company.transactions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('partials.asides.desktop.company.management', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php elseif(auth()->user()->isAdministrator()): ?>
        <div class="flex flex-row items-center mb-16">
            <img src="<?php echo e(asset('assets/images/logo-red-dot.png')); ?>" alt="dashboard" class="mr-2"/>
            <span class="text-lg font-medium text-primary_color">PERFTRAKA</span>
            <div class="flex-1"></div>
            <img onclick="toggleSideBar()" width="22" height="22" src="https://img.icons8.com/ios/22/ffffff/cancel.png"
                 alt="cancel"/>
        </div>
        <?php echo $__env->make('partials.asides.desktop.dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('partials.asides.desktop.admin.users', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('partials.asides.desktop.admin.company', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('partials.asides.desktop.admin.tag', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('partials.asides.desktop.admin.site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('partials.asides.desktop.admin.scan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('partials.asides.desktop.admin.attendance', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('partials.asides.desktop.admin.region', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php if(auth()->user()->isSuperAdmin()): ?>
            <?php echo $__env->make('partials.asides.desktop.admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php echo $__env->make('partials.asides.desktop.admin.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <div class="mb-8 cursor-pointer">
        <form id="frm-logout" action="<?php echo e(route('logout')); ?>" style="display: none;">
            <?php echo e(csrf_field()); ?>

        </form>
        <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
           href="<?php echo e(route('logout')); ?>"
           onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
            <svg class=" w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round"
                 stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path
                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                </path>
            </svg>
            <span>Log out</span>
        </a>
    </div>
</aside>
<!-- end of side bar -->
<?php /**PATH /Users/harmlessprince/webprojects/laravel/pmsapp/resources/views/partials/asides/desktop/mobile.blade.php ENDPATH**/ ?>