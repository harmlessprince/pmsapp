<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>

 <!-- tag section -->
 <section class="grid grid-cols-4 gap-5 max-small:grid-cols-1 small:max-big:grid-cols-2 justify-between w-[100%] max-lg:mt-[3em]">
    <div
    class="flex flex-row bg-background_color rounded-lg h-[111px] w-full items-center px-[20px] max-lg:mx-auto">
    <div class="w-[44px] h-[44px] bg-primary_color rounded-lg flex flex-row items-center justify-center">
        
        <span class="material-symbols-outlined w-[24px] h-[24px] text-natural">account_balance</span>
    </div>
    <div class="ml-[5%]">
        <h1 class="font-bold text-3xl text-primary_color"><?php echo e($countOfCompanies); ?></h1>
        <span class="font-normal text-sm text-primary_color">Companies</span>
    </div>
</div>

    <div
        class="flex flex-row bg-background_color rounded-lg h-[111px] w-full items-center px-[20px] max-lg:mx-auto">
        <div class="w-[44px] h-[44px] bg-site rounded-lg flex flex-row items-center justify-center">
            <img src="<?php echo e(asset('assets/images/site.png')); ?>" alt="dashboard"/>
        </div>
        <div class="ml-[5%]">
            <h1 class="font-bold text-3xl text-site"><?php echo e($countOfSites); ?></h1>
            <span class="font-normal text-sm text-site">Sites</span>
        </div>
    </div>

    <div
        class="flex flex-row bg-background_color rounded-lg h-[111px] w-full items-center px-[20px] max-lg:mx-auto">
        <div class="w-[44px] h-[44px] bg-tags rounded-lg flex flex-row items-center justify-center">
            <span class="material-symbols-outlined w-[24px] h-[24px] text-natural">sell</span>
        </div>
        <div class="ml-[5%]">
            <h1 class="font-bold text-3xl text-tags"><?php echo e($countOfTags); ?></h1>
            <span class="font-normal text-sm text-tags">Tags</span>
        </div>
    </div>

    <div
        class="flex flex-row bg-background_color rounded-lg h-[111px] w-full items-center px-[20px] max-lg:mx-auto">
        <div class="w-[44px] h-[44px] bg-guards rounded-lg flex flex-row items-center justify-center">
            <span class="material-symbols-outlined w-[24px] h-[24px] text-natural">person</span>
        </div>
        <div class="ml-[5%]">
            <h1 class="font-bold text-3xl text-guards"><?php echo e($countOfUsers); ?></h1>
            <span class="font-normal text-sm text-guards">Personnel's</span>
        </div>
    </div>
</section>

 <section class="pt-basic_padding overflow-x-auto max-lg:w-[100%] max-lg:mt-[5%]">
     <div class="font-big text-big text-natural mb-2%"> Recent Scan Report</div>
     <section class="border border-table mt-[2%] rounded-lg bg-background_color overflow-x-auto">
         <table class=" table-fixed w-[100%] bg-background_color rounded-lg max-lg:w-[1000px]">
             <thead>
             <tr class="text-left border border-x-0 border-y-0 border-table border-collapse">
                 <th class="text-small text-natural font-big  px-smaller py-[1%]">Scan Date/Time</th>
                 <th class="text-small text-natural font-big px-smaller py-[1%]">Tag Name</th>
                 <th class="text-small text-natural font-big px-smaller py-[1%] w-[25%]">Site Name</th>
                 <th class="text-small text-natural font-big px-smaller py-[1%] w-[25%]">Proximity</th>

             </tr>
             </thead>
             <tbody>
             <?php $__empty_1 = true; $__currentLoopData = $latestScans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                 <tr class="border border-table border-x-0 border-b-0 text-natural hover:bg-db">
                     <td class="text-normal font-normal px-smaller py-smaller">
                         <div><?php echo e($scan->scan_date->format('d/m/Y')); ?></div>
                         <div><?php echo e(Carbon\Carbon::parse($scan->scan_time)->format('g:i A')); ?></div>
                     </td>
                     <td class="text-normal font-normal px-smaller py-smaller"><?php echo e($scan->tag->name); ?></td>
                     <td class="text-normal font-normal px-smaller py-smaller"><?php echo e($scan->site->name); ?></td>
                     <td class="text-normal font-normal px-smaller py-smaller"><?php echo e($scan->proximity); ?></td>

                 </tr>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                 <tr class="text-normal font-normal border border-table border-collapse text-natural hover:bg-db">
                     <td class="text-center" colspan="7">No Data</td>
                 </tr>

             <?php endif; ?>
             </tbody>
         </table>
     </section>
 </section>
 <!-- table 2 section -->
 <section class="pt-basic_padding max-lg:w-[100%] max-lg:mt-[5%]">
     <div class="font-big text-big text-natural mb-2%">Recent Attendance Report</div>
     <section class="border border-table mt-[2%] rounded-lg bg-background_color overflow-x-auto">
         <table class="table-fixed w-[100%] bg-background_color max-lg:w-[1000px]">
             <thead>
             <tr class="">
                 <th class="text-left text-small text-natural font-big  px-smaller py-smaller w-[18%]">
                     Name
                 </th>
                 <th class="text-left text-small text-natural font-big  px-smaller py-smaller w-[13%]">Time/Date</th>
                 <th class="text-left text-small text-natural font-big  px-smaller py-smaller">Action Type</th>
                 <th class="text-left text-small text-natural font-big px-smaller py-smaller w-[20%]">Site</th>

                 <th class="text-left text-small text-natural font-big px-smaller py-smaller w-[8%]">Image</th>
                 <th class="text-left text-small text-natural font-big px-smaller py-smaller">Proximity</th>
             </tr>
             </thead>
             <tbody>
             <?php $__empty_1 = true; $__currentLoopData = $latestAttendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                 <tr class="border border-table border-x-0 border-b-0 text-natural hover:bg-db">
                     <td class="text-normal font-normal px-smaller"><?php echo e($attendance->user->first_name); ?> <?php echo e($attendance->user->last_name); ?></td>
                     <td class="text-normal font-normal px-smaller">
                         <div><?php echo e($attendance->attendance_date->format('d/m/Y')); ?></div>
                         <div><?php echo e(Carbon\Carbon::parse($attendance->attendance_time)->format('g:i A')); ?></div>
                     </td>
                     <td class="text-normal font-normal px-smaller">
                         <?php if($attendance->action_type == 'check_in'): ?>
                             <button
                                 class="bg-checkin W-[78px] h-[22px] p-5% rounded-full flex flex-row items-center justify-between">
                                 <img src="<?php echo e(asset('assets/images/green_dot.png')); ?>" alt="dashboard" class="mr-2"/>
                                 <span class="text-checkInText font-big text-small">Check in</span>
                             </button>
                         <?php endif; ?>
                         <?php if($attendance->action_type == 'check_out'): ?>
                             <button
                                 class="bg-checkout W-[78px] h-[22px] p-5% rounded-full flex flex-row items-center justify-between">
                                 <img src="<?php echo e(asset('assets/images/red_dot.png')); ?>" alt="dashboard" class="mr-2"/>
                                 <span class="text-checkInText font-big text-small">Check out</span>
                             </button>
                         <?php endif; ?>

                     </td>
                     <td class="text-normal font-normal px-smaller"><?php echo e($attendance->site->name); ?></td>

                     <td class="text-normal font-normal px-smaller">
                         <?php if($attendance->image): ?>
                             <img src="<?php echo e($attendance->image); ?>"
                                  alt="dashboard"
                                  class=" w-[60px] h-[60px]"
                                  data-modal-target="imageViewModalElement"
                                  data-modal-toggle="imageViewModalElement"
                                  onclick='showImageModal("<?php echo e($attendance->image); ?>")'
                             />
                         <?php else: ?>
                             No Image
                         <?php endif; ?>
                     </td>
                     <td class="text-normal font-normal p-smaller"><?php echo e($attendance->proximity); ?></td>
                 </tr>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                 <tr class="text-normal font-normal border border-table border-collapse text-natural hover:bg-db">
                     <td class="text-center" colspan="7">No Data</td>
                 </tr>

             <?php endif; ?>

             </tbody>
         </table>
     </section>
 </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/harmlessprince/webprojects/laravel/pmsapp/resources/views/dashboard/admin.blade.php ENDPATH**/ ?>