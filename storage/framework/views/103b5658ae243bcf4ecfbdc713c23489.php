<?php
    $isTagManagement =  strpos(Route::currentRouteName(), 'company.tags.index') === 0;
    $isUserManagement =  strpos(Route::currentRouteName(), 'company.users.index') === 0;
    $isSiteManagement = strpos(Route::currentRouteName(), 'company.sites.index') === 0;
    $isRegionManagement =  strpos(Route::currentRouteName(), 'company.regions.index') === 0;
    $isManagement = $isTagManagement || $isUserManagement || $isSiteManagement || $isRegionManagement;

?>
<div class="mb-8 cursor-pointer">
    <div onclick="toggleSidebarDropdown('dropdownManagements')" id="dropdownNavbarLink"
         class="flex flex-row relative">
        <span class="material-symbols-outlined mr-4 w-[24px] h-[24px] <?php echo e($isManagement ? 'text-primary_color' : 'text-natural'); ?>">person</span>
        <span class="text-base font-medium <?php echo e($isManagement ? 'text-primary_color' : 'text-natural'); ?>" >Management</span>
        <img src="<?php echo e(asset('assets/images/dropdown.png')); ?>" alt="dashboard"
             class="mr-4 w-3 h-1.5 absolute right-0 bottom-2"/>
    </div>
    <div id="dropdownManagements" class="hidden dropdownMenuContent">
        <ul class="">
            <li>
                <a href="<?php echo e(route('company.users.index')); ?>"
                   class="block pl-[16%] pt-2 text-natural font-headerWeight text-normal hover:text-primary_color <?php echo e($isUserManagement ? 'text-primary_color' : 'text-natural'); ?>">Personnel
                    Management</a>
            </li>
            <li>
                <a href="<?php echo e(route('company.tags.index')); ?>"
                   class="block pl-[16%] pt-2 text-natural font-headerWeight text-normal hover:text-primary_color <?php echo e($isTagManagement ? 'text-primary_color' : 'text-natural'); ?>">Tag
                    Management</a>
            </li>
            <li>
                <a href="<?php echo e(route('company.sites.index')); ?>"
                   class="block pl-[16%] pt-2 text-natural font-headerWeight text-normal hover:text-primary_color <?php echo e($isSiteManagement ? 'text-primary_color' : 'text-natural'); ?>">Site
                    Management</a>
            </li>
            <li>
                <a href="<?php echo e(route('company.regions.index')); ?>"
                   class="block pl-[16%] pt-2 text-natural font-headerWeight text-normal hover:text-primary_color <?php echo e($isRegionManagement ? 'text-primary_color' : 'text-natural'); ?>">Region
                    Management</a>
            </li>
        </ul>
    </div>
</div>
<?php /**PATH /Users/harmlessprince/webprojects/laravel/pmsapp/resources/views/partials/asides/desktop/company/management.blade.php ENDPATH**/ ?>