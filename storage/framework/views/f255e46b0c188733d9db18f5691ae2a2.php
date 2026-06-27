<?php
    $isAdminIncidentPage =  strpos(Route::currentRouteName(), 'incidents.index') === 0;

?>
<div class="mb-8 cursor-pointer">
    <a
        class="flex flex-row relative" href="<?php echo e(route('incidents.index')); ?>">
        <span class="material-symbols-outlined mr-4 w-[24px] h-[24px] <?php echo e($isAdminIncidentPage == true ? 'text-primary_color' : 'text-natural'); ?>">e911_emergency</span>
        <span class="text-base font-medium <?php echo e($isAdminIncidentPage == true ? 'text-primary_color' : 'text-natural'); ?>">Incident Report</span>
    </a>
</div>
<?php /**PATH /Users/harmlessprince/webprojects/laravel/pmsapp/resources/views/partials/asides/desktop/admin/incident.blade.php ENDPATH**/ ?>