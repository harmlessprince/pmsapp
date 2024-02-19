<!-- Main modal -->
<div id="attendance_more_filter" data-modal-placement="top-center" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full bg-transparent shadow">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">
                    Sign in to our platform
                </h3>
                <button data-modal-hide="attendance_more_filter" type="button" class="end-2.5 text-gray-400 bg-transparent hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" method="GET" action="{{route('company.attendance.transactions')}}"   id="search-form-1">
                    <div class="grid gap-4 mb-1 grid-cols-2">
                        <div class="col-span-2">
                            <x-input-label for="per_page" :value="__('Number of rows')" class="text-neutral-600"/>
                            <x-select-input id="per_page" class="block w-full" name="per_page">
                                <option class="" value="15" {{ request()->query('per_page') == 15 ? "selected" : '' }}>
                                    15 rows
                                </option>
                                @for ($i = 10; $i <= 50; $i += 10)
                                    <option class=""
                                            value="{{$i}}" {{ request()->query('per_page') == $i ? "selected" : '' }}> {{$i}}
                                        rows
                                    </option>
                                @endfor
                            </x-select-input>
                        </div>
                        <div class="col-span-2">
                            <x-input-label for="site_id" :value="__('Select Site')" class="text-neutral-600"/>
                            <x-select-input id="site_id" class="block w-full" name="site_id">
                                <option class="" value="">All site</option>
                                @foreach($sites as $site)
                                    <option
                                        value="{{$site->id}}" {{ request()->query('site_id') == $site->id ? "selected" : '' }}>{{$site->name}}</option>
                                @endforeach
                            </x-select-input>
                        </div>
                    </div>
                    <div class="flex items-center rounded-b">
                        <button
                            type="reset"
                            class="text-sm px-5 py-2.5 text-center  bg-transparent rounded-lg text-normal text-primary_color font-big border border-primary_color"
                            onclick="resetForm()">
                            Clear
                        </button>
                        <button
                            class="text-sm px-5 py-2.5 ms-3 text-center  bg-primary_color rounded-lg text-normal text-natural font-big">
                            Filter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
