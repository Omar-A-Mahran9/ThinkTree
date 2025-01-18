@extends('dashboard.partials.master')
@section('content')
    @include('dashboard.partials.settings-nav')

    <!--begin::Form-->
    <form class="form d-flex flex-column flex-lg-row ajax-form" action="{{ route('dashboard.settings.general.contact') }}"
        method="post" data-success-callback="onAjaxSuccess" data-hide-alert="true">
        @csrf
        <!--begin::Main column-->
        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
            @include('dashboard.partials.main-settings-nav')
            <!--begin::Tab content-->
            <div class="tab-content">
                <!--begin::Tab pane-->
                <div class="tab-pane fade show active" id="settings_terms" role="tab-panel">
                    <div class="d-flex flex-column gap-7 gap-lg-10">
                        <!--begin::Inventory-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>{{ __('Contact data') }}</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Input group-->
                                <div class="mb-10 row">
                                    <div class="col-lg-4">
                                        <!--begin::Label-->
                                        <label class="form-label">{{ __('Contact number via whatsapp') }}</label>
                                        <!--end::Label-->
                                        <!--begin::Input group-->
                                        <div class="input-group mb-5">
                                            <span class="input-group-text">
                                                <i class="lab la-whatsapp fs-1"></i>
                                            </span>
                                            <input type="tel" class="form-control" name="whatsapp_number"
                                                value="{{ setting('whatsapp_number') }}" id="whatsapp_number_inp"
                                                placeholder="05xxxxxxxx" aria-describedby="basic-addon3" />
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback" id="whatsapp_number">
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="col-lg-4">
                                        <!--begin::Label-->
                                        <label class="form-label">{{ __('Contact number via sms') }}</label>
                                        <!--end::Label-->
                                        <!--begin::Input group-->
                                        <div class="input-group mb-5">
                                            <span class="input-group-text">
                                                <i class="fa-regular fa-message fs-3"></i>
                                            </span>
                                            <input type="tel" class="form-control" name="sms_number"
                                                value="{{ setting('sms_number') }}" id="sms_number_inp"
                                                placeholder="05xxxxxxxx" aria-describedby="basic-addon3" />
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback" id="sms_number"></div>
                                        <!--end::Description-->
                                    </div>

                                    <div class="col-lg-4">
                                        <!--begin::Label-->
                                        <label class="form-label">{{ __('Email Address') }}</label>
                                        <!--end::Label-->
                                        <!--begin::Input group-->
                                        <div class="input-group mb-5">
                                            <span class="input-group-text">
                                                <i class="la la-envelope fs-3"></i>
                                            </span>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ setting('email') }}" id="email_inp"
                                                placeholder="example@domain.com" aria-describedby="basic-addon3" />
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback" id="email"></div>
                                        <!--end::Description-->
                                    </div>

                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10 row">
                                    <!-- English Address -->
                                    <div class="col-lg-6">
                                        <!--begin::Label-->
                                        <label class="form-label">{{ __('English Address') }}</label>
                                        <!--end::Label-->
                                        <!--begin::Input group-->
                                        <div class="input-group mb-5">
                                            <span class="input-group-text">
                                                <i class="la la-map-marker fs-1"></i>
                                            </span>
                                            <input type="text" class="form-control" name="address_en"
                                                value="{{ setting('address_en') }}" id="address_en_inp"
                                                placeholder="{{ __('Enter your address in English') }}"
                                                aria-describedby="basic-addon3" />
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback" id="address_en">
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <!-- Arabic Address -->
                                    <div class="col-lg-6">
                                        <!--begin::Label-->
                                        <label class="form-label">{{ __('Arabic Address') }}</label>
                                        <!--end::Label-->
                                        <!--begin::Input group-->
                                        <div class="input-group mb-5">
                                            <span class="input-group-text">
                                                <i class="la la-map-marker fs-1"></i>
                                            </span>
                                            <input type="text" class="form-control" name="address_ar"
                                                value="{{ setting('address_ar') }}" id="address_ar_inp"
                                                placeholder="{{ __('Enter your address in Arabic') }}"
                                                aria-describedby="basic-addon3" />
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback" id="address_ar">
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                </div>
                                <!--end::Input group-->



                            </div>
                            <!--end::Card header-->
                        </div>
                        <!--end::Inventory-->
                    </div>
                </div>
                <!--end::Tab pane-->
            </div>
            <!--end::Tab content-->
            <div class="d-flex justify-content-end">
                <!--begin::Button-->
                <button type="submit" id="submit" class="btn btn-primary">
                    <span class="indicator-label"> {{ __('Save') }}</span>
                    <span class="indicator-progress"> {{ __('Please wait...') }}
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
                <!--end::Button-->
            </div>
        </div>
        <!--end::Main column-->
    </form>
    <!--end::Form-->
@endsection

@push('scripts')
    <script>
        window['onAjaxSuccess'] = () => {
            soundStatus = $("[name='sound_status']:checked").val();
            showToast();
        }
    </script>
@endpush
