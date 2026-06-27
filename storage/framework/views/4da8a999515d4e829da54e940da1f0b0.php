<?php
    $isAdminAttendancePage =  strpos(Route::currentRouteName(), 'admin.attendance.index') === 0;

?>
<div class="mb-8 cursor-pointer">
    <a
        class="flex flex-row relative" href="<?php echo e(route('admin.attendance.index')); ?>">
        <span class="material-symbols-outlined mr-4 w-[24px] h-[24px] <?php echo e($isAdminAttendancePage == true ? 'text-primary_color' : 'text-natural'); ?>">person_check</span>
        <span class="text-base font-medium <?php echo e($isAdminAttendancePage == true ? 'text-primary_color' : 'text-natural'); ?>">Attendance</span>
    </a>
</div>
<?php /**PATH /Users/harmlessprince/webprojects/laravel/pmsapp/resources/views/partials/asides/desktop/admin/attendance.blade.php ENDPATH**/ ?>