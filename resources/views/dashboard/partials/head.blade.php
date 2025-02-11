<title>{{ __('Thinktree') }}</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta charset="utf-8" />
<meta name="description"
    content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
<meta name="keywords"
    content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:title"
    content="Metronic - Bootstrap Admin Template, HTML, VueJS, React, Angular. Laravel, Asp.Net Core, Ruby on Rails, Spring Boot, Blazor, Django, Express.js, Node.js, Flask Admin Dashboard Theme & Template" />
<meta property="og:url" content="https://keenthemes.com/metronic" />
<meta property="og:site_name" content="Keenthemes | Metronic" />
<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
<link rel="shortcut icon" href="{{ asset('placeholder_images/favicon.svg') }}" />
<!--begin::Fonts-->
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
<!--end::Fonts-->
<!--begin::Vendor Stylesheets(used for this page only)-->
<link href="{{ asset('assets/dashboard/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets/dashboard/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
    type="text/css" />
<!--end::Vendor Stylesheets-->
<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
@if (isArabic())
    <link href="{{ asset('assets/dashboard/plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/dashboard/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/dashboard/css/custom.css') }}" rel="stylesheet" type="text/css" />
@else
    <link href="{{ asset('assets/dashboard/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/dashboard/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
@endif
<!--end::Global Stylesheets Bundle-->
<style>
    * :not(i) {
        font-family: "Cairo", Helvetica, "sans-serif" !important;
    }

    input[type=number].no-arrow {
        -moz-appearance: textfield;
    }

    input[type=number].no-arrow::-webkit-outer-spin-button,
    input[type=number].no-arrow::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>
<script>
    // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }
</script>
