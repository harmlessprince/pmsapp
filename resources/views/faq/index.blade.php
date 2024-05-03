@extends('layouts.app')
@section('title', 'FAQ Management')
@section('page', 'FAQ Management')

@push('header-scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
@endpush
@section('content')

    <section>
        <section class="flex flex-row justify-between w-[100%] max-lg:mt-[15%]">
            <div
                class="flex flex-row bg-background_color rounded-lg h-[111px] w-[290px] items-center px-[20px] max-lg:mx-auto">
                <div class="w-[44px] h-[44px] bg-blue-500 rounded-lg flex flex-row items-center justify-center">
                    <span class="material-symbols-outlined text-white">home</span>
                </div>
                <div class="ml-[5%]">
                    <h1 class="font-bold text-3xl text-blue-500">{{$countOfFaqs}}</h1>
                    <span class="font-normal text-sm text-blue-500">Faqs</span>
                </div>
            </div>
        </section>

        <!-- table section -->
        <section class="pt-basic_padding">
            <div class="font-big text-big text-natural mb-2 flex flex-row items-center justify-between">
                <div>Added Faqs</div>
                <div
                    class="rounded-lg border border-primary_color flex flex-row items-center px-[16px] py-[10px] cursor-pointer">
                    <img src="{{asset('assets/images/plus.png')}}" class="w-[11px] h-[11px]" alt="plus"/>
                    <a href="{{route('admin.faqs.create')}}">
                        <span class="text-primary_color font-big text-normal ml-2"> Add New Faq</span>
                    </a>
                </div>
            </div>
            <!-- table 2 section -->
            <section class="border border-table rounded-lg w-[100%] mt-[2%] bg-background_color">
                <div class="overflow-x-auto">
                    <table class="table-fixed w-[100%] max-lg:w-[1000px]">
                        <thead class="">
                        <tr class="text-left text-small text-natural font-big">
                            <th class=" px-small py-[1%] w-[10%]">Question</th>
                            <th class=" px-small py-[1%] w-[15%]">Answer</th>
                            <th class=" px-small py-[1%] w-[15%]">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($faqs as $faq)
                            <tr class="text-normal font-normal text-natural border border-table border-collapse hover:bg-db">
                                <td class="px-small">{{$faq->question}}</td>
                                <td class="px-small">{{$faq->answer}}</td>
                                <td class="px-small">
                                    <div class="flex flex-row justify-end">
                                        <a href="{{route('admin.faqs.edit', ['faq' => $faq])}}">
                                            <img src="{{asset('assets/images/edit.png')}}" alt="edit"
                                                 class="w-[16px] h-[16px] ml-3 cursor-pointer"/>
                                        </a>
                                        <form id="frm-delete-faq-{{$faq->id}}"
                                              action="{{ route('admin.delete.faq', ['faq' => $faq]) }}"
                                              style="display: none;" method="GET">

                                        </form>
                                        <a href=""
                                           onclick='deleteFaq(event, {{"$faq->id"}})'>
                                            <span
                                                class="material-symbols-outlined mr-4 w-[24px] h-[24px] text-red-500 cursor-pointer">delete</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-normal font-normal text-natural border border-table border-collapse hover:bg-db">
                                <td colspan="7" class="text-center"> No Data</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

            </section>
        </section>
    </section>
@endsection


@push('scripts')
    <script>
        function deleteFaq(event, faq_id) {
            event.preventDefault();
            if (confirm("Do you want to delete the faq ?")) {
                document.getElementById(`frm-delete-faq-${faq_id}`).submit();
            }
        }
    </script>
@endpush

