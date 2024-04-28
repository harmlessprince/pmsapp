@extends('layouts.app')
@section('title', 'Scan Analytics')
@push('header-scripts')



@endpush
@section('content')
    <!-- Dashboard content -->

    <section>
        <x-filter-card :actionUrl="route('company.scans.analytics')" :hasTable="false">
            <input value="yes" name="date" hidden/>
            <div class="flex flex-col">
                <x-input-label for="scan_date_from_date" :value="__('From')" class="text-white"/>
                <x-select-input id="scan_date_from_date" class="block w-full" name="scan_date_from_date">
                    <option class="" value="">Select Start Month Year</option>
                    @foreach($months as $month)
                        <option
                            value="{{$month['value']}}" {{ request()->query('scan_date_from_date', $defaultStartMonth) == $month['value'] ? "selected" : '' }}>{{$month['name']}}</option>
                    @endforeach
                </x-select-input>
            </div>
            <div class="flex flex-col">
                <x-input-label for="scan_date_to_date" :value="__('To')" class="text-white"/>
                <x-select-input id="scan_date_to_date" class="block w-full" name="scan_date_to_date">
                    <option class="" value="">Select End Month Year</option>
                    @foreach($months as $month)
                        <option
                            value="{{$month['value']}}" {{ request()->query('scan_date_to_date', $defaultEndMonth) == $month['value'] ? "selected" : '' }}>{{$month['name']}}</option>
                    @endforeach
                </x-select-input>
            </div>
            <div class="flex flex-col">
                <x-input-label for="frequency" :value="__('Site')" class="text-white"/>
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
            <div class="text-natural font-normal text-normal p-[2%]">Monthly scan % by all sites</div>
            <canvas id="allSitesChart" style="width: 100%; height: 50vh;"></canvas>
        </div>
        <!-- end bar chat -->

        <!-- start of multiple bar chart -->
        <div class="bg-background_color mt-[5%] rounded-lg">
            <div class="text-natural font-normal text-normal p-[2%]">Monthly scan count(All sites)</div>
            <canvas id="expectedAndActualChart" style="width:100%; height: 50vh;"></canvas>
        </div>
        <!-- end of multiple bar chat -->
        <section class="bg-background_color p-[2%] my-[5%]">
            <div id="accordion-collapse" data-accordion="collapse">
                @forelse($analytics['actualVsExpectedPerSites'] as $key => $items)
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
                    <div id="accordion-collapse-body-{{$loop->index+1}}" class="hidden collapsible-content"
                         aria-labelledby="accordion-collapse-heading-{{$loop->index+1}}">
                        <table class="text-small text-basic font-big w-full">
                            <thead>
                            <tr class="text-left border border-x-0 border-t-0 border-b-table">
                                <td class="py-1%">Months</td>
                                <td class="py-1%">Actual Scan</td>
                                <td class="py-1%">Expected Scan</td>
                            </tr>
                            </thead>
                            @forelse($items as $item)
                                <tr class="text-left border border-x-0 border-t-0 border-b-table">

                                    <td class="py-1%">{{\Carbon\Carbon::parse($item->month)->format('F Y')}}</td>
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
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
    <script src="{{asset('assets/js/transaction.js')}}"></script>
    <script>

        const barColors = "#3DC9B7";
        const allSitesPercentage = @json($analytics['scanCountPerSite']);
        const allSitesPercentageDataSets = allSitesPercentage.items.map(function (item) {
            return {
                label: item.label,
                backgroundColor: "#" + Math.floor(Math.random() * 16777215).toString(16),
                color: "#FEFFFE",
                barThickness: 10,
                borderRadius: 15,
                data: item.data
            }
        });


        new Chart("allSitesChart", {
            type: "bar",
            data: {
                labels: Object.values(allSitesPercentage.labels),
                datasets: allSitesPercentageDataSets
            },
            options: {
                title: {
                    display: true,
                    text: "Monthly scan % by all sites combined",
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

        const actualVSExpected = @json($analytics['actualVsExpected']);

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
                    data: actualVSExpected?.data?.expected_scan ?? []
                }, {
                    label: "Actual scan",
                    backgroundColor: barColor2,
                    color: "#FEFFFE",
                    barThickness: 10,
                    borderRadius: 15,
                    data: actualVSExpected?.data?.actual_scan ?? []
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

