<?php $__env->startSection('title', 'Incident'); ?>
<?php $__env->startSection('page'); ?>
    <h2>Incident Reports</h2>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('header-links'); ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

<?php $__env->stopPush(); ?>
<?php $__env->startPush('header-scripts'); ?>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

    <!-- Dashboard content -->
    <?php echo $__env->make('image-view-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <section class="">
        <?php if (isset($component)) { $__componentOriginalfc1e1378a12e46deb97ece02ae9d4c8d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc1e1378a12e46deb97ece02ae9d4c8d = $attributes; } ?>
<?php $component = App\View\Components\FilterCard::resolve(['actionUrl' => route('incidents.index'),'canSearch' => true,'searchPlaceholder' => 'Search by name','canExport' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-label','data' => ['for' => 'created_at_from_date','value' => __('Start date')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'created_at_from_date','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Start date'))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input','data' => ['id' => 'created_at_from_date','class' => 'block w-full pl-[20%]','type' => 'text','datepicker' => true,'datepickerAutohide' => true,'datepickerFormat' => 'dd-mm-yyyy','placeholder' => 'Select start date','name' => 'created_at_from_date','value' => request()->query('created_at_from_date')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'created_at_from_date','class' => 'block w-full pl-[20%]','type' => 'text','datepicker' => true,'datepicker-autohide' => true,'datepicker-format' => 'dd-mm-yyyy','placeholder' => 'Select start date','name' => 'created_at_from_date','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->query('created_at_from_date'))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-label','data' => ['for' => 'created_at_to_date','value' => __('End date')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'created_at_to_date','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('End date'))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input','data' => ['id' => 'created_at_to_date','class' => 'block w-full pl-[20%]','type' => 'text','datepicker' => true,'datepickerAutohide' => true,'datepickerFormat' => 'dd-mm-yyyy','placeholder' => 'Select end date','name' => 'created_at_to_date','value' => request()->query('created_at_to_date')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'created_at_to_date','class' => 'block w-full pl-[20%]','type' => 'text','datepicker' => true,'datepicker-autohide' => true,'datepicker-format' => 'dd-mm-yyyy','placeholder' => 'Select end date','name' => 'created_at_to_date','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->query('created_at_to_date'))]); ?>
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

            <?php if(auth()->user()->hasAnyRole(['super_admin', 'admin'])): ?>
                <div class="flex flex-col">
                    <?php if (isset($component)) { $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-label','data' => ['for' => 'company_id','value' => __('Select Company')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'company_id','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Select Company'))]); ?>
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
<?php $component->withAttributes(['id' => 'company_id','class' => 'block mt-1 w-full','name' => 'company_id']); ?>
                        <option value="">Select Company</option>
                        <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option
                                value="<?php echo e($company->id); ?>" <?php echo e(request()->query('company_id') == $company->id ? "selected" : ''); ?>><?php echo e($company->name); ?></option>
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
                    <div class="flex flex-row items-center h-6">
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
                        <?php if (isset($component)) { $__componentOriginal9b0da1ce4a7273760fcbfd5667774437 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9b0da1ce4a7273760fcbfd5667774437 = $attributes; } ?>
<?php $component = App\View\Components\Loader::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('loader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Loader::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9b0da1ce4a7273760fcbfd5667774437)): ?>
<?php $attributes = $__attributesOriginal9b0da1ce4a7273760fcbfd5667774437; ?>
<?php unset($__attributesOriginal9b0da1ce4a7273760fcbfd5667774437); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9b0da1ce4a7273760fcbfd5667774437)): ?>
<?php $component = $__componentOriginal9b0da1ce4a7273760fcbfd5667774437; ?>
<?php unset($__componentOriginal9b0da1ce4a7273760fcbfd5667774437); ?>
<?php endif; ?>
                    </div>
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
                        <option class="" value="">Select a site</option>
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
            <?php else: ?>
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
<?php $component->withAttributes(['id' => 'site_ids','class' => 'block w-full','name' => 'site_id']); ?>
                        <option class="" value="">All site</option>
                        <?php $__currentLoopData = $sites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option
                                value="<?php echo e($item->id); ?>" <?php echo e(request()->query('site_id') == $item->id ? "selected" : ''); ?>><?php echo e($item->name); ?></option>
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
            <?php endif; ?>

            <div class="flex flex-col">
                <?php if (isset($component)) { $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-label','data' => ['for' => 'type','value' => __('Type')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'type','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Type'))]); ?>
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
<?php $component->withAttributes(['id' => 'type','class' => 'block mt-1 w-full','name' => 'type']); ?>
                    <option value="">Select Type</option>
                    <option
                        value="storage" <?php echo e(request()->query('type') == 'storage' ? "selected" : ''); ?>>
                        Storage Purpose
                    </option>
                    <option
                        value="rapid" <?php echo e(request()->query('type') == 'rapid' ? "selected" : ''); ?>>
                        Rapid Response
                    </option>
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

        <!-- table -->
        <section class="border border-table mt-[2%] rounded-lg">
            <div class="overflow-x-auto">
                <table class="table-auto w-[100%] max-lg:w-[1000px] bg-background_color">
                    <thead>
                    <tr class="">
                        <th class="text-left text-small text-natural font-big  px-smaller py-smaller w-[12%]">
                            Name
                        </th>
                        <th class="text-left text-small text-natural font-big  px-smaller py-smaller w-[9%]">
                            Time/Date
                        </th>
                        <th class="text-left text-small text-natural font-big  px-smaller py-smaller w-[12%]">
                            Type
                        </th>
                        <th class="text-left text-small text-natural font-big px-smaller py-smaller w-[9%]">Site</th>
                        
                        <th class="text-left text-small text-natural font-big px-smaller py-smaller w-[8%]">Image</th>
                        <th class="text-left text-small text-natural font-big px-smaller py-smaller w-[12%]">Comment
                        </th>
                        <th class="text-left text-small text-natural font-big px-smaller py-smaller w-[12%]">Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $incidents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="border border-table border-x-0 text-natural hover:bg-db">
                            <td class="text-normal font-normal px-smaller"><?php echo e($item->reportedBy->first_name ?? 'N/A'); ?> <?php echo e($item->reportedBy->last_name ?? ''); ?></td>
                            <td class="text-normal font-normal px-smaller">
                                <div><?php echo e($item->created_at->format('d/m/Y')); ?></div>
                                <div><?php echo e(Carbon\Carbon::parse($item->created_at)->format('g:i A')); ?></div>
                            </td>
                            <td class="text-normal font-normal px-smaller">
                                <?php if($item->type == 'storage'): ?>
                                    <button
                                        class="bg-checkin  px-2 py-1 me-2 rounded-full flex flex-row items-center justify-between">
                                        <span class="text-checkInText font-bold text-small">Storage Purpose</span>
                                    </button>
                                <?php endif; ?>
                                <?php if($item->type == 'rapid'): ?>
                                    <button
                                        class="bg-red-200  px-2 py-1 me-2 rounded-full flex flex-row items-center justify-between">
                                        <span class="text-red-500 text-small font-bold">Rapid Response</span>
                                    </button>
                                <?php endif; ?>
                            </td>
                            <td class="text-normal font-normal px-smaller"><?php echo e($item->site->name ?? ''); ?></td>

                            <td class="text-normal font-normal px-small">
                                <img src="<?php echo e($item->image ?? asset('assets/images/tableImg.png')); ?>"
                                     alt="dashboard"
                                     class=" w-[60px] h-[60px]"
                                     data-modal-target="imageViewModalElement"
                                     data-modal-toggle="imageViewModalElement"
                                     onclick='showImageModal("<?php echo e($item->image); ?>", "<?php echo e($item->comment); ?>")'
                                />
                            </td>
                            <td class="text-normal font-normal px-smaller"><?php echo e($item->comment ?? 'n/a'); ?></td>
                            <td class="px-smaller">

                                    <form id="frm-delete-item-<?php echo e($item->id); ?>"
                                          action="<?php echo e(route('incidents.destroy', ['incident' => $item])); ?>"
                                          style="display: none;" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('delete'); ?>

                                    </form>
                                    <a href=""
                                       onclick='deleteItem(event, <?php echo e("$item->id"); ?>)' title="Delete an incident report">
                                            <span
                                                class="material-symbols-outlined mr-4 w-[24px] h-[24px] text-red-500 cursor-pointer">delete</span>
                                    </a>

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
            <?php echo e($incidents->links()); ?>

        </section>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        const selectSite = document.getElementById("site_id");
        const selectCompany = document.getElementById("company_id");
        $(document).ready(function () {
            // $('.select-2-sites').select2({
            //     placeholder: "Select a site",
            //     allowClear: true
            // });
            selectSite.disabled = true;
            const companyParamValue = getQueryParamValue('company_id');
            console.log(companyParamValue)
            if (companyParamValue != null) {
                getCompanySites(companyParamValue)
            }

        });

        selectCompany.addEventListener("change", function (e) {
            getCompanySites(e.target.value)
        });

        function resetForm() {
            $(".select-2-sites").val('').trigger('change')
            document.getElementById("search-form").reset();
            window.location.replace(location.pathname);
        }

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/harmlessprince/webprojects/laravel/pmsapp/resources/views/incident/index.blade.php ENDPATH**/ ?>