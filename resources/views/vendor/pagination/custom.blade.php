@if ($paginator->hasPages())
    <div
        class="text-basic flex flex-row justify-between p-[2%] items-center max-lg:flex-col max-lg:items-start">
        <div class="text-normal font-big">
            <div>
                <p class="text-sm text-gray-700 leading-5 dark:text-gray-400">
                    {!! __('Showing') !!}
                    @if ($paginator->firstItem())
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>
        </div>
        <div>
            <div aria-label="Page navigation example" class="max-lg:hidden">
                <ul class="inline-flex -space-x-px text-normal font-big h-10 bg-db">
                    <li>
                        @if ($paginator->onFirstPage())
                            <span
                                class="flex items-center justify-center px-4 h-10 ms-0 leading-tight rounded-s-lg text-basic border border-primary_color hover:bg-primary_color hover:text-[#F9FAFB]">
                                <img src="{{asset('assets/images/arrow-left.png')}}" alt="arrow-left"
                                     class="mr-2 w-[20px] h-[20px]"/>
                                <span>Previous</span>
                            </span>
                        @else
                            <a href="{{ $paginator->previousPageUrl() }}"
                               class="flex items-center justify-center px-4 h-10 ms-0 leading-tight rounded-s-lg text-basic border border-primary_color hover:bg-primary_color hover:text-[#F9FAFB]">
                                <img src="{{asset('assets/images/arrow-left.png')}}" alt="arrow-left"
                                     class="mr-2 w-[20px] h-[20px]"/>
                                <span>Previous</span>
                            </a>
                        @endif

                    </li>

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span
                                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-white bg-white border border-primary_color  cursor-default leading-5 dark:bg-gray-800 dark:border-gray-600">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 dark:bg-gray-800 dark:border-gray-600">{{ $page }}</span>
                                    </span>
                                @else

                                    <li>
                                        <a href="{{ $url }}"
                                           class="flex items-center justify-center px-4 h-10 leading-tight text-basic border border-primary_color hover:bg-primary_color hover:text-[#F9FAFB]">
                                            {{ $page }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    <li>
                        {{-- Next Page Link --}}
                        @if ($paginator->hasMorePages())
                            <a href="{{ $paginator->nextPageUrl() }}"
                               class="flex items-center justify-center px-4 h-10 ms-0 leading-tight rounded-e-lg text-basic border border-primary_color hover:bg-primary_color hover:text-[#F9FAFB]">
                                <span>Next</span>
                                <img src="{{asset('assets/images/arrow-right.png')}}" alt="arrow-right" class="ml-2"/>
                            </a>
                        @else
                            <span
                                class="flex items-center justify-center px-4 h-10 ms-0 leading-tight rounded-e-lg text-basic border border-primary_color hover:bg-primary_color hover:text-[#F9FAFB]">
                                <span>Next</span>
                                <img src="{{asset('assets/images/arrow-right.png')}}" alt="arrow-right" class="ml-2"/>
                            </span>
                        @endif

                    </li>
                </ul>
            </div>

            <!-- pagination for mobile -->
            <div aria-label="Page navigation example" class="lg:hidden mt-2">
                <ul class="inline-flex -space-x-px text-normal font-big h-10 bg-db">
                    <li>
                        <a href="#"
                           class="flex items-center justify-center px-4 h-10 ms-0 leading-tight rounded-s-lg text-basic border border-primary_color hover:bg-primary_color hover:text-[#F9FAFB]">
                            <img src="{{asset('assets/images/arrow-left.png')}}" alt="arrow-left"
                                 class="mr-2 w-[20px] h-[20px]"/>
                            <span>Previous</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                           class="flex items-center justify-center px-4 h-10 leading-tight text-basic border border-primary_color hover:bg-primary_color hover:text-[#F9FAFB]">1</a>
                    </li>
                    <li>
                        <a href="#"
                           class="flex items-center justify-center px-4 h-10 leading-tight text-basic border border-primary_color hover:bg-primary_color hover:text-[#F9FAFB]">...</a>
                    </li>
                    <li>
                        <a href="#"
                           class="flex items-center justify-center px-4 h-10 leading-tight text-basic border border-primary_color hover:bg-primary_color hover:text-[#F9FAFB]">10</a>
                    </li>
                    <li>
                        {{-- Next Page Link --}}
                        @if ($paginator->hasMorePages())
                            <a href="{{ $paginator->nextPageUrl() }}"
                               class="flex items-center justify-center px-4 h-10 ms-0 leading-tight rounded-e-lg text-basic border border-primary_color hover:bg-primary_color hover:text-[#F9FAFB]">
                                <span>Next</span>
                                <img src="{{asset('assets/images/arrow-right.png')}}" alt="arrow-right" class="ml-2"/>
                            </a>
                        @else
                            <span
                                class="flex items-center justify-center px-4 h-10 ms-0 leading-tight rounded-e-lg text-basic border border-primary_color hover:bg-primary_color hover:text-[#F9FAFB]">
                                <span>Next</span>
                                <img src="{{asset('assets/images/arrow-right.png')}}" alt="arrow-right" class="ml-2"/>
                            </span>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endif
