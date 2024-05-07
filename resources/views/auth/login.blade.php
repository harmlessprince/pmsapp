@extends('layouts.guest')
@section('title', 'Login')
@section('body')
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>
    <form class="w-96 max-mobile:w-[90%] bg-background_color mx-auto rounded-xl px-1% py-2%" method="POST" action="{{ route('login') }}">
        @csrf
        {{-- <div
            class="w-12 h-12 bg-logo text-primary_color p-2 mx-auto flex flex-row items-center justify-center font-medium mb-5%">
            Logo
        </div> --}}
        <div class="text-center w-full flex flex-row justify-center">
            <img src="{{asset('/assets/images/logo-red-dot.png')}}"
            class="w-[47px] h-[67px]" alt="logo" /> <br/>
            </div>
        </div> 
        <div class="text-center w-full flex flex-row justify-center mt-2 mb-5">
            <img src="{{asset('/assets/landing_images/logo_name.png')}}"
            class="w-[142px] h-[16px]" alt="logo" />
            </div>
        </div>
        <div class="text-white text-xl text-center font-bold">Log in to your account</div>
        <div class="text-basic text-sm font-normal text-center mb-5%">Welcome back! Please enter your details.</div>
        @if ($message = Session::get('banned'))
            <div class="text-red-400 ms-3 text-sm font-medium">
                {{$message}}
            </div>
        @endif

        <div class="mb-5">
            <label class="block text-natural font-medium text-sm">Email</label>
            <input
                type="email"
                class="w-full border border-natural bg-transparent h-11 px-2 py-1 rounded-lg text-natural
            placeholder-color font-normal text-normal
            focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
            focus:invalid:error focus:invalid:error
            "
                placeholder="Enter your email" name="email" value=""/>
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <div class="mb-5">
            <label class="block text-natural font-medium text-normal">Password</label>
            <input
                type="password"
                class="w-full border border-natural bg-transparent h-11 px-2 py-1 rounded-lg text-natural
                placeholder-color font-normal text-normal
                focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                focus:invalid:error focus:invalid:error
                "
                placeholder=". . . . . . . " name="password" value=""/>
            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
        </div>

        <div class="flex flex-row justify-between items-top">
        <div class="mb-5 flex flex-row items-center">
        <input
        type="checkbox"
        id="subscribeNews"
        name="subscribe"
        value="newsletter" 
        class="w-[16px] h-[16px] rounded-[4px] border border-[#fff] outline-none mr-3"
        />
        <span class="text-[#FEFFFE] text-normal" for="password">Remember</span>
        </div>

        <a href="#">
        <span class="font-[500] text-primary_color text-normal cursor-pointer">Forgot password?</span>
         </a>
    </div>
       


        <button class="bg-primary_color text-natural h-11 w-full rounded-lg text-base font-semibold" id="allBtn">Log in</button>
    </form>
@endsection
