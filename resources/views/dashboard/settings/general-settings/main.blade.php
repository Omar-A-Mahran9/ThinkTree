@extends('dashboard.partials.master')
@section('content')
    @include('dashboard.partials.settings-nav')

    <!--begin::Form-->
    <form id="crud_form" class="ajax-form d-flex flex-column flex-lg-row" action="{{ route('dashboard.settings.general.main') }} "method="post">
        @csrf
        <!--begin::Aside column-->
        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
            <!--begin::Logo settings-->
            <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2>{{ __('اللوجو') }}</h2>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body text-center pt-0">
                    <!--begin::Image input-->
                    <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
                        <!--begin::Preview existing avatar-->
                        <div class="image-input-wrapper w-150px h-150px" style="background-image: url({{ asset(getImagePathFromDirectory(setting('logo'), 'Settings')) }})"></div>
                        <!--end::Preview existing avatar-->
                        <!--begin::Label-->
                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="{{ __('تغير اللوجو') }}">
                            <i class="bi bi-pencil-fill fs-7"></i>
                            <!--begin::Inputs-->
                            <input type="file" name="logo" accept=".png, .jpg, .jpeg" />
                            <input type="hidden" name="avatar_remove" />
                            <!--end::Inputs-->
                        </label>
                        <!--end::Label-->
                        <!--begin::Cancel-->
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="{{ __('الغاء') }}">
                            <i class="bi bi-x fs-2"></i>
                        </span>
                        <!--end::Cancel-->
                        <!--begin::Remove-->
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="{{ __('حذف') }}">
                            <i class="bi bi-x fs-2"></i>
                        </span>
                        <!--end::Remove-->
                    </div>
                    <!--end::Image input-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">{{ __('صيغة الصورة يجب ان تكون من نوع *.jpg, *.jpeg, *.gif, *.svg') }}</div>
                    <!--end::Description-->
                    <div class="invalid-feedback" id="logo"></div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Logo settings-->
            <!--begin::Logo settings-->
            <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2>{{ __('الايقونة') }}</h2>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body text-center pt-0">
                    <!--begin::Image input-->
                    <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
                        <!--begin::Preview existing avatar-->
                        <div class="image-input-wrapper w-50px h-50px" style="background-image: url({{ asset(getImagePathFromDirectory(setting('fav_icon'), 'Settings')) }})"></div>
                        <!--end::Preview existing avatar-->
                        <!--begin::Label-->
                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="{{ __('تغير اللوجو') }}">
                            <i class="bi bi-pencil-fill fs-7"></i>
                            <!--begin::Inputs-->
                            <input type="file" name="fav_icon" accept=".png, .jpg, .jpeg" />
                            <input type="hidden" name="avatar_remove" />
                            <!--end::Inputs-->
                        </label>
                        <!--end::Label-->
                        <!--begin::Cancel-->
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="{{ __('الغاء') }}">
                            <i class="bi bi-x fs-2"></i>
                        </span>
                        <!--end::Cancel-->
                        <!--begin::Remove-->
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="{{ __('حذف') }}">
                            <i class="bi bi-x fs-2"></i>
                        </span>
                        <!--end::Remove-->
                    </div>
                    <!--end::Image input-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">{{ __('صيغة الصورة يجب ان تكون من نوع *.jpg, *.jpeg, *.gif, *.svg') }}</div>
                    <!--end::Description-->
                    <div class="invalid-feedback" id="fav_icon"></div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Logo settings-->
        </div>
        <!--end::Aside column-->
        <!--begin::Main column-->
        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
            @include('dashboard.partials.main-settings-nav')
            <!--begin::Tab content-->
            <div class="tab-content">
                <!--begin::Tab pane-->
                <div class="tab-pane fade show active" id="settings_main" role="tab-panel">
                    <div class="d-flex flex-column gap-7 gap-lg-10">
                        <!--begin::General options-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>{{ __('الإعدادات الرئيسية') }}</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Input group-->
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="required form-label">{{ __('إسم الموقع') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="website_name" value="{{ setting('website_name') }}" class="form-control mb-2" id="website_name_inp" placeholder="{{ __('إدخل اسم الموقع') }}" />
                                    <!--end::Input-->
                                    <!--begin::Description-->
                                    <div class="fv-plugins-message-container invalid-feedback" id="website_name"></div>
                                    <!--end::Description-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="form-label">{{ __('وصف للموقع') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Editor-->
                                    <textarea class="form-control" name="description" id="description_inp" rows="11" data-kt-autosize="true" placeholder="{{ __('أدخل وصف للموقع') }}">{{ setting('description') }}</textarea>
                                    <!--end::Editor-->
                                    <!--begin::Description-->
                                    <div class="fv-plugins-message-container invalid-feedback" id="description"></div>
                                    <!--end::Description-->
                                </div>
                      
                            </div>
                            <!--end::Card header-->
                        </div>
                        <!--end::General options-->
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

@endpush
