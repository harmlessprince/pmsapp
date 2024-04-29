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

        <div class="mt-[1.5em] h-[30vh] w-full flex flex-row items-center justify-center font-bigger text-[#fff] text-[3em] bg-col3"> ABOUT US</div>
        
        <section class="py-[5%] px-[15%] max-mobile:px-[5%] bg-col4">
            <div class="text-center text-normal font-[500] text-col5">Learn about PERFTRAKA</div>
            <header class="font-[700] text-header max-mobile:text-[2em] text-col3 text-center">
                <span class="px-1 pb-2 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:h-[8px] after:w-full after:bg-[#E63026] after:rounded-[4px]">About Us</span>
            </header>
            <div class="py-[1em] flex flex-row max-mobile:flex-col">
                <div class="pt-[5%] text-size1 font-normal">
                    <p>
                    At PERFTRAKA, we specialize in providing cutting-edge Location Capture, 
                    Employee & Contractor Attendance Management Solutions tailored to meet the diverse needs of 
                    businesses across various industries. 
                    <p>Our innovative platform allows 
                    businesses to seamlessly monitor and manage activities across multiple sites, 
                    ensuring optimal efficiency and security.
                    <p>
                    </p> 
                    <p class="py-[5%]">
                        With our solution, businesses can easily track employee attendance, streamline visitor 
                        registration processes, and capture crucial location data in real-time. Whether you're managing 
                        a single location or multiple sites, our platform offers the flexibility and scalability to meet 
                        your unique requirements.
                    </p>
                    <p>
                        Say goodbye to manual tracking methods and inefficiencies – with [Company Name], 
                        you can centralize your operations and gain full visibility into all activities, empowering you to make informed decisions 
                        and drive business success.Experience the power of streamlined operations and enhanced security with PERFTRAKA.
                    </p>
                </div>
                <img src="/assets/landing_images/mobile3.png" class="w-[26.5em] h-[29.2em]  max-mobile:h-[23em] ml-[2em] max-mobile:ml-0" alt="perfraka mobile">
            </div>
        </section>  

        <section  class="py-[5%] px-[15%]  max-mobile:px-[5%]">
            <header class="font-[800] text-[2.25em] text-center">Get In touch with us</header>
            <div class="text-center font-normal text-[#667085]">We’d love to hear from you. Please fill out this form.</div>

            <form class="mt-5">
                <div class="flex flex-row justify-between mb-5">
                    <div class="w-[48%]">
                        <label class="block text-[#344054] font-big text-normal">First name</label>
                        <input
                            type="text"
                            class="outline-none w-full border border-[#D0D5DD] bg-transparent h-[3em] px-2 py-1 rounded-lg text-[#667085]
                        placeholder-color font-normal text-normal
                        focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                        focus:invalid:error focus:invalid:error
                        "
                            placeholder="First name" name="email" value=""/>
                        {{-- <x-input-error :messages="$errors->get('email')" class="mt-2"/> --}}
                    </div>
                    <div class="w-[48%]">
                        <label class="block text-[#344054] font-big text-normal">Last name</label>
                        <input
                            type="text"
                            class="outline-none w-full border border-[#D0D5DD] bg-transparent h-[3em] px-2 py-1 rounded-lg text-[#667085]
                        placeholder-color font-normal text-normal
                        focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                        focus:invalid:error focus:invalid:error
                        "
                            placeholder="Last name" name="email" value=""/>
                        {{-- <x-input-error :messages="$errors->get('email')" class="mt-2"/> --}}
                    </div>
                </div>

                <div class="mb-5">
                    <div class="w-full">
                        <label class="block text-[#344054] font-big text-normal">Email</label>
                        <input
                            type="email"
                            class="outline-none w-full border border-[#D0D5DD] bg-transparent h-[3em] px-2 py-1 rounded-lg text-[#667085]
                        placeholder-color font-normal text-normal
                        focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                        focus:invalid:error focus:invalid:error
                        "
                            placeholder="you@company.com" name="email" value=""/>
                        {{-- <x-input-error :messages="$errors->get('email')" class="mt-2"/> --}}
                    </div>
                </div>

                <div class="mb-5">
                    <div class="w-full">
                        <label class="block text-[#344054] font-big text-normal">Message</label>
                        <textarea id="message" rows="5" 
                        class="outline-none block bg-transparent px-2 py-1 w-full text-[#667085] font-normal text-normal placeholder-color rounded-lg border border-[#D0D5DD] 
                        focus:outline-none focus:border-primary_color focus:ring-1 focus:ring-background_color
                        "></textarea>
                    </div>
                </div>

                <button class="bg-[#C52216] w-full h-[60px] rounded-[10px] text-size1 font-[600] text-[#ffffff]">Submit</button>

            </form>
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
        </body>
    </html>
