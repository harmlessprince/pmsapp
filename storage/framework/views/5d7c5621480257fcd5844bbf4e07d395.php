<?php $__env->startSection('title', 'Company Management'); ?>
<?php $__env->startSection('page', 'Company Management'); ?>
<?php $__env->startPush('header-scripts'); ?>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

    <section>
        <section class="flex flex-row justify-start w-[100%] max-lg:mt-[3em]">
            <div
                class="flex flex-row bg-background_color rounded-lg h-[111px] w-[290px] max-small:w-full items-center px-[20px]">
                <div class="w-[44px] h-[44px] bg-primary_color rounded-lg flex flex-row items-center justify-center">
                    <span class="material-symbols-outlined text-white">account_balance</span>
                </div>
                <div class="ml-[5%]">
                    <h1 class="font-bold text-3xl text-primary_color"><?php echo e($countCompany); ?></h1>
                    <span class="font-normal text-sm text-primary_color">Companies</span>
                </div>
            </div>
        </section>

        <!-- table section -->
        <section class="pt-basic_padding">
            <!-- add user -->
            <div class="font-big text-big text-natural mb-2 flex flex-row justify-between">
                <div>Added Companies</div>
                <div
                    class="rounded-lg border border-primary_color flex flex-row items-center px-[16px] py-[10px] cursor-pointer">
                    <span class="material-symbols-outlined text-primary_color">add</span>
                    <a href="<?php echo e(route('admin.companies.create')); ?>">
                        <span class="text-primary_color font-big text-normal ml-2"> Add New Company</span>
                    </a>
                </div>
            </div>
            <?php if (isset($component)) { $__componentOriginalfc1e1378a12e46deb97ece02ae9d4c8d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc1e1378a12e46deb97ece02ae9d4c8d = $attributes; } ?>
<?php $component = App\View\Components\FilterCard::resolve(['actionUrl' => route('admin.companies.index'),'canSearch' => true,'searchPlaceholder' => 'Search by name or phone number'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filter-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\FilterCard::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <div class="flex flex-col">
                    <?php if (isset($component)) { $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-label','data' => ['for' => 'state_id','value' => __('Select State')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'state_id','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Select State'))]); ?>
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
<?php $component->withAttributes(['id' => 'state_id','class' => 'block mt-1 w-full','name' => 'state_id']); ?>
                        <option value="">Select State</option>
                        <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option
                                value="<?php echo e($state->id); ?>" <?php echo e(request()->query('state_id') == $state->id ? "selected" : ''); ?>><?php echo e($state->name); ?></option>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-label','data' => ['for' => 'status','value' => __('Select Status')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('input-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'status','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Select Status'))]); ?>
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
<?php $component->withAttributes(['id' => 'status','class' => 'block mt-1 w-full','name' => 'status']); ?>
                        <option value="">Select Status</option>
                        <option value="active" <?php echo e(request()->query('status') == 'active' ? "selected" : ''); ?>>
                            Active
                        </option>
                        <option value="inactive" <?php echo e(request()->query('status') == 'inactive' ? "selected" : ''); ?>>
                            Inactive
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


            <!-- table 2 section -->
            <section class="border border-table rounded-lg w-[100%] mt-[2%] bg-background_color">
                <div class="overflow-x-auto">
                    <table class="table-fixed w-[100%] max-lg:w-[1000px]">
                        <thead class="">
                        <tr class="text-left text-small text-natural font-big">
                            <th class="px-smaller py-[1%] w-[10%]">State</th>
                            <th class="px-smaller py-[1%] w-[21%]">Display name</th>
                            <th class="px-smaller py-[1%] w-[24%]">Email</th>
                            <th class="px-smaller py-[1%]  w-[18%]">Name</th>
                            <th class="px-smaller py-[1%]">Tags</th>
                            <th class="px-smaller py-[1%]">Status</th>
                            <th class="px-smaller py-[1%] text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="text-normal font-normal border border-table border-x-0 border-b-0 text-natural hover:bg-db">
                                <td class="text-natural px-smaller py-small">
                                    <?php echo e($company->state->name  ?? 'N/A'); ?>

                                </td>

                                <td class="px-smaller">
                                    <?php echo e($company->display_name); ?>

                                </td>

                                <td class="px-smaller">
                                    <?php echo e(optional($company->owner)->email); ?>

                                </td>

                                <td class="px-smaller">
                                    <?php echo e(optional($company->owner)->first_name); ?> <?php echo e(optional($company->owner)->last_name); ?>

                                </td>
                                <td class="px-smaller">
                                    <?php echo e($company->maximum_number_of_tags); ?>

                                </td>

                                <td class="px-smaller">
                                    <?php if((bool)$company->status): ?>
                                        <button
                                            class="bg-foundation W-[78px] h-[22px] px-[8px] py-[2px] rounded-full flex flex-row items-center justify-between">
                                            <img src="<?php echo e(asset('assets/images/white_dot.png')); ?>" alt="dashboard"
                                                 class="mr-2"/>
                                            <span class="text-natural font-big text-small">Active</span>
                                        </button>
                                    <?php else: ?>
                                        <button
                                            class="bg-inactive W-[78px] h-[22px] px-[8px] py-[2px] rounded-full flex flex-row items-center justify-between">
                                            <img src="<?php echo e(asset('assets/images/white_dot.png')); ?>" alt="dashboard"
                                                 class="mr-2"/>
                                            <span class="text-natural font-big text-small">Inactive</span>
                                        </button>
                                    <?php endif; ?>
                                </td>

                                <td class="px-small text-right">
                                    <div class="flex flex-row justify-between gap-1">
                                        <a href="<?php echo e(route('admin.companies.edit', ['company' => $company->id])); ?>">

                                        <span
                                            class="material-symbols-outlined w-[16px] h-[16px] ml-3 cursor-pointer text-natural">edit_square</span>
                                        </a>

                                        <a href=""
                                           onclick='deleteItem(event, <?php echo e("$company->id"); ?>, "Are you sure you want to delete this site, all related scans, attendances, tags, personnel&#39;s and sites will be deleted as well")' class="flex">
                                            <span
                                                class="material-symbols-outlined mr-4 w-[24px] h-[24px] text-red-500 cursor-pointer">delete</span>
                                        </a>
                                        <form id="frm-delete-item-<?php echo e($company->id); ?>"
                                              action="<?php echo e(route('admin.companies.destroy', ['company' => $company])); ?>"
                                              style="display: none;" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('delete'); ?>

                                        </form>

                                    </div>
                                </td>
                            </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr class="text-normal font-normal border border-table border-collapse text-natural hover:bg-db">
                                <td class="text-center" colspan="5">No Data</td>
                            </tr>
                        <?php endif; ?>


                        </tbody>
                    </table>
                </div>
                 <?php echo e($companies->links()); ?>

            </section>
        </section>
    </section>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
    <script>
        const filterDropdown = document.querySelector("#filter");
        const toggleFilter = () => {
            filterDropdown.classList.toggle("hidden")
        }

        function exportUsers() {
            console.log("export button clicked")
        }

        function resetForm() {
            $(".site").val('').trigger('change')
            document.getElementById("search-form").reset();
            window.location.replace(location.pathname);
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/harmlessprince/webprojects/laravel/pmsapp/resources/views/admin/company/index.blade.php ENDPATH**/ ?>