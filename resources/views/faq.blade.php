<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
        <link
            href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,500;0,600;0,700;1,400&family=Inter:wght@400;500;600;700&display=swap"
            rel="stylesheet">
            <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/images/favicon_io/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/images/favicon_io/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon_io/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('assets/images/favicon_io/site.webmanifest')}}">

    <style>
        /* this style is for the frequently used summary tag */
        .faq1{
            width: 100%;
            background-color: #226F65;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            font-weight: 500;
            font-size: 18px;
            cursor: pointer;
            color: #fff;
            padding: 0.5rem;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center
        }

        .faq2{
            width: 100%;
            background-color: #fff;
            border-radius: 8px;
            font-weight: 500;
            font-size: 18px;
            cursor: pointer;
            color: #000;
            padding: 1rem 0.5rem;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center
        }
    </style>

         <!-- Scripts -->
         @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-primary">
        <main>
        <nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse md:ml-[5%]">
                <img src="/assets/landing_images/logo.png" class="h-8" alt="perfraka logo">
                <img src="/assets/landing_images/logo_name.png" class="" alt="perfraka logo_name">
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <a href="{{route('login')}}">
                    <button type="button" class="text-[#ffffff] bg-col2 outline-none focus:outline-none font-normal rounded-lg text-size1 px-5 py-2 text-center">
                    Login
                    </button>
                    </a>
                <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden  focus:outline-none " aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="{{route('welcome')}}" class="block py-2 px-3 text-gray-900 rounded md:bg-transparent md:text-size1 md:text-col1 md:hover:text-col3 md:p-0 font-normal">Home</a>
                </li>
                <li>
                <a href="{{route('about')}}" class="block py-2 px-3 text-gray-900 rounded md:bg-transparent md:text-size1 md:text-col1 md:hover:text-col3 md:p-0 font-normal">About us</a>
                </li>
                <li>
                    <a href="{{route('faq')}}" class="block py-2 px-3 text-gray-900 rounded md:bg-transparent md:text-size1 md:text-col1 md:hover:text-col3 md:p-0 font-normal">FAQ</a>
                </li>
            </ul>
            </div>
            </div>
        </nav>

        <div class="mt-[1.5em] h-[30vh] w-full flex flex-row items-center justify-center font-bigger text-[#fff] text-[3em] bg-col3">FAQ</div>

        {{-- frequently asked --}}
        <section class="bg-col4 py-[5%] px-[15%]  max-mobile:px-[5%]">
            <header class="font-bigger text-header text-center">Frequently Asked <span class="text-[#C52216]">Questions</span> 
                <div class="relative w-full my-5">
                    <input type="search" placeholder="Type your Questions" 
                    class="w-full pr-[75px] bg-[#fff] text-eighteen font-big h-[3.75em] rounded-[10px] outline-none border border-[#838383]"
                    />
                    <div class="flex flex-row items-center justify-center absolute top-[1px] right-0 bg-col3 w-[64px] h-[66px] rounded-tr-[10px] rounded-br-[10px]">
                    <span class="material-symbols-outlined mr-4 w-[18px] h-[18px] text-[#fff] ">Search</span>
                    </div>
                </div>
                <details class="group my-5">
                    <summary id="group1" class="faq2">
                        <span class="font-[500]">How can i get the app</span>
                        <span class="material-symbols-outlined mr-4 w-[18px] h-[18px] text-[#000] transition group-open:rotate-180 group-open:text-[#fff]">expand_more</span>
                    </summary>
                <article class="bg-[#fff] text-[#000] px-2 pt-5 pb-10 text-eighteen font-normal text-left">
                    Contact the team to get the app 
                </article>
                </details>

                <details class="group my-5">
                    <summary id="group2" class="faq2">
                        <span class="font-[500]">Can any business use it </span>
                        <span class="material-symbols-outlined mr-4 w-[18px] h-[18px] text-[#000] transition group-open:rotate-180 group-open:text-[#fff]">expand_more</span>
                    </summary>
                <article class="bg-[#fff] text-[#000] px-2 pt-5 pb-10 text-eighteen font-normal text-left">
                    Contact the team to get the app 
                </article>
                </details>

                <details class="group my-5">
                    <summary id="group3" class="faq2">
                        <span class="font-[500]">How can i contact the team  </span>
                        <span class="material-symbols-outlined mr-4 w-[18px] h-[18px] text-[#000] transition group-open:rotate-180 group-open:text-[#fff]">expand_more</span>
                    </summary>
                <article class="bg-[#fff] text-[#000] px-2 pt-5 pb-10 text-eighteen font-normal text-left">
                    Contact the team to get the app 
                </article>
                </details>

                <details class="group my-5">
                    <summary id="group4" class="faq2">
                        <span class="font-[500]">How much is it per month  </span>
                        <span class="material-symbols-outlined mr-4 w-[18px] h-[18px] text-[#000] transition group-open:rotate-180 group-open:text-[#fff]">expand_more</span>
                    </summary>
                <article class="bg-[#fff] text-[#000] px-2 pt-5 pb-10 text-eighteen font-normal text-left">
                    Contact the team to get the app 
                </article>
                </details>      
            </section>

            <footer class="flex flex-row  max-mobile:flex-col items-center bg-col3 px-[15%]  max-mobile:px-[5%] pt-[3%] max-mobile:py-[10%] pb-[3.5%] text-[#fff]">
                <div class="w-[19em] max-mobile:w-full">
                <div class="flex flex-row items-center">
                <img src="/assets/landing_images/logo2.png" class="w-[40px] h-[54px] mr-1" alt="perfraka logo">
                <img src="/assets/landing_images/logo_name2.png" class="w-[103px] h-[11px]" alt="perfraka logo_name">
                </div>
                <div class="font-normal text-[#fff] text-normal">
                At PERFTRAKA, we specialize 
                in providing cutting-edge Location Capture, Attendance.
                </div>
                </div>
                <div class="w-[23em]  max-mobile:w-full mx-20 max-mobile:mx-0  max-mobile:my-10">
                    <header class="text-center font-bigger text-size1">Quick Links</header>
                    <div class="flex flex-row justify-around  max-mobile:justify-between py-1 font-normal text-size1">
                        <span>Home</span>
                        <span>About us</span>
                        <span>FAQ</span>
                        <span>Contact us</span>
                    </div>
                </div>
                <div class="w-[6.5em]">
                    <header class="text-center font-bigger text-size1">Our socials</header>
                    <div class="flex flex-row justify-around py-1 font-normal text-size1">
                        <img src="/assets/landing_images/linkedin.png" class="" alt="linkedin"> 
                        <img src="/assets/landing_images/facebook.png" class="" alt="facebook"> 
                        <img src="/assets/landing_images/twitter.png" class="w-[18px] h-[18px]" alt="twitter"> 
                    </div>
                </div>
            </footer>
        </main>
  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
        <script>
            const group1 = document.querySelector("#group1");
            const group2 = document.querySelector("#group2");
            const group3 = document.querySelector("#group3");
            const group4 = document.querySelector("#group4");
            let value1 = false
            let value2 = false
            let value3 = false
            let value4 = false

            group1.addEventListener("click" , () => {
                if(value1){
                    group1.classList.remove("faq1")
                    group1.classList.add("faq2")
                }
                else{
                    group1.classList.remove("faq2")
                    group1.classList.add("faq1")
                }
                value1 = !value1
            })

            group2.addEventListener("click" , () => {
                if(value2){
                    group2.classList.remove("faq1")
                    group2.classList.add("faq2")
                }
                else{
                    group2.classList.remove("faq2")
                    group2.classList.add("faq1")
                }
                value2 = !value2
            })

            group3.addEventListener("click" , () => {
                if(value3){
                    group3.classList.remove("faq1")
                    group3.classList.add("faq2")
                }
                else{
                    group3.classList.remove("faq2")
                    group3.classList.add("faq1")
                }
                value3 = !value3
            })

            group4.addEventListener("click" , () => {
                if(value4){
                    group4.classList.remove("faq1")
                    group4.classList.add("faq2")
                }
                else{
                    group4.classList.remove("faq2")
                    group4.classList.add("faq1")
                }
                value4 = !value4
            })


        </script>
        </body>
    </html>
