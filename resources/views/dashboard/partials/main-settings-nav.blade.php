<!--begin:::Tabs-->
<ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2 w-auto">
    <!--begin:::Tab item-->
    <li class="nav-item">
        <a class="nav-link text-active-primary pb-4  {{ getClassIfUrlContains('active', 'contact') }}"
            href="{{ route('dashboard.settings.general.contact') }}">{{ __('Contact data') }}</a>
    </li>
    <!--end:::Tab item-->
    <!--begin:::Tab item-->
    <li class="nav-item">
        <a class="nav-link text-active-primary pb-4  {{ getClassIfUrlContains('active', 'mobile-app') }}"
            href="{{ route('dashboard.settings.general.landing') }}">{{ __('Application links') }}</a>
    </li>
    <!--end:::Tab item-->
    <!--begin:::Tab item-->
    <li class="nav-item">
        <a class="nav-link text-active-primary pb-4  {{ getClassIfUrlContains('active', 'mobile-app') }}"
            href="{{ route('dashboard.settings.general.mobile_app') }}">{{ __('Application links') }}</a>
    </li>
    <!--end:::Tab item-->
    <!--begin:::Tab item-->
    <li class="nav-item">
        <a class="nav-link text-active-primary pb-4  {{ getClassIfUrlContains('active', 'tax') }}"
            href="{{ route('dashboard.settings.general.tax') }}">{{ __('Tax data') }}</a>
    </li>
    <!--end:::Tab item-->
</ul>
<!--end:::Tabs-->
