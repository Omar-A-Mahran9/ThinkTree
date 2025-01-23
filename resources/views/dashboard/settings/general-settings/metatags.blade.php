@extends('dashboard.partials.master')
@section('content')
    @include('dashboard.partials.settings-nav')

    <!--begin::Form-->
    <form class="form d-flex flex-column flex-lg-row ajax-form" action="{{ route('dashboard.settings.general.metatags') }}"
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
                                    <h2>{{ __('Meta tags settings') }}</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <div class="card-body pt-0">
                                <!-- First Row for Home Description -->
                                <div class="mb-10 row">
                                    <div class="col-6">
                                        <label class="form-label">{{ __('Description home In Arabic') }}</label>
                                        <textarea class="form-control" name="metatags[description_home_ar]" id="metatags_description_home_ar_inp"
                                            rows="11" data-kt-autosize="true" placeholder="{{ __('Description In Arabic') }}">{{ setting('metatags.description_home_ar') }}</textarea>
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="metatags_description_home_ar"></div>
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label">{{ __('Description home In English') }}</label>
                                        <textarea class="form-control" name="metatags[description_home_en]" id="metatags_description_home_en_inp"
                                            rows="11" data-kt-autosize="true" placeholder="{{ __('Description In English') }}">{{ setting('metatags.description_home_en') }}</textarea>
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="metatags_description_home_en"></div>
                                    </div>
                                </div>

                                <!-- Second Row for About Us Description -->
                                <div class="mb-10 row">
                                    <div class="col-6">
                                        <label class="form-label">{{ __('Description about us In Arabic') }}</label>
                                        <textarea class="form-control" name="metatags[description_about_us_ar]"
                                            id="metatags_description_about_us_ar_inp" rows="11" data-kt-autosize="true"
                                            placeholder="{{ __('Description In Arabic') }}">{{ setting('metatags.description_about_us_ar') }}</textarea>
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="metatags_description_about_us_ar"></div>
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label">{{ __('Description about us In English') }}</label>
                                        <textarea class="form-control" name="metatags[description_about_us_en]"
                                            id="metatags_description_about_us_en_inp" rows="11" data-kt-autosize="true"
                                            placeholder="{{ __('Description In English') }}">{{ setting('metatags.description_about_us_en') }}</textarea>
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="metatags_description_about_us_en"></div>
                                    </div>
                                </div>

                                <!-- Third Row for Package Description -->
                                <div class="mb-10 row">
                                    <div class="col-6">
                                        <label class="form-label">{{ __('Description package In Arabic') }}</label>
                                        <textarea class="form-control" name="metatags[description_package_ar]" id="metatags_description_package_ar_inp"
                                            rows="11" data-kt-autosize="true" placeholder="{{ __('Description In Arabic') }}">{{ setting('metatags.description_package_ar') }}</textarea>
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="metatags_description_package_ar"></div>
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label">{{ __('Description package In English') }}</label>
                                        <textarea class="form-control" name="metatags[description_package_en]"
                                            id="metatags_description_package_en_inp" rows="11" data-kt-autosize="true"
                                            placeholder="{{ __('Description In English') }}">{{ setting('metatags.description_package_en') }}</textarea>
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="metatags_description_package_en"></div>
                                    </div>
                                </div>
                            </div>

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
