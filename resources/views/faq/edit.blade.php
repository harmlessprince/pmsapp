@extends('layouts.app')
@section('title', 'FAQ management')
@section('page', 'FAQ Management')
@section('content')
    <!-- <div class="font-big text-big text-natural">Add new Site</div> -->
    <div class="font-big text-big text-natural mb-2 flex flex-row justify-between">
        <div>Create FAQ</div>
        <a
            class="font-big text-normal text-primary_color rounded-lg border border-primary_color px-[16px] py-[10px] cursor-pointer bg-transparent"
            href="{{route('admin.faqs.index')}}">
            Manage FAQ
        </a>
    </div>
    <form class="mt-[2%] w-[100%]" action="{{route('admin.faqs.store')}}" method="POST"
          enctype="multipart/form-data">
        @csrf
        <div class="grid gap-6 mb-6">

            <div class="flex flex-col">
                <x-input-label for="question" :value="__('Question')"/>
                <x-text-input id="question" class="block mt-1 w-full" type="text" name="question"
                              :value="old('question')"
                              required/>
                <x-input-error :messages="$errors->get('question')" class="mt-2"/>
            </div>
            <div class="flex flex-col">
                <x-input-label for="answer" :value="__('Answer')"/>
                <x-text-area-input name="answer" :value="old('answer')" required id="answer"></x-text-area-input>
                <x-input-error :messages="$errors->get('answer')" class="mt-2"/>
            </div>
        </div>









        <button class="mt-[1%] w-[60px] h-[40px] bg-primary_color rounded-lg text-normal text-natural font-big">Add
        </button>
    </form>

@endsection
@push('scripts')
    <script>

    </script>
@endpush

