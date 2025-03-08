<div class="w-full z-0">

    <div class="flex flex-col">
        <div class="rounded-xl border border-gray-200 bg-background_color p-6 shadow-lg">
            <form action="{{$actionUrl}}" id="{{$formId}}">
                @if($canSearch)
                    <x-input-label for="searchTerm" :value="__('Search')"/>
                    <div class="relative mb-3 w-full flex  items-center justify-between rounded-md z-0">
                        <svg class="absolute left-2 block h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                             width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8" class=""></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65" class=""></line>
                        </svg>
                        <x-text-input id="search" class="h-12 w-full cursor-text bg-db py-4 pr-40 pl-12 z-0" type="text"
                                      name="searchTerm" placeholder="{{$searchPlaceholder}}"
                                      :value="request()->query('searchTerm')"/>
                    </div>
                @endif

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @if($hasTable)
                        <div class="flex flex-col">
                            <x-input-label for="per_page" :value="__('Number of rows')"/>
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
                    @endif


                    {{$slot}}
                </div>

                <div class="mt-3  w-full">
                    <div class="w-full flex justify-between items-center py-3 ">
                        @if($canExport || $canDelete)
                            <div class="flex flex-col">
                                <x-input-label for="action" :value="__('Action')"/>
                                <x-select-input id="action" class="block w-full" name="action">
                                    <option
                                        value="filter"
                                    >
                                        Apply Filters
                                    </option>
                                    @if($canExport)
                                        <option class=""
                                                value="export" {{ request()->query('action') == 'export' ? "selected" : '' }}
                                        >
                                            EXPORT
                                        </option>
                                    @endif
                                    @if($canExport)
                                        <option class=""
                                                value="delete" {{ request()->query('action') == 'delete' ? "selected" : '' }}>
                                            DELETE
                                        </option>
                                    @endif

                                </x-select-input>
                            </div>
                            {{--                            <div>--}}
                            {{--                                <label class="inline-flex items-center me-5 cursor-pointer">--}}
                            {{--                                    <input type="checkbox" value="" class="sr-only peer" id="export_checkbox"--}}
                            {{--                                           name="export">--}}
                            {{--                                    <div--}}
                            {{--                                        class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-teal-300 dark:peer-focus:ring-teal-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-teal-600"></div>--}}
                            {{--                                    <span--}}
                            {{--                                        class="ms-3 text-sm font-medium text-white">Export</span>--}}
                            {{--                                </label>--}}
                            {{--                            </div>--}}
                        @endif
                        {{-- <div class="grid w-full grid-cols-1 justify-end space-x-4 md:flex">
                            <x-secondary-button type="reset" class="px-8 py-2 w-full" onclick="resetForm()">Reset
                            </x-secondary-button>
                            <x-primary-button class="px-8 py-2 w-full" type="submit" id="filter_button">Apply filters
                            </x-primary-button>
                        </div> --}}
                        <div class="flex flex-col justify-between w-full sm:flex-row sm:justify-end sm:space-x-4">
                            @if($canExport)
                                <x-primary-button class=" py-3 sm:px-8 mb-2 sm:mb-0 bg-red-500 hidden" type="submit"
                                                  id="delete_button" onClick="deleteData(event, '{{$formId}}')">
                                    Delete Data
                                </x-primary-button>
                            @endif
                            <x-primary-button class=" py-3 sm:px-8 mb-2 sm:mb-0" type="submit" id="filter_button">
                                Apply filters
                            </x-primary-button>


                            <x-secondary-button type="reset" class="sm:px-8 sm:py-2" onclick="resetForm()">Reset
                            </x-secondary-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

