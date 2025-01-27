<!--begin::Navbar-->
<div class="card mb-5 mb-xl-10">
    <div class="card-body py-0 pb-0">
        <!--begin::Navs-->
        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
            <!--begin::Nav item-->
            @can('view_roles')
                <!--begin::Nav item-->
                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ getClassIfUrlContains('active', 'roles') }}"
                        href="{{ route('dashboard.settings.roles.index') }}">{{ __('Roles') }}</a>
                </li>
            @endcan
            <!--end::Nav item-->
            <!--begin::Nav item-->
            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ getClassIfUrlContains('active', 'general') }}"
                    href="{{ route('dashboard.settings.general.main') }}">{{ __('General settings') }}</a>
            </li>
            <!--end::Nav item-->
            @can('view_home_content')
                <!--begin::Nav item-->
                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ getClassIfUrlContains('active', 'about-us') }}"
                        href="{{ route('dashboard.settings.home.about-us') }}">{{ __('Home page settings') }}</a>
                </li>
                <!--end::Nav item-->
            @endcan


            <!--end::Nav item-->
            @can('view_home_content')
                <!--begin::Nav item-->
                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ getClassIfUrlContains('active', 'metatags') }}"
                        href="{{ route('dashboard.settings.general.metatags') }}">{{ __('Meta tags settings') }}</a>
                </li>
                <!--end::Nav item-->
            @endcan
            <!--begin::Nav item-->

        </ul>
        <!--begin::Navs-->
    </div>
</div>
<!--end::Navbar-->
