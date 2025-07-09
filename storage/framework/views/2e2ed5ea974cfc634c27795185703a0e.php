<nav
    class="fixed w-[85%] max-lg:w-[100%] bg-background_color px-basic_padding py-1% text-natural flex flex-row justify-between items-center border border-r-[0] border-l-[0] border-t-[0] border-b-[0.5px] border-r-natural">

    <?php if (! empty(trim($__env->yieldContent('page')))): ?>
        <div class="flex flex-row items-center  w-[35%] max-lg:w-[75%] max-lg:py-[5%]">


            <?php echo $__env->yieldContent('page'); ?>

        </div>
    <?php else: ?>
        <div>
            <?php if(auth()->guard()->check()): ?>
                <div class="text-xl font-medium text-natural ">



                    Welcome back, <?php echo e(auth()->user()->first_name); ?>

                </div>
            <?php endif; ?>
            <div class="text-sm font-normal text-logo">
                Track, manage and excel.
            </div>
        </div>
    <?php endif; ?>

    <div class="relative max-lg:hidden">
        <div onclick="toggleProfile()" class="flex flex-row items-center cursor-pointer">

            <img src="<?php echo e(auth()->user()->profile_image ?? asset('assets/images/avatar.png')); ?>" alt="dashboard" class="mr-4 rounded-full w-[40px] h-[40px] "/>
            <img src="<?php echo e(asset('assets/images/chevron.png')); ?>" alt="dashboard" class="w-[12px] h-[6px] mr-2"/>
            <?php if(auth()->user()->isCompanyOwner()): ?>
                <span class="text-sm"><?php echo e(strtoupper(str_replace('_', ' ', optional(auth()->user()->company)->name))); ?></span>
            <?php elseif(auth()->user()->isAdministrator()): ?>
                <span class="text-sm"><?php echo e(strtoupper(str_replace('_', ' ', auth()->user()->roles[0]->name))); ?></span>
            <?php endif; ?>

        </div>
        <form id="frm-logout" action="<?php echo e(route('logout')); ?>" style="display: none;">
            <?php echo e(csrf_field()); ?>

        </form>
        <div id="profileList"
             class="hidden bg-white absolute bottom-[-110%]  w-[200px] right-0 rounded-lg  p-3">
            <ul>
                <li class="text-logout font-big text-normal">
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
                </li>

            </ul>
        </div>
    </div>
    <!-- menu icon for mobile view -->
    <img
        onclick="toggleSideBar()"
        width="18" height="18"
        src="https://img.icons8.com/ios/18/ffffff/menu--v1.png"
        alt="menu--v1"
        class="lg:hidden"
    />
</nav>
<?php /**PATH /Users/harmlessprince/webprojects/laravel/pmsapp/resources/views/partials/header.blade.php ENDPATH**/ ?>