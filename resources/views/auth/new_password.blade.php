<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic
Product Version: 8.2.0
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html
    @if (!isArabic()) lang="en" direction="ltr" style="direction:ltr" @else lang="ar" direction="rtl" style="direction:rtl" @endif
    data-theme-mode="{{ setting('theme_mode') ?? 'light' }}" data-theme="{{ setting('theme_mode') ?? 'light' }}">
<!--begin::Head-->

<head>
    <base href="../../../" />
    <title>{{ __('Tinktree') }}</title>
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
    <meta property="og:url" content="{{ asset('placeholder_images/favicon.svg') }}" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="{{ asset('placeholder_images/favicon.svg') }}" />
    <link rel="shortcut icon" href="{{ asset('placeholder_images/favicon.svg') }}" />

    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('assets/dashboard/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/dashboard/css/style.bundle' . (isArabic() ? '.rtl' : '') . '.css') }}" rel="stylesheet"
        type="text/css" />
    @if (isArabic())
        <link href="{{ asset('assets/vendor-dashboard/css/custom.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Global Stylesheets Bundle-->
        <style>
            html,
            body {
                font-family: 'jannah-lt-regular', sans-serif;
            }
        </style>
    @else
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;900&display=swap"
            rel="stylesheet">
    @endif
    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }
    </script>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center bgi-no-repeat">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-center" id="kt_app_root">
        <!--begin::Page bg image-->
        <style>
            body {
                background-image: url('{{ asset('placeholder_images/vendor-background.jpg') }}');
            }

            [data-bs-theme="dark"] body {
                background-image: url('{{ asset('assets/dashboard/media/auth/bg4-dark.svg') }}');
            }
        </style>
        <!--end::Page bg image-->
        <div
            class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12 p-lg-20">
            <!--begin::Card-->
            <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
                <!--begin::Wrapper-->
                <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
                    <!--begin::Form-->
                    <form class="form w-100 ajax-form" action="{{ route('reset.password') }}" method="POST"
                        novalidate="novalidate" method="POST" data-hide-alert="true"
                        data-success-callback="onAjaxSuccess">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <!--begin::Heading-->
                        <div class="text-center mb-11">
                            <!--begin::Title-->
                            <h1 class="text-dark fw-bolder mb-3">{{ __('Setup New Password') }}</h1>
                            <!--end::Title-->
                        </div>
                        <!--begin::Input group=-->
                        {{--  <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label fs-6 fw-bolder text-dark">{{ __('Email') }}</label>
                            <!--end::Label-->
                            <!--begin::Email-->
                            <input type="text" placeholder="{{ __('Email') }}" name="email" id="email_inp"
                                autocomplete="off" class="form-control bg-transparent" />
                            <p class="invalid-feedback" id="email"></p>
                            <!--end::Email-->
                        </div>  --}}
                        <!--end::Input group=-->

                        <!--begin::Input group=-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label fs-6 fw-bolder text-dark">{{ __('New password') }}</label>
                            <!--end::Label-->
                            <!--begin::password-->
                            <div class="position-relative mb-3" data-kt-password-meter="true">
                                <input class="form-control form-control-lg form-control-solid" type="password"
                                    name="password" autocomplete="off" id="password_inp" />
                                <!--begin::Visibility toggle-->
                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                    data-kt-password-meter-control="visibility">
                                    <i class="bi bi-eye-slash fs-2"></i>

                                    <i class="bi bi-eye fs-2 d-none"></i>
                                </span>
                                <!--end::Visibility toggle-->
                            </div>
                            <p class="invalid-feedback" id="password"></p>
                            <!--end::password-->
                        </div>
                        <!--end::Input group=-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label fs-6 fw-bolder text-dark">{{ __('Repeat password') }}</label>
                            <!--end::Label-->
                            <!--begin::Input wrapper-->
                            <div class="position-relative mb-3" data-kt-password-meter="true">
                                <input class="form-control form-control-lg form-control-solid" type="password"
                                    name="password_confirmation" autocomplete="off" id="password_confirmation_inp" />
                                <!--begin::Visibility toggle-->
                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                    data-kt-password-meter-control="visibility">
                                    <i class="bi bi-eye-slash fs-2"></i>

                                    <i class="bi bi-eye fs-2 d-none"></i>
                                </span>
                                <!--end::Visibility toggle-->
                            </div>
                            <!--end::Input wrapper-->
                            <p class="invalid-feedback" id="password_confirmation"></p>
                        </div>
                        <!--end::Input group=-->
                        <!--begin::Actions-->
                        <div class="text-center">
                            <!--begin::Submit button-->

                            <button type="submit" id="submit-btn" class="btn btn-lg btn-primary w-100 mb-5"
                                data-kt-indicator="">
                                <span class="indicator-label">
                                    {{ __('Submit') }}
                                </span>

                                <span class="indicator-progress">
                                    {{ __('Please wait ...') }} <span
                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>

                            </button>
                            <!--end::Submit button-->
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                    <!--begin::Footer-->
                    <div class="d-flex flex-center flex-column-auto p-10">
                        <!--begin::Links-->
                        <div class="d-flex align-items-center fw-bold fs-6">
                            <a href="https://www.linkedin.com/in/omar-a-mahran/" target="_blank"
                                class="text-gray-800 text-hover-primary">Omar_A_Mahran</a>
                        </div>
                        <!--end::Links-->
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end::Wrapper-->

            </div>
            <!--end::Card-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Root-->
    <!--begin::Javascript-->
    <script>
        let locale = "{{ app()->getLocale() }}";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('assets/dashboard/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('assets/dashboard/js/custom/authentication/sign-in/general.js') }}"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
    <script src="{{ asset('assets/shared/js/global.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/global/translations.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/global/scripts.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#submit-btn").prop('disabled', false);
            $("#submit-btn").attr('data-kt-indicator', '');

            window['onAjaxSuccess'] = (response) => {
                console.log(response.url);
                window.location = response.url;
            }
        });
    </script>
</body>
<!--end::Body-->

</html>
