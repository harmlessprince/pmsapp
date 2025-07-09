<?php $__env->startSection('title', 'Scan Analytics'); ?>
<?php $__env->startPush('header-scripts'); ?>
    <script src="https://cdn.tailwindcss.com"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Dashboard content -->

    <section>
        <?php if (isset($component)) { $__componentOriginalfc1e1378a12e46deb97ece02ae9d4c8d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc1e1378a12e46deb97ece02ae9d4c8d = $attributes; } ?>
<?php $component = App\View\Components\FilterCard::resolve(['actionUrl' => route('company.scans.analytics'),'hasTable' => false] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input','data' => ['id' => 'name','class' => 'block w-full pl-[20%]','type' => 'text','datepicker' => true,'datepickerAutohide' => true,'datepickerFormat' => 'yyyy-mm-dd','placeholder' => 'Select start date','name' => 'scan_date_from_date','value' => request()->query('scan_date_from_date', $defaultStartMonth)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'name','class' => 'block w-full pl-[20%]','type' => 'text','datepicker' => true,'datepicker-autohide' => true,'datepicker-format' => 'yyyy-mm-dd','placeholder' => 'Select start date','name' => 'scan_date_from_date','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->query('scan_date_from_date', $defaultStartMonth))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input','data' => ['id' => 'scan_date_to_date','class' => 'block w-full pl-[20%]','type' => 'text','datepicker' => true,'datepickerAutohide' => true,'datepickerFormat' => 'yyyy-mm-dd','placeholder' => 'Select start date','name' => 'scan_date_to_date','value' => request()->query('scan_date_to_date', $defaultEndMonth)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'scan_date_to_date','class' => 'block w-full pl-[20%]','type' => 'text','datepicker' => true,'datepicker-autohide' => true,'datepicker-format' => 'yyyy-mm-dd','placeholder' => 'Select start date','name' => 'scan_date_to_date','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->query('scan_date_to_date', $defaultEndMonth))]); ?>
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
        <!-- start of bar chart -->
        <div class="bg-background_color mt-[5%] max-lg:mt-[10%] rounded-lg overflow-x-auto">
            <div class="text-natural font-normal text-normal p-[2%]">Daily scan % by all sites</div>
            <canvas id="allSitesChart" style="width: 100%; height: 50vh;"></canvas>
        </div>
        <!-- end bar chat -->

        <!-- start of multiple bar chart -->
        <div class="bg-background_color mt-[5%] rounded-lg">
            <div class="text-natural font-normal text-normal p-[2%]">Daily scan count(All sites)</div>
            <canvas id="expectedAndActualChart" style="width:100%; height: 50vh;"></canvas>
        </div>
        <!-- end of multiple bar chat -->
        <section class="bg-background_color p-[2%] my-[5%]">
            <div id="accordion-collapse" data-accordion="collapse" ck>
                <?php $__empty_1 = true; $__currentLoopData = $analytics['dailyScanCountPerSiteAndActualVsExpected']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <h2 id="accordion-collapse-heading-<?php echo e($loop->index+1); ?>" class="collapsible">
                        <button type="button"
                                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-x focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                data-accordion-target="#accordion-collapse-body-<?php echo e($loop->index+1); ?>" aria-expanded="true"
                                aria-controls="accordion-collapse-body-<?php echo e($loop->index+1); ?>">
                            <span>Site Name: <?php echo e($key); ?></span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="M9 5 5 1 1 5"/>
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-<?php echo e($loop->index+1); ?>" class="collapsible-content hidden"
                         aria-labelledby="accordion-collapse-heading-<?php echo e($loop->index+1); ?>">
                        <table class="text-small text-basic font-big w-full">
                            <thead>
                            <tr class="text-left border border-x-0 border-t-0 border-b-table">
                                <td class="py-1%">Days</td>
                                <td class="py-1%">Actual Scan</td>
                                <td class="py-1%">Expected Scan</td>
                            </tr>
                            </thead>
                            <?php $__empty_2 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                <tr class="text-left border border-x-0 border-t-0 border-b-table">
                                    <td class="py-1%"><?php echo e(\Carbon\Carbon::parse($item->date)->format('Y-m-d')); ?></td>
                                    <td class="py-1%"><?php echo e($item->actual_scan); ?></td>
                                    <td class="py-1%"><?php echo e($item->expected_scan); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                <tr class="text-left border border-x-0 border-t-0 border-b-table">
                                    <td colspan="3"> No Data</td>
                                </tr>
                            <?php endif; ?>
                        </table>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>

            </div>

        </section>


    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>
    <script src="<?php echo e(asset('assets/js/transaction.js')); ?>"></script>
    <script>
        function convertDataForSiteDataDailyChart(chartData) {
            const labels = chartData.labels;
            const datasets = Object.keys(chartData.items).map((key, index) => {
                const site = chartData.items[key];

                // Initialize an array of zeros based on the length of the labels
                const dataArray = new Array(labels.length).fill(0);

                // Populate data from the site's data object into the correct positions
                Object.keys(site.data).forEach((index) => {
                    dataArray[parseInt(index)] = site.data[index];
                });

                // Return each site as a dataset with label and data array
                return {
                    label: site.label,
                    data: dataArray,
                    color: "#FEFFFE",
                    barThickness: 10,
                    borderRadius: 15,
                    backgroundColor: "#" + Math.floor(Math.random() * 16777215).toString(16),
                    // borderColor: `rgb(${255 - index * 20}, ${99 + index * 20}, ${132 + index * 10})`,
                    borderWidth: 1
                };
            });

            return { labels, datasets };
        }

        const barColors = "#3DC9B7";
        const allSitesPercentage = <?php echo json_encode($analytics['siteDataDaily'], 15, 512) ?>;
        const allSitesPercentageDataSets = convertDataForSiteDataDailyChart(allSitesPercentage);

        new Chart("allSitesChart", {
            type: "bar",
            data: {
                labels: allSitesPercentageDataSets.labels,
                datasets: allSitesPercentageDataSets.datasets
            },
            options: {
                title: {
                    display: true,
                    text: "Daily scan % by all sites combined",
                    fontSize: 14,
                    fontColor: "#FEFFFE",
                },
                scales: {
                    x: {
                        ticks: {
                            color: "#FEFFFE"
                        }
                    },
                    y: {
                        ticks: {
                            color: "#FEFFFE"
                        }
                    }
                },
            }
        });
        const actualVSExpected = <?php echo json_encode($analytics['dailyScanCountActualVSExpected'], 15, 512) ?>;

        let barColor2 = "#3DC9B7";
        let barColor1 = "#E4D794"


        new Chart("expectedAndActualChart", {
            type: "bar",
            data: {
                labels: actualVSExpected?.labels,
                datasets: [{
                    label: "Expected scan",
                    backgroundColor: barColor1,
                    color: "#FEFFFE",
                    barThickness: 10,
                    borderRadius: 15,
                    data: actualVSExpected?.expected_scan ?? []
                }, {
                    label: "Actual scan",
                    backgroundColor: barColor2,
                    color: "#FEFFFE",
                    barThickness: 10,
                    borderRadius: 15,
                    data: actualVSExpected?.actual_scan ?? []
                }]
            },
            options: {
                scales: {
                    x: {
                        ticks: {
                            color: "#FEFFFE"
                        }
                    },
                    y: {
                        ticks: {
                            color: "#FEFFFE"
                        }
                    }
                }
            }
        });


        function resetForm() {
            $(".select-2-sites").val('').trigger('change')
            document.getElementById("search-form").reset();
            window.location.replace(location.pathname);
        }

        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    // First, close all other collapsibles
                    var allContent = document.getElementsByClassName("collapsible-content");
                    for (var j = 0; j < allContent.length; j++) {
                        allContent[j].style.display = "none";
                    }
                    // Then, open this collapsible
                    content.style.display = "block";
                }
            });
        }

    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/harmlessprince/webprojects/laravel/pmsapp/resources/views/scan/analytics/daily.blade.php ENDPATH**/ ?>