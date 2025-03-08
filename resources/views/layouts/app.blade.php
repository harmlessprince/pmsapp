<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'APP') - {{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,500;0,600;0,700;1,400&family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"/>

    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/images/favicon_io/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/images/favicon_io/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon_io/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('assets/images/favicon_io/site.webmanifest')}}">
    @stack('header-links')

    <!-- Scripts -->
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>--}}
    <style>
        .select2-container--default .select2-selection--single {
            padding-top: 0.25rem;
            padding-bottom: 0.25rem;
            height: 2.75rem;
            width: 100%;
            position: relative;
            cursor: pointer;
            background-color: transparent;
            border-radius: 0.5rem;
            border-width: 1px;

            color: rgb(254 255 254 / var(--tw-text-opacity));
            font-size: 14px;
            --tw-border-opacity: 1;
            border-color: rgb(254 255 254 / var(--tw-border-opacity));
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            --tw-text-opacity: 1;
            color: rgb(254 255 254 / var(--tw-text-opacity));
        }

        @keyframes text-animation {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }

        .button-transition {
            transition: text-animation 1s ease; /* Adjust the transition duration as needed */
        }
    </style>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @stack('header-scripts')
</head>
<body class="bg-db">
<main class="font-primary relative">
    @include('partials.asides.desktop.desktop')
    @include('partials.asides.desktop.mobile')
    @include('image-view-modal')
    <section class="relative bg-db w-[85%] ml-[15%] h-screen border-natural max-lg:w-[100%] max-lg:ml-0">
        @include('partials.header')
        <section class="px-basic_padding pt-10% pb-5%">
            @include('flash-message')
            @yield('content')
        </section>
    </section>
</main>
<script src="{{asset('assets/js/toggle.js')}}"></script>
<script src="{{asset('assets/js/loader.js')}}"></script>
<script src="{{asset('assets/js/api.js')}}"></script>
<script src="{{asset('assets/js/address.js')}}"></script>
<script src="{{asset('assets/js/action.js')}}"></script>
<script>
    const analyticsDropdown = document.querySelector('#dropdownAnalytics');
    const mobileAnalyticsDropdown = document.querySelector('#mobileTestAnalytics');
    const managementDropdown = document.querySelector("#dropdownManagements");
    const mobileManagementDropdown = document.querySelector("#mobileManagements");
    const transactionDropdown = document.querySelector("#dropdownTransaction");
    const mobileTransactionDropdown = document.querySelector("#mobileTransaction");
    const profileDropdown = document.querySelector("#profileList");
    const mobileSideBar = document.querySelector("#mobileAside");
    const ajaxSpan = document.querySelector("#ajax_span");
    const ajaxLoader = document.querySelector("#ajax_loader");



    // allBtn.addEventListener("click", () => console.log('wetin dey happen'));




    function getQueryParamValue(param) {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        return urlParams.get(param);
    }




</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script
    src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&libraries=places,geometry&callback=initAutocomplete"
    defer></script>
<script defer>





    document.getElementById("allBtn")?.addEventListener("click", function () {
        document.getElementById("allBtn").innerHTML = "seding..."
        document.getElementById("allBtn").disabled = true
    });

    function showImageModal(imageUrl) {
        const imageElement = document.getElementById('image_view_in_modal')
        imageElement.src = imageUrl
    }

    function deleteItem(event, item, message = "Do you want to delete this item ?") {
        event.preventDefault();
        if (confirm(message)) {
            document.getElementById(`frm-delete-item-${item}`).submit();
        }
    }
</script>
@stack('scripts')

</body>
</html>
