@extends('layouts.app')
@section('title', 'Tag Management')
@section('page', 'Tag Management')

@push('header-scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
@endpush
@section('content')

    <section>
        <section class="flex flex-row justify-start w-[100%] max-lg:mt-[3em]">
            <div
                class="flex flex-row  bg-background_color rounded-lg h-[111px] w-[290px] max-small:w-full items-center px-[20px]">
                <div class="w-[44px] h-[44px] bg-tags rounded-lg flex flex-row items-center justify-center">
                    <span class="material-symbols-outlined text-white">tag</span>
                </div>
                <div class="ml-[5%]">
                    <h1 class="font-bold text-3xl text-tags">{{$tagsCount}}</h1>
                    <span class="font-normal text-sm text-tags">Tags</span>
                </div>
            </div>
        </section>

        <!-- table section -->
        <section class="pt-basic_padding">
            <!-- add site -->
            <div class="font-big text-big text-natural mb-2 flex flex-row justify-between">
                <div>Added Tags</div>
                <div
                    class="rounded-lg border border-primary_color flex flex-row items-center px-[16px] py-[10px] cursor-pointer">
                    <img src="{{asset('assets/images/plus.png')}}" class="w-[11px] h-[11px]" alt="plus"/>
                    <a href="{{route('company.tags.create')}}">
                        <span class="text-primary_color font-big text-normal ml-2"> Add new Tag</span>
                    </a>
                </div>
            </div>

            <section>
                <x-filter-card :actionUrl="route('company.tags.index')" :hasTable="false" :canSearch="true"
                               :searchPlaceholder="'Search by tag name, code, comment'">
                    <div class="flex flex-col">
                        <x-input-label for="site_id" :value="__('Select site')"/>
                        <x-select-input id="site_id" class="block mt-1 w-full" name="site_id">
                            <option value="">Select Site</option>
                            @foreach($sites as $site)
                                <option
                                    value="{{$site->id}}" {{ request()->query('site_id') == $site->id ? "selected" : '' }}>{{$site->name}}</option>
                            @endforeach
                        </x-select-input>
                    </div>

                </x-filter-card>
            </section>

            <!-- table 2 section -->
            <section class="border border-table rounded-lg w-[100%] mt-[2%] bg-background_color">
                <div class="overflow-x-auto">
                    <table class="table-fixed w-[100%] max-lg:w-[1000px]">
                        <thead class="">
                        <tr class="text-left text-small text-natural font-big">
                            <th class=" px-smaller py-[1%] w-[10%]">Country</th>
                            <th class="px-smaller py-[1%] w-[10%]">Site name</th>
                            <th class="px-smaller py-[1%] w-[13%]">Tag Name</th>
                            <th class="px-smaller py-[1%] w-[20%]">Code</th>
                            <th class="px-smaller py-[1%] w-[20%]">Comments</th>
                            <th class="px-smaller py-[1%] w-[10%]">Tag</th>
                            <th class="text-right px-smaller py-[1%] w-[8%]">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($tags as $tag)
                            <tr class="text-normal font-normal text-natural border border-table border-collapse hover:bg-db">
                                <td class="text-natural px-smaller py-small">{{$tag->site->state->country->name ?? 'N/A'}}</td>
                                <td class="px-smaller">
                                    {{$tag->site->name ?? 'N/A'}}
                                </td>
                                <td class="px-smaller">
                                    {{$tag->name ?? 'N/A'}}
                                </td>
                                <td class="px-smaller">
                                    {{$tag->code ?? 'N/A'}}
                                    <span class="material-symbols-outlined cursor-pointer clipper w-[12px] h-[12px]"
                                          data-clipboard-text="{{$tag->code}}"
                                          id="{{$tag->id}}">content_copy</span>
                                </td>
                                <td class="px-smaller">
                                    {{ \Illuminate\Support\Str::limit($tag->comment, 20)}}
                                </td>
                                <td class="px-smaller">QR</td>
                                <td class="px-smaller">
                                    <div class="flex flex-row justify-end">
                                        <a href="{{route('company.tags.edit', ['tag' =>  $tag])}}">
                                            <img src="{{asset('assets/images/edit.png')}}" alt="edit"
                                                 class="w-[16px] h-[16px] ml-3 cursor-pointer"/>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-normal font-normal border border-table border-collapse text-natural hover:bg-db">
                                <td class="text-center" colspan="7">No Data</td>
                            </tr>
                        @endforelse


                        </tbody>
                    </table>
                </div>
                {{ $tags->links() }}
            </section>
        </section>
    </section>
@endsection


@push('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.11/clipboard.min.js"></script>
    <script>
        const filterDropdown = document.querySelector("#filter");
        var clipboard = new ClipboardJS('.clipper');
        clipboard.on('success', function (e) {
            alert("Tag code copied")
            e.clearSelection();
        });

        const toggleFilter = () => {
            filterDropdown.classList.toggle("hidden")
        }

        function resetForm() {
            $(".site").val('').trigger('change')
            document.getElementById("search-form-1").reset();
            document.getElementById("search-form-2").reset();
            window.location.replace(location.pathname);
        }
    </script>
@endpush

