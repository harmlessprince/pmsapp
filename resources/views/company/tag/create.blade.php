@extends('layouts.app')
@section('title', 'Tag')
@section('page', 'Tag Management')
@section('content')

    <div class="font-big text-big text-natural mb-2 flex flex-row justify-between">
        <div>Add New Tag</div>
        <button
            class="font-big text-normal text-primary_color rounded-lg border border-primary_color px-[16px] py-[10px] cursor-pointer bg-transparent">
            Manage Tags
        </button>
    </div>
    <form class="mt-[2%] w-[100%]" action="{{route('company.tags.store')}}" method="post">
        @csrf
        <div class="flex flex-row justify-between mb-2 max-lg:flex-col">
            <div class="w-[45%] max-lg:w-full mb-2">
                <x-input-label for="name" :value="__('Tag Name')"/>
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="tag_name" :value="old('tag_name')"
                              required/>
                <x-input-error :messages="$errors->get('tag_name')" class="mt-2"/>
            </div>
            <div class="w-[45%] max-lg:w-full">
                <x-input-label for="site_id" :value="__('Select site')"/>
                <x-select-input id="site_id" class="block mt-1 w-full" name="site" required>
                    <option>Select Site</option>
                    @foreach($sites as $site)
                        <option value="{{$site->id}}">{{$site->name}}</option>
                    @endforeach
                </x-select-input>
                <x-input-error :messages="$errors->get('site')" class="mt-2"/>

            </div>
        </div>

        {{--        <div class="w-full  mb-2">--}}
        {{--            <label class="font-big text-normal text-natural">Tag Type</label>--}}
        {{--            <select--}}
        {{--                class="outline-none w-full border border-natural bg-db h-[44px] px-2 py-1 rounded-lg text-white font-normal text-natural">--}}
        {{--                <option class=""></option>--}}
        {{--                <option>tag type</option>--}}
        {{--                <option>tag type</option>--}}
        {{--                <option>tag type</option>--}}
        {{--            </select>--}}
        {{--        </div>--}}

        <div class="w-full  mb-2">
            <x-input-label for="site_id" :value="__('Comment')"/>
            <x-text-area-input for="site_id" name='comment' :value="old('comment')"/>
            <x-input-error :messages="$errors->get('comment')" class="mt-2"/>
        </div>


        <div class="w-full mb-2">
            <x-input-label for="location" :value="__('Search Location')"/>
            <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" :value="old('location')"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
        </div>
        <div class="flex flex-row justify-between mb-2 max-lg:flex-col">
            <div class="w-[48%] max-lg:w-full max-lg:mb-2">
                <x-input-label for="longitude" :value="__('Longitude')"/>
                <x-text-input id="longitude" class="block mt-1 w-full" type="number" name="longitude"/>
                <x-input-error :messages="$errors->get('longitude')" class="mt-2"/>
            </div>
            <div class="w-[48%] max-lg:w-full">
                <x-input-label for="latitude" :value="__('Latitude')"/>
                <x-text-input id="latitude" class="block mt-1 w-full" type="number" name="latitude"/>
                <x-input-error :messages="$errors->get('latitude')" class="mt-2"/>
            </div>
        </div>
        <button class="mt-[1%] w-[60px] h-[40px] bg-primary_color rounded-lg text-normal text-natural font-big"
                type="submit">Add
        </button>
    </form>

@endsection
