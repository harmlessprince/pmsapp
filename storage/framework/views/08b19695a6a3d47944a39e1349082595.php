<?php $__env->startSection('title', 'Personnel'); ?>
<?php $__env->startSection('page', 'Personnel Management'); ?>
<?php $__env->startPush('header-scripts'); ?>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

    <section>
        <section class="flex flex-row justify-start w-[100%] max-lg:mt-[3em]">
            <div
                class="flex flex-row bg-background_color rounded-lg h-[111px] w-[290px] max-small:w-full items-center px-[20px]">
                <div class="w-[44px] h-[44px] bg-guards rounded-lg flex flex-row items-center justify-center">
                    <span class="material-symbols-outlined text-white">person</span>
                </div>
                <div class="ml-[5%]">
                    <h1 class="font-bold text-3xl text-guards"><?php echo e($usersCount); ?></h1>
                    <span class="font-normal text-sm text-guards">Personnel</span>
                </div>
            </div>
        </section>

        <!-- table section -->
        <section class="pt-basic_padding">
            <!-- add user -->
            <div class="font-big text-big text-natural mb-2 flex flex-row justify-between">
                <div>Added Personnel</div>
                <div
                    class="rounded-lg border border-primary_color flex flex-row items-center px-[16px] py-[10px] cursor-pointer">
                    
                    <span class="material-symbols-outlined text-primary_color">add</span>
                    <a href="<?php echo e(route('admin.users.create')); ?>">
                        <span class="text-primary_color font-big text-normal ml-2"> Add New Personnel</span>
                    </a>
                </div>
            </div>
            <?php if (isset($component)) { $__componentOriginalfc1e1378a12e46deb97ece02ae9d4c8d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc1e1378a12e46deb97ece02ae9d4c8d = $attributes; } ?>
<?php $component = App\View\Components\FilterCard::resolve(['actionUrl' => route('admin.users.index'),'canSearch' => true,'searchPlaceholder' => 'Search by name or phone number'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component->withAttributes(['id' => 'company_id','class' => 'block w-full','name' => 'company_id']); ?>
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
                    <div class="flex flex-row items-center h-5">
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
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
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
                        <option class="" value="">Select site</option>
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
                            <th class="px-smaller py-[1%] w-[15%]">Name</th>
                            <th class="px-smaller py-[1%] w-[20%]">Company</th>
                            <th class="px-small py-[1%] w-[15%]">Phone number</th>
                            <th class="px-smaller py-[1%] w-[22%]">Postal Address</th>
                            <th class="px-smaller py-[1%] w-[10%]">Site</th>
                            <th class="px-smaller py-[1%] text-right w-[5%]">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="text-normal font-normal border border-table border-x-0 border-b-0 text-natural hover:bg-db">

                                <td class="text-natural px-small py-small flex flex-row items-center">
                                    <div class="w-[40px] h-[40px] rounded-full">
                                        <img src="<?php echo e($user->profile_image); ?>" alt="Profile Image"
                                             class="rounded-full w-[40px] h-[40px]">
                                    </div>
                                    <span class="ml-2"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></span>
                                </td>

                                <td class="px-smaller">

                                    <?php echo e($user->tenant->name ?? ''); ?>

                                </td>

                                <td class="px-smaller">
                                    <?php echo e($user->phone_number); ?>

                                </td>

                                <td class="px-smaller truncate">
                                    <?php echo e(\Illuminate\Support\Str::limit($user->address, 25)); ?>


                                </td>
                                <td class="px-smaller">
                                    <?php echo e($user->site->name ?? 'N/A'); ?>

                                </td>

                                <td class="px-smaller">
                                    <div class="flex flex-row justify-between gap-1">
                                        <a href="<?php echo e(route('admin.users.edit', ['user' => $user->id])); ?>">

                                                <span
                                                    class="material-symbols-outlined w-[16px] h-[16px] ml-3 cursor-pointer text-natural">edit_square</span>
                                        </a>
                                        <form id="frm-delete-item-<?php echo e($user->id); ?>"
                                              action="<?php echo e(route('admin.users.destroy', ['user' => $user])); ?>"
                                              style="display: none;" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('delete'); ?>

                                        </form>
                                        <a href=""
                                           onclick='deleteItem(event, <?php echo e("$user->id"); ?>, "Are you sure you want to delete this Personal? all related attendance will be deleted")'>
                                            <span
                                                class="material-symbols-outlined mr-4 w-[24px] h-[24px] text-red-500 cursor-pointer">delete</span>
                                        </a>
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
                <?php echo e($users->links()); ?>

            </section>
        </section>
    </section>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
    <script>
        const filterDropdown = document.querySelector("#filter");
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
        // const toggleFilter = () => {
        //     filterDropdown.classList.toggle("hidden")
        // }
        //
        // function exportUsers() {
        //     console.log("export button clicked")
        // }

        function resetForm() {
            $(".site").val('').trigger('change')
            document.getElementById("search-form").reset();
            window.location.replace(location.pathname);
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/harmlessprince/webprojects/laravel/pmsapp/resources/views/admin/user/index.blade.php ENDPATH**/ ?>