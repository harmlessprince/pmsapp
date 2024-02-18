{{--<div id="attendance_more_filter" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">--}}

{{--</div>--}}

<div id="attendance_more_filter"
     class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-max">
    <div class="flex flex-row items-center justify-between mb-2">
        <span class="font-big text-eighteen text-filter">Filters</span>
        <img onclick="toggleFilter()" src="{{asset('assets/images/close.png')}}"
             class="w-[12px] h-[12px] cursor-pointer" alt="plus"/>
    </div>

    <form action="{{route('company.users.index')}}" id="search-form-1" class="w-full">
        <div class="w-33">
            <label class="font-big text-normal text-natural">No Of Rows</label>
            <label>
                <select
                    class=""
                    name="per_page"
                >
                    <option class="" value="15" {{ request()->query('per_page') == 15 ? "selected" : '' }}>
                        15 rows
                    </option>
                    @for ($i = 10; $i <= 50; $i += 10)
                        <option class=""
                                value="{{$i}}" {{ request()->query('per_page') == $i ? "selected" : '' }}> {{$i}}
                            rows
                        </option>
                    @endfor

                </select>
            </label>
        </div>

        <div class="w-full">
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
                datepicker-autohide
                datepicker-format="dd-mm-yyyy"
                type="text"
                class="w-full border border-natural bg-transparent h-11 pl-[21%] max-lg:pl-[12%] py-1 rounded-lg text-natural
                      placeholder-color font-normal text-normal
                      focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color"
                placeholder="select start date"
                name="attendance_date_from_date"
                value="{{request()->query('attendance_date_from_date')}}"
            />
        </div>

        <div class="w-full max-lg:w-[100%]">
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
                datepicker-autohide
                datepicker-format="dd-mm-yyyy"
                type="text"
                class="w-full border border-natural bg-transparent h-11 pl-[21%] max-lg:pl-[12%] py-1 rounded-lg text-natural
                    placeholder-color font-normal text-normal
                    focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color"
                placeholder="select end date"
                name="attendance_date_to_date"
                value="{{request()->query('attendance_date_to_date')}}"
            />
        </div>
        <button
            type="reset"
            class="mt-[1%] w-[67px] h-[40px] bg-transparent rounded-lg text-normal text-primary_color font-big border border-primary_color" onclick="resetForm()">
            Clear
        </button>
        <button
            class="mt-[1%] w-[67px] h-[40px] bg-primary_color rounded-lg text-normal text-natural font-big ml-3">
            Filter
        </button>
    </form>
</div>
