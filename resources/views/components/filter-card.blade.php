<div class="mt-4 w-full">

    <div class="flex flex-col">
        <div class="rounded-xl border border-gray-200 bg-background_color p-6 shadow-lg">
            <form action="{{$actionUrl}}" id="{{$formId}}">
                @if($canSearch)
                    <x-input-label for="searchTerm" :value="__('Search')"/>
                    <div class="relative mb-3 w-full flex  items-center justify-between rounded-md">
                        <svg class="absolute left-2 block h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                             width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8" class=""></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65" class=""></line>
                        </svg>
                        <x-text-input id="search" class="h-12 w-full cursor-text bg-db py-4 pr-40 pl-12" type="text"
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
                    <div class=" w-full flex justify-between px-5 py-3">
                        @if($canExport)
                            <div>
                                <x-icon-button class="px-8 py-2 text-primary_color hover:scale-75" type="button"
                                >
                                    <span class="material-symbols-outlined text-primary_color mr-1">export_notes</span>
                                    <span class="text-primary_color">Export</span>
                                </x-icon-button>
                            </div>
                        @endif
                        <div class="grid w-full grid-cols-1 justify-end space-x-4 md:flex">
                            <x-secondary-button type="reset" class="px-8 py-2" onclick="resetForm()">Reset
                            </x-secondary-button>
                            <x-primary-button class="px-8 py-2" type="submit">Apply filters</x-primary-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
