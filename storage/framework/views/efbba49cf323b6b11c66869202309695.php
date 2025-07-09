<?php $__env->startSection('title', 'Attendance Analytics'); ?>
<?php $__env->startSection('page', 'Attendance Analytics'); ?>
<?php $__env->startPush('header-scripts'); ?>
    <script src="https://cdn.tailwindcss.com"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

    <section>
        <?php if (isset($component)) { $__componentOriginalfc1e1378a12e46deb97ece02ae9d4c8d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc1e1378a12e46deb97ece02ae9d4c8d = $attributes; } ?>
<?php $component = App\View\Components\FilterCard::resolve(['actionUrl' => route('company.attendance.analytics'),'hasTable' => true,'canSearch' => true,'searchPlaceholder' => 'Search by first name or last name'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filter-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\FilterCard::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <input value="yes" name="date" hidden/>
            <div class="flex flex-col">
                <div class="relative">
                    <?php if (isset($component)) { $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-label','data' => ['for' => 'attendance_date_from_date','value' => __('Start date')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'attendance_date_from_date','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Start date'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
<?php $attributes = $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
<?php unset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
<?php $component = $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
<?php unset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
<?php endif; ?>
                    <div class="absolute bottom-[20%] start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-natural dark:text-gray-400" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <?php if (isset($component)) { $__componentOriginal18c21970322f9e5c938bc954620c12bb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18c21970322f9e5c938bc954620c12bb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input','data' => ['id' => 'name','class' => 'block w-full pl-[20%]','type' => 'text','datepicker' => true,'datepickerAutohide' => true,'datepickerFormat' => 'yyyy-mm-dd','placeholder' => 'Select start date','name' => 'attendance_date_from_date','value' => request()->query('attendance_date_from_date', $defaultStartMonth)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'name','class' => 'block w-full pl-[20%]','type' => 'text','datepicker' => true,'datepicker-autohide' => true,'datepicker-format' => 'yyyy-mm-dd','placeholder' => 'Select start date','name' => 'attendance_date_from_date','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->query('attendance_date_from_date', $defaultStartMonth))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $attributes = $__attributesOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__attributesOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $component = $__componentOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__componentOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
                </div>
            </div>
            <div class="flex flex-col">
                <div class="relative">
                    <?php if (isset($component)) { $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-label','data' => ['for' => 'attendance_date_to_date','value' => __('End date')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'attendance_date_to_date','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('End date'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
<?php $attributes = $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
<?php unset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
<?php $component = $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
<?php unset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
<?php endif; ?>
                    <div class="absolute bottom-[20%] start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-natural dark:text-gray-400" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <?php if (isset($component)) { $__componentOriginal18c21970322f9e5c938bc954620c12bb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18c21970322f9e5c938bc954620c12bb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input','data' => ['id' => 'scan_date_to_date','class' => 'block w-full pl-[20%]','type' => 'text','datepicker' => true,'datepickerAutohide' => true,'datepickerFormat' => 'yyyy-mm-dd','placeholder' => 'Select start date','name' => 'attendance_date_to_date','value' => request()->query('attendance_date_to_date', $defaultEndMonth)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'scan_date_to_date','class' => 'block w-full pl-[20%]','type' => 'text','datepicker' => true,'datepicker-autohide' => true,'datepicker-format' => 'yyyy-mm-dd','placeholder' => 'Select start date','name' => 'attendance_date_to_date','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->query('attendance_date_to_date', $defaultEndMonth))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $attributes = $__attributesOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__attributesOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $component = $__componentOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__componentOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
                </div>
            </div>
            <div class="flex flex-col">
                <?php if (isset($component)) { $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-label','data' => ['for' => 'site_id','value' => __('Site'),'class' => 'text-white']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'site_id','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Site')),'class' => 'text-white']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
<?php $attributes = $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
<?php unset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
<?php $component = $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
<?php unset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalfeb6a12ce012b104aaf16a7934073023 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfeb6a12ce012b104aaf16a7934073023 = $attributes; } ?>
<?php $component = App\View\Components\SelectInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SelectInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'site_id','class' => 'block w-full','name' => 'site_id']); ?>
                    <option class="" value="">All site</option>
                    <?php $__currentLoopData = $sites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $site): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option
                            value="<?php echo e($site->id); ?>" <?php echo e(request()->query('site_id') == $site->id ? "selected" : ''); ?>><?php echo e($site->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfeb6a12ce012b104aaf16a7934073023)): ?>
<?php $attributes = $__attributesOriginalfeb6a12ce012b104aaf16a7934073023; ?>
<?php unset($__attributesOriginalfeb6a12ce012b104aaf16a7934073023); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfeb6a12ce012b104aaf16a7934073023)): ?>
<?php $component = $__componentOriginalfeb6a12ce012b104aaf16a7934073023; ?>
<?php unset($__componentOriginalfeb6a12ce012b104aaf16a7934073023); ?>
<?php endif; ?>
            </div>
            <div class="flex flex-col">
                <?php if (isset($component)) { $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-label','data' => ['for' => 'frequency','value' => __('Time Period'),'class' => 'text-white']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'frequency','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Time Period')),'class' => 'text-white']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
<?php $attributes = $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
<?php unset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
<?php $component = $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
<?php unset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalfeb6a12ce012b104aaf16a7934073023 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfeb6a12ce012b104aaf16a7934073023 = $attributes; } ?>
<?php $component = App\View\Components\SelectInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\SelectInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'frequency','class' => 'block w-full','name' => 'frequency']); ?>
                    <?php $__currentLoopData = $frequencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $frequency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option class="bg-background_color"
                                value="<?php echo e($frequency); ?>" <?php echo e(request()->query('frequency') == $frequency ? "selected" : ''); ?>><?php echo e(strtoupper($frequency)); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfeb6a12ce012b104aaf16a7934073023)): ?>
<?php $attributes = $__attributesOriginalfeb6a12ce012b104aaf16a7934073023; ?>
<?php unset($__attributesOriginalfeb6a12ce012b104aaf16a7934073023); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfeb6a12ce012b104aaf16a7934073023)): ?>
<?php $component = $__componentOriginalfeb6a12ce012b104aaf16a7934073023; ?>
<?php unset($__componentOriginalfeb6a12ce012b104aaf16a7934073023); ?>
<?php endif; ?>
            </div>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfc1e1378a12e46deb97ece02ae9d4c8d)): ?>
<?php $attributes = $__attributesOriginalfc1e1378a12e46deb97ece02ae9d4c8d; ?>
<?php unset($__attributesOriginalfc1e1378a12e46deb97ece02ae9d4c8d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc1e1378a12e46deb97ece02ae9d4c8d)): ?>
<?php $component = $__componentOriginalfc1e1378a12e46deb97ece02ae9d4c8d; ?>
<?php unset($__componentOriginalfc1e1378a12e46deb97ece02ae9d4c8d); ?>
<?php endif; ?>
        <section class="border border-table rounded-lg w-[100%] mt-[2%] bg-background_color">
            <div class="overflow-x-auto">
                <table class="table-fixed w-[100%] max-lg:w-[1000px]">
                    <thead class="">
                    <tr class="text-left text-small text-natural font-big">
                        <th class="px-small py-[1%] w-[20%]">Name</th>
                        <th class="px-small py-[1%] w-[15%]">Site</th>
                        <th class=" px-small py-[1%] w-[13%]">CheckedIn At</th>
                        <th class="px-small py-[1%] w-[13%]">Checkout At</th>
                        <th class="px-small py-[1%] w-[13%]">Hours Worked</th>
                        <th class="px-small py-[1%] w-[13%]">Checked Out</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $analytics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $analytic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="text-normal font-normal text-natural border border-table border-collapse hover:bg-db">
                            <td class="px-small">
                                <?php echo e($analytic->user->first_name ?? ' '); ?>  <?php echo e($analytic->user->last_name ?? ' '); ?>

                            </td>
                            <td class="px-small">
                                <?php echo e($analytic->site->name ?? 'N/A'); ?>

                            </td>
                            <td class="text-natural px-small py-small">
                                <div><?php echo e(\Carbon\Carbon::parse($analytic->check_in_time)->format('d/m/Y')); ?></div>
                                <div><?php echo e(Carbon\Carbon::parse($analytic->check_in_time)->format('g:i A')); ?></div>
                            </td>
                            <td class="px-small">
                                <div><?php echo e(\Carbon\Carbon::parse($analytic->check_out_time)->format('d/m/Y')); ?></div>
                                <div><?php echo e(Carbon\Carbon::parse($analytic->check_out_time)->format('g:i A')); ?></div>
                            </td>
                            <td class="px-small">
                                <?php echo e(secondsToHoursMinutes($analytic->check_in_to_checkout_duration)); ?>

                            </td>
                            <td class="px-small uppercase">
                                <?php echo e($analytic->check_in_to_checkout_duration > 0 ? "YES" : "NO"); ?>

                            </td>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr class="text-normal font-normal border border-table border-collapse text-natural hover:bg-db">
                            <td class="text-center" colspan="7">No Data</td>
                        </tr>
                    <?php endif; ?>


                    </tbody>
                </table>
            </div>
            <?php echo e($analytics->appends(request()->except('page'))->links()); ?>

        </section>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>
    <script src="<?php echo e(asset('assets/js/transaction.js')); ?>"></script>
    <script>
        function resetForm() {
            $(".select-2-sites").val('').trigger('change')
            document.getElementById("search-form").reset();
            window.location.replace(location.pathname);
        }

    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/harmlessprince/webprojects/laravel/pmsapp/resources/views/attendance/analytics/daily.blade.php ENDPATH**/ ?>