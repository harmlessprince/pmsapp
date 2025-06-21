<?php
    $isScanTransaction =  strpos(Route::currentRouteName(), 'company.scans.transactions') === 0;
    $isAttendanceTransaction =  strpos(Route::currentRouteName(), 'company.attendance.transactions') === 0;
    $isIncidentManagement = strpos(Route::currentRouteName(), 'company.incidents.index') === 0;
    $isTransaction = $isScanTransaction || $isAttendanceTransaction || $isIncidentManagement;

?>
<div class="mb-8 cursor-pointer">
    <div onclick="toggleSidebarDropdown('dropdownTransaction')" id="dropdownNavbarLink" class="flex flex-row relative">
        <span class="material-symbols-outlined mr-4 w-[24px] h-[24px] <?php echo e($isTransaction ? 'text-primary_color' : 'text-natural'); ?>">earthquake</span>
        <span class=" <?php echo e($isTransaction ? 'text-primary_color' : 'text-natural'); ?> text-base font-medium">Transactions</span>
        <img src="<?php echo e(asset('assets/images/dropdown.png')); ?>" alt="dashboard"
             class="mr-4 w-3 h-1.5 absolute right-0 bottom-2"/>
    </div>
    <div id="dropdownTransaction" class="hidden dropdownMenuContent">
        <ul class="">
            <li>
                <a href="<?php echo e(route('company.scans.transactions')); ?>"
                   class="block pl-[16%] pt-2 <?php echo e($isScanTransaction ? 'text-primary_color' : 'text-natural'); ?> font-headerWeight text-normal hover:text-primary_color">Scan
                    Transactions</a>
            </li>
            <li>
                <a  href="<?php echo e(route('company.attendance.transactions')); ?>"
                   class="block  pl-[16%] pt-2 <?php echo e($isAttendanceTransaction ? 'text-primary_color' : 'text-natural'); ?>  font-headerWeight text-normal hover:text-primary_color">Attendance
                    Transactions</a>
            </li>
            <li>
                <a href="<?php echo e(route('incidents.index')); ?>"
                   class="block pl-[16%] pt-2 text-natural font-headerWeight text-normal hover:text-primary_color <?php echo e($isIncidentManagement ? 'text-primary_color' : 'text-natural'); ?>">Incident
                    Transactions</a>
            </li>
        </ul>
    </div>
</div>
<?php /**PATH /Users/harmlessprince/webprojects/laravel/pmsapp/resources/views/partials/asides/desktop/company/transactions.blade.php ENDPATH**/ ?>