<!DOCTYPE html>

<html>

<head>
    <base href="../../../" />
    <title>{{ __('ThinkTree') }}</title>
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
    <meta property="og:site_name" content="ThinkTree" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="{{ asset('placeholder_images/favicon_Al-raqi.svg') }}" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    @if (isArabic())
        <link href="{{ asset('assets/dashboard/plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet"
            type="text/css" />
        <link href="{{ asset('assets/dashboard/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/dashboard/css/custom.css') }}" rel="stylesheet" type="text/css" />
    @else
        <link href="{{ asset('assets/dashboard/plugins/global/plugins.bundle.css') }}" rel="stylesheet"
            type="text/css" />
        <link href="{{ asset('assets/dashboard/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    @endif
    <!--end::Global Stylesheets Bundle-->
    <style>
        * :not(i) {
            font-family: "Cairo", Helvetica, "sans-serif" !important;
        }
    </style>
    <!--end::Global Stylesheets Bundle-->
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
    <div class="d-flex flex-column flex-root " id="kt_app_root">


        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-column flex-lg-row m-auto">

            <!--begin::Body-->
            <div
                class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-center p-12 p-lg-20 m-auto ">
                <!--begin::Card-->
                <div
                    class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-10  shadow">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20  ">
                        <!--begin::Form-->
                        <form class="form w-100 ajax-form " action="{{ route('admin.login') }}" method="POST"
                            novalidate="novalidate" method="POST" data-hide-alert="true"
                            data-success-callback="onAjaxSuccess">
                            @csrf
                            <!--begin::Heading-->
                            <div class="text-center mb-11">
                                <!--begin::Title-->
                                <h1 class="text-dark fw-bolder mb-3"> {{ __('Welcome back') }}</h1>
                                <p class="text-gray-600 text-20">{{ __('Sign In') }}</p>
                                <!--end::Title-->
                            </div>
                            <!--begin::Input group=-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-10"
                                @if (!isArabic()) lang="en" direction="ltr" style="direction:ltr" @else lang="ar" direction="rtl" style="direction:rtl" @endif>
                                <!--begin::Label-->
                                <label class="form-label fs-6 fw-bolder text-dark">{{ __('Email') }}</label>
                                <!--end::Label-->
                                <!--begin::Input wrapper-->
                                <div class="position-relative mb-3">
                                    <input class="form-control form-control-lg form-control-solid ps-5" type="text"
                                        placeholder="{{ __('Email') }}" name="email" id="email_inp"
                                        autocomplete="off" />


                                    <!-- Email Icon Inside Input -->
                                    {{-- <span class="position-absolute top-50 start-0 translate-middle-y  ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M17.9014 8.85156L13.4581 12.4646C12.6186 13.1306 11.4375 13.1306 10.598 12.4646L6.11719 8.85156"
                                                stroke="#6E7079" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M16.9089 21C19.9502 21.0084 22 18.5095 22 15.4384V8.57001C22 5.49883 19.9502 3 16.9089 3H7.09114C4.04979 3 2 5.49883 2 8.57001V15.4384C2 18.5095 4.04979 21.0084 7.09114 21H16.9089Z"
                                                stroke="#6E7079" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </span> --}}
                                    <!--end::Icon-->
                                </div>
                                <!--end::Input wrapper-->
                                <p class="invalid-feedback" id="email"></p>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="fv-row mb-10"
                                @if (!isArabic()) lang="en" direction="ltr" style="direction:ltr" @else lang="ar" direction="rtl" style="direction:rtl" @endif>
                                <!--begin::Label-->
                                <label class="form-label fs-6 fw-bolder text-dark">{{ __('Password') }}</label>
                                <!--end::Label-->
                                <!--begin::Input wrapper-->
                                <div class="position-relative mb-3" data-kt-password-meter="true">
                                    <input class="form-control form-control-lg form-control-solid ps-5" type="password"
                                        placeholder="{{ __('Password') }}" name="password" autocomplete="off"
                                        id="password_inp" />

                                    <!-- Password Icon Inside Input -->
                                    {{-- <span class="position-absolute top-50 start-0 translate-middle-y ms-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20"
                                            viewBox="0 0 18 20" fill="none">
                                            <path
                                                d="M13.4218 7.44756V5.30056C13.4218 2.78756 11.3838 0.749556 8.87078 0.749556C6.35778 0.738556 4.31178 2.76656 4.30078 5.28056V5.30056V7.44756"
                                                stroke="#5E6366" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12.683 19.2495H5.042C2.948 19.2495 1.25 17.5525 1.25 15.4575V11.1685C1.25 9.07346 2.948 7.37646 5.042 7.37646H12.683C14.777 7.37646 16.475 9.07346 16.475 11.1685V15.4575C16.475 17.5525 14.777 19.2495 12.683 19.2495Z"
                                                stroke="#5E6366" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M8.86328 12.2026V14.4236" stroke="#130F26" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span> --}}

                                    <!--begin::Visibility toggle-->
                                    <span
                                        class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                        data-kt-password-meter-control="visibility">
                                        <i class="bi bi-eye-slash fs-2"></i>
                                        <i class="bi bi-eye fs-2 d-none"></i>
                                    </span>
                                    <!--end::Visibility toggle-->
                                </div>
                                <!--end::Input wrapper-->
                                <p class="invalid-feedback" id="password"></p>
                            </div>
                            <!--end::Input group-->

                            <!--begin::Actions-->
                            <div class="text-center">
                                <!--begin::Submit button-->

                                <button type="submit" id="submit-btn" class="btn btn-lg btn-primary w-100 mb-5"
                                    data-kt-indicator="">
                                    <span class="indicator-label">
                                        {{ __('login') }}
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
                        <div class="d-flex flex-center flex-column-auto  ">

                        </div>
                        <!--end::Footer-->
                    </div>
                    <!--end::Wrapper-->

                </div>
                <!--end::Card-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Root-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
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
<style>
    #kt_app_root {
        position: relative;
        /* Set relative positioning to contain the pseudo-element */
        overflow: hidden;
        /* Ensures no part of the background image exceeds container boundaries */
    }

    #kt_app_root::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('{{ asset('placeholder_images/back.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        filter: blur(4px);
        z-index: -1;
        /* Ensures the background stays behind the content */
    }
</style>
