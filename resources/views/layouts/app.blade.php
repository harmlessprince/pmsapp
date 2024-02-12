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
    @stack('header-links')
    <!-- Scripts -->
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>--}}

    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @stack('header-scripts')
</head>
<body class="bg-db">
<main class="font-primary relative">
    @include('partials.asides.desktop.desktop')
    @include('partials.asides.mobile.mobile')

    <section class="relative bg-db w-[85%] ml-[15%] h-screen border-natural max-lg:w-[100%] max-lg:ml-0">
        @include('partials.header')
        <section class="px-basic_padding pt-10% pb-5%">
            @yield('content')
        </section>
    </section>
</main>
<script>
    const analyticsDropdown = document.querySelector('#dropdownAnalytics');
    const mobileAnalyticsDropdown = document.querySelector('#mobileAnalytics');
    const managementDropdown = document.querySelector("#dropdownManagements");
    const mobileManagementDropdown = document.querySelector("#mobileManagements");
    const transactionDropdown = document.querySelector("#dropdownTransaction");
    const mobileTransactionDropdown = document.querySelector("#mobileTransaction");
    const profileDropdown = document.querySelector("#profileList");
    const mobileSideBar = document.querySelector("#mobileAside");

    const toggleSideBar = () => {
        mobileSideBar.classList.toggle("hidden")
    }

    const toggledropdown = () => {
        managementDropdown.classList.add("hidden")
        transactionDropdown.classList.add('hidden')
        analyticsDropdown.classList.toggle("hidden")
    }

    const toggleMobiledropdown = () => {
        mobileManagementDropdown.classList.add("hidden")
        mobileTransactionDropdown.classList.add('hidden')
        mobileAnalyticsDropdown.classList.toggle("hidden")
    }

    const toggleManagement = () => {
        analyticsDropdown.classList.add('hidden')
        transactionDropdown.classList.add('hidden')
        managementDropdown.classList.toggle("hidden")
    }

    const toggleMobileManagement = () => {
        mobileManagementDropdown.classList.toggle("hidden")
        mobileTransactionDropdown.classList.add('hidden')
        mobileAnalyticsDropdown.classList.add("hidden")
    }

    const toggleTransaction = () => {
        managementDropdown.classList.add("hidden")
        analyticsDropdown.classList.add('hidden')
        transactionDropdown.classList.toggle("hidden")
    }

    const toggleMobileTransaction = () => {
        mobileManagementDropdown.classList.add("hidden")
        mobileTransactionDropdown.classList.toggle('hidden')
        mobileAnalyticsDropdown.classList.add("hidden")
    }

    const toggleProfile = () => {
        profileDropdown.classList.toggle("hidden")
    }

</script>
@stack('scripts')
</body>
</html>
