@extends('layouts.app')
@section('title', 'Scan Analytics')
@push('header-scripts')
    <script src="https://cdn.tailwindcss.com"></script>
@endpush
@section('content')
    <!-- Dashboard content -->

    <section>
        <x-filter-card :actionUrl="route('company.scans.analytics')" :hasTable="false">
            <input value="yes" name="date" hidden/>
            <div class="flex flex-col">
                <div class="relative">
                    <x-input-label for="attendance_date_from_date" :value="__('Start date')"/>
                    <div class="absolute bottom-[20%] start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-natural dark:text-gray-400" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <x-text-input
                        id="name"
                        class="block w-full pl-[20%]"
                        type="text"
                        datepicker
                        datepicker-autohide
                        datepicker-format="yyyy-mm-dd"
                        type="text"
                        placeholder="Select start date"
                        name="scan_date_from_date"
                        :value="request()->query('scan_date_from_date', $defaultStartMonth)"
                    />
                </div>
            </div>
            <div class="flex flex-col">
                <div class="relative">
                    <x-input-label for="attendance_date_to_date" :value="__('End date')"/>
                    <div class="absolute bottom-[20%] start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-natural dark:text-gray-400" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <x-text-input
                        id="scan_date_to_date"
                        class="block w-full pl-[20%]"
                        type="text"
                        datepicker
                        datepicker-autohide
                        datepicker-format="yyyy-mm-dd"
                        type="text"
                        placeholder="Select start date"
                        name="scan_date_to_date"
                        :value="request()->query('scan_date_to_date', $defaultEndMonth)"
                    />
                </div>
            </div>
            <div class="flex flex-col">
                <x-input-label for="frequency" :value="__('Time Period')" class="text-white"/>
                <x-select-input id="frequency" class="block w-full" name="frequency">
                    @foreach($frequencies as $frequency)
                        <option class="bg-background_color"
                                value="{{$frequency}}" {{ request()->query('frequency') == $frequency ? "selected" : '' }}>{{strtoupper($frequency)}}</option>
                    @endforeach
                </x-select-input>
            </div>
        </x-filter-card>
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
                @forelse($analytics['dailyScanCountPerSiteAndActualVsExpected'] as $key => $items)
                    <h2 id="accordion-collapse-heading-{{$loop->index+1}}" class="collapsible">
                        <button type="button"
                                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-x focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                data-accordion-target="#accordion-collapse-body-{{$loop->index+1}}" aria-expanded="true"
                                aria-controls="accordion-collapse-body-{{$loop->index+1}}">
                            <span>Site Name: {{$key}}</span>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="M9 5 5 1 1 5"/>
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-{{$loop->index+1}}" class="collapsible-content hidden"
                         aria-labelledby="accordion-collapse-heading-{{$loop->index+1}}">
                        <table class="text-small text-basic font-big w-full">
                            <thead>
                            <tr class="text-left border border-x-0 border-t-0 border-b-table">
                                <td class="py-1%">Days</td>
                                <td class="py-1%">Actual Scan</td>
                                <td class="py-1%">Expected Scan</td>
                            </tr>
                            </thead>
                            @forelse($items as $item)
                                <tr class="text-left border border-x-0 border-t-0 border-b-table">
                                    <td class="py-1%">{{\Carbon\Carbon::parse($item->date)->format('d-m-Y')}}</td>
                                    <td class="py-1%">{{$item->actual_scan}}</td>
                                    <td class="py-1%">{{$item->expected_scan}}</td>
                                </tr>
                            @empty
                                <tr class="text-left border border-x-0 border-t-0 border-b-table">
                                    <td colspan="3"> No Data</td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                @empty
                @endforelse

            </div>

        </section>


    </section>
@endsection
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>
    <script src="{{asset('assets/js/transaction.js')}}"></script>
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

        function convertDataForExpectedAndActualChartChart(chartData) {
            const labels = chartData.labels;
            const actual_scan = chartData?.data?.actual_scan
            const expected_scan = chartData?.data?.expected_scan
            const actual_scan_datasets = Object.keys(actual_scan).map((key, index) => {
                const actual_value = actual_scan[key];
                // Initialize an array of zeros based on the length of the labels
                const dataArray = new Array(labels.length).fill(0);
                // Populate data from the site's data object into the correct positions
                Object.keys(actual_scan).forEach((index) => {
                    dataArray[parseInt(index)] = actual_scan[index];
                });

                return {
                    label: "Actual scan",
                    backgroundColor: "#3DC9B7",
                    color: "#FEFFFE",
                    barThickness: 10,
                    borderRadius: 15,
                    data: dataArray
                };
            });
            const expected_scan_datasets = Object.keys(expected_scan).map((key, index) => {
                const actual_value = expected_scan[key];
                // Initialize an array of zeros based on the length of the labels
                const dataArray = new Array(labels.length).fill(0);
                // Populate data from the site's data object into the correct positions
                Object.keys(expected_scan).forEach((index) => {
                    dataArray[parseInt(index)] = expected_scan[index];
                });

                return {
                    responsive: true,
                    label: "Expected scan",
                    backgroundColor: "#3DC9B7",
                    color: "#FEFFFE",
                    barThickness: 10,
                    borderRadius: 15,
                    data: dataArray
                };
            });
            return {
                expected_scan_datasets,
                actual_scan_datasets,
                labels
            }
        }

        const barColors = "#3DC9B7";
        const allSitesPercentage = @json($analytics['siteDataDaily']);
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
        const actualVSExpected = @json($analytics['dailyScanCountActualVSExpected']);

        // convertedActualVSExpected = convertDataForExpectedAndActualChartChart(actualVSExpected)
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
@endpush

