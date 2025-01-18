@extends('dashboard.partials.master')

@section('content')
    @include('dashboard.partials.settings-nav')

    <!--begin::Form-->
    <form class="form d-flex flex-column flex-lg-row ajax-form" action="{{ route('dashboard.settings.general.mobile_app') }}"
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
                                    <h2>{{ __('Application links') }}</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Input group-->
                                <div class="mb-10 row">
                                    <div class="col-lg-4">
                                        <!--begin::Label-->
                                        <label class="form-label">{{ __('Instagram link') }}</label>
                                        <!--end::Label-->
                                        <!--begin::Input group-->
                                        <div class="input-group mb-5">
                                            <span class="input-group-text">
                                                <i class="lab la-instagram fs-1"></i>
                                            </span>
                                            <input type="text" class="form-control" name="instagram_link"
                                                value="{{ setting('instagram_link') }}" id="instagram_link_inp"
                                                placeholder="www.example.com" aria-describedby="basic-addon3" />
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback" id="instagram_link">
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="col-lg-4">
                                        <!--begin::Label-->
                                        <label class="form-label">{{ __('Facebook link') }}</label>
                                        <!--end::Label-->
                                        <!--begin::Input group-->
                                        <div class="input-group mb-5">
                                            <span class="input-group-text">
                                                <i class="lab la-facebook fs-1"></i>
                                            </span>
                                            <input type="text" class="form-control" name="facebook_link"
                                                value="{{ setting('facebook_link') }}" id="facebook_link_inp"
                                                placeholder="www.example.com" aria-describedby="basic-addon3" />
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback" id="facebook_link"></div>
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
                    <span class="indicator-label"> {{ __('حفظ البيانات') }}</span>
                    <span class="indicator-progress"> {{ __('يرجى الانتظار...') }}
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
