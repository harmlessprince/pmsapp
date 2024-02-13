@extends('layouts.app')
@section('title', 'Scan Analytics')
@push('header-scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush
@section('content')
    <!-- Dashboard content -->
    <section>
        <!-- filter searches -->
        <div class="flex flex-row justify-between items-center w-[100%] max-lg:flex-col">
            <div class="flex flex-row justify-between items-center w-[65%] max-lg:w-[100%] max-lg:flex-col">
                <div class="relative w-[30%] max-lg:w-[100%]">
                    <label class="font-big text-normal text-natural">Start date</label>
                    <div class="absolute bottom-[20%] start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-natural dark:text-gray-400" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <input
                        datepicker
                        type="text"
                        class="w-full border border-natural bg-transparent h-11 pl-[21%] max-lg:pl-[12%] py-1 rounded-lg text-natural
                    placeholder-color font-normal text-normal
                    focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                    focus:invalid:border-error focus:invalid:ring-error"
                        placeholder="select date"
                    />
                </div>

                <div class="relative w-[30%] max-lg:w-[100%]">
                    <label class="font-big text-normal text-natural">End date</label>
                    <div class="absolute bottom-[20%] start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-natural dark:text-gray-400" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <input
                        datepicker
                        type="text"
                        class="w-full border border-natural bg-transparent h-11 pl-[21%] max-lg:pl-[12%] py-1 rounded-lg text-natural
                    placeholder-color font-normal text-normal
                    focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                    focus:invalid:border-error focus:invalid:ring-error"
                        placeholder="select date"
                    />
                </div>
                <div class="w-[37%] max-lg:w-[100%] relative mt-[3%]">
                    <select class="w-full border border-natural bg-transparent h-11 pl-[5%] py-1 rounded-lg text-natural
                    placeholder-color font-normal text-normal
                    focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                    focus:invalid:border-error focus:invalid:ring-error">
                        <option class="bg-background_color">Daily</option>
                        <option class="bg-background_color">Weekly</option>
                        <option class="bg-background_color">Monthly</option>
                        <option class="bg-background_color">Yearly</option>
                    </select>
                </div>
            </div>

            <div class="flex flex-row justify-between items-center w-[25%] max-lg:w-[100%]">
                <button
                    class="mt-[3%] cursor-pointer w-[45%] h-[44px] outline-none bg-transparent text-natural rounded-lg font-semibold px-[16px] py-[10px] border border-primary_color">
                    Clear
                </button>
                <button
                    class="mt-[3%] cursor-pointer w-[45%] h-[44px] outline-none bg-primary_color text-natural rounded-lg font-big px-[16px] py-[10px]">
                    Search
                </button>
            </div>
        </div>
        <!-- end of filter searches -->

        <!-- start of bar chart -->
        <div class="bg-background_color mt-[5%] max-lg:mt-[10%] rounded-lg overflow-x-auto">
            <div class="text-natural font-normal text-normal p-[2%]">Daily scan % by sites</div>
            <canvas id="myChart" style="width: 100%; height: 50vh;"></canvas>
        </div>
        <!-- end bar chat -->

        <!-- start of multiple bar chart -->
        <div class="bg-background_color mt-[5%] rounded-lg">
            <div class="text-natural font-normal text-normal p-[2%]">Daily scan count(All sites)</div>
            <canvas id="multipleBarChart" style="width:100%; height: 50vh;"></canvas>
        </div>
        <!-- end of multiple bar chat -->

        <!-- start of line chart -->
        <div class="bg-background_color mt-[5%] rounded-lg">
            <div class="text-natural font-normal text-normal p-[2%]">Daily scan % For All Sites Combined</div>
            <canvas id="lineChart" style="width:100%; height: 50vh;"></canvas>
        </div>
        <!-- end of line chat -->

        <section class="bg-background_color p-[2%] my-[5%]">
            <div>
                <div class="flex flex-row justify-between items-center border border-x-0 border-t-0 border-b-table p-1">
                    <div class="text-basic text-normal font-bigger pt-1%">Site name <span
                            class="font-normal">Headquater</span></div>
                    <img src="../assets/images/headquarterup.png" alt="dashboard" class="cursor-pointer" id="up-one"
                         onclick="toggleTable('one')"/>
                    <img src="../assets/images/headquaterdown.png" alt="dashboard" class="cursor-pointer hidden"
                         id="down-one" onclick="toggleTable('one')"/>
                </div>

                <div class="mt-2 w-full overflow-x-auto hidden" id="tableOne">
                    <table class="text-small text-basic font-big w-full">
                        <thead>
                        <tr class="text-left border border-x-0 border-t-0 border-b-table">
                            <td class="py-1%">Months</td>
                            <td class="py-1%">Actual Scan</td>
                            <td class="py-1%">Expected Scan</td>
                        </tr>
                        </thead>
                        <tr class="text-left border border-x-0 border-t-0 border-b-table">
                            <td class="py-1%">Feb 2024</td>
                            <td class="py-1%">0</td>
                            <td class="py-1%">0</td>
                        </tr>
                        <tr class="text-left border border-x-0 border-t-0 border-b-table">
                            <td class="py-1%">Feb 2024</td>
                            <td class="py-1%">0</td>
                            <td class="py-1%">0</td>
                        </tr>
                    </table>
                </div>

            </div>
            <div>
                <div class="flex flex-row justify-between items-center border border-x-0 border-t-0 border-b-table p-1">
                    <div class="text-basic text-normal font-bigger pt-1%">Site name <span
                            class="font-normal">Headquater</span></div>
                    <img src="../assets/images/headquarterup.png" alt="dashboard" class="cursor-pointer" id="up-two"
                         onclick="toggleTable('two')"/>
                    <img src="../assets/images/headquaterdown.png" alt="dashboard" class="cursor-pointer hidden"
                         id="down-two" onclick="toggleTable('two')"/>
                </div>

                <div class="mt-2 w-full overflow-x-auto hidden" id="tableTwo">
                    <table class="text-small text-basic font-big w-full">
                        <thead>
                        <tr class="text-left border border-x-0 border-t-0 border-b-table">
                            <td class="py-1%">Months</td>
                            <td class="py-1%">Actual Scan</td>
                            <td class="py-1%">Expected Scan</td>
                        </tr>
                        </thead>
                        <tr class="text-left border border-x-0 border-t-0 border-b-table">
                            <td class="py-1%">Feb 2024</td>
                            <td class="py-1%">0</td>
                            <td class="py-1%">0</td>
                        </tr>
                        <tr class="text-left border border-x-0 border-t-0 border-b-table">
                            <td class="py-1%">Feb 2024</td>
                            <td class="py-1%">0</td>
                            <td class="py-1%">0</td>
                        </tr>
                    </table>
                </div>

            </div>
        </section>

    </section>
@endsection
@push('scripts')
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>--}}

    <script>
        var barValues = ["01/03/2030", "02/03/2030", "01/03/2030", "01/03/2030", "01/03/2030", "01/03/2030", "01/03/2030"];
        var yValues = [100, 20, 120, 60, 70, 90, 120];
        var barColors = "#3DC9B7";

        new Chart("myChart", {
            type: "bar",
            data: {
                labels: barValues,
                datasets: [{
                    label: "scan",
                    backgroundColor: barColors,
                    color: "#FEFFFE",
                    barThickness: 30,
                    borderRadius: 10,
                    hoverBorderColor: '#FEFFFE',
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "Daily scan % by sites",
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

        //multiple bar chart
        let multipleValues = ["01/03/2030", "02/03/2030", "01/03/2030", "01/03/2030", "01/03/2030", "01/03/2030", "01/03/2030"];
        let yValues1 = [15, 20, 45, 65, 70, 60, 120];
        let yValues2 = [10, 25, 50, 30, 25, 95, 100];
        let barColor2 = "#3DC9B7";
        let barColor1 = "#E4D794"

        new Chart("multipleBarChart", {
            type: "bar",
            data: {
                labels: multipleValues,
                datasets: [{
                    label: "Expected scan",
                    backgroundColor: barColor1,
                    color: "#FEFFFE",
                    barThickness: 30,
                    borderRadius: 15,
                    data: yValues1
                }, {
                    label: "Actual scan",
                    backgroundColor: barColor2,
                    color: "#FEFFFE",
                    barThickness: 30,
                    borderRadius: 15,
                    data: yValues2
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

        //line chart
        var xLines = ["02/03/2030 ", "02/03/2030", "01/03/2030", "01/03/2030", "01/03/2030", "01/03/2030", "01/03/2030"];
        var yLines = [100, 20, 120, 60, 70, 90, 120];

        new Chart("lineChart", {
            type: "line",
            data: {
                labels: xLines,
                datasets: [{
                    label: "scan",
                    backgroundColor: ["#16C52A"],
                    borderColor: ["#16C52A"],
                    borderWidth: 1,
                    color: "#16C52A",
                    data: yLines,
                    tension: 0.4
                }]
            },
            options: {
                scales: {
                    x: {
                        beginAtZero: true,
                        ticks: {
                            color: "#FEFFFE"
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: "#FEFFFE"
                        }
                    }
                },
            }
        });

        const tableOne = document.querySelector('#tableOne');
        const tableTwo = document.querySelector('#tableTwo');
        const upOne = document.querySelector('#up-one');
        const downOne = document.querySelector('#down-one');
        const upTwo = document.querySelector('#up-two');
        const downTwo = document.querySelector('#down-two');

        const toggleTable = (num) => {
            if (num === "one") {
                upOne.classList.toggle("hidden");
                downOne.classList.toggle("hidden");
                tableOne.classList.toggle("hidden");
                tableTwo.classList.add("hidden");
                downTwo.classList.add("hidden");
                upTwo.classList.remove('hidden')

            }
            if (num === "two") {
                upTwo.classList.toggle("hidden");
                downTwo.classList.toggle("hidden");
                tableTwo.classList.toggle("hidden");
                tableOne.classList.add("hidden");
                downOne.classList.add("hidden");
                upOne.classList.remove("hidden")
            }
        }

    </script>
@endpush

