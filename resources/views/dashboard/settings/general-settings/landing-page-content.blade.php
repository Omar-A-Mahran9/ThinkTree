@extends('dashboard.partials.master')
@section('content')
    @include('dashboard.partials.settings-nav')

    <!--begin::Form-->
    <form id="" class="form d-flex flex-column flex-lg-row ajax-form"
        action="{{ route('dashboard.settings.general.landing') }}" method="post" data-success-callback="onAjaxSuccess"
        data-success-message="{{ __('تم حفظ الإعدادات بنجاح') }}" data-hide-alert="true">
        @csrf

        <!--begin::Aside column-->
        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
            <!--begin::Logo settings-->
            <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2>{{ __('Image hero section') }}</h2>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body text-center pt-0">
                    <!--begin::Image input-->
                    <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                        data-kt-image-input="true">
                        <!--begin::Preview existing avatar-->
                        <div class="image-input-wrapper w-150px h-150px"
                            style="background-image: url({{ asset(getImagePathFromDirectory(setting('herosection_image'), 'Settings')) }})">
                        </div>
                        <!--end::Preview existing avatar-->
                        <!--begin::Label-->
                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="change" data-bs-toggle="tooltip" title="{{ __('تغير الشهادة') }}">
                            <i class="bi bi-pencil-fill fs-7"></i>
                            <!--begin::Inputs-->
                            <input type="file" name="herosection_image" accept=".png, .jpg, .jpeg" />
                            <input type="hidden" name="avatar_remove" />
                            <!--end::Inputs-->
                        </label>
                        <!--end::Label-->
                        <!--begin::Cancel-->
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="{{ __('الغاء') }}">
                            <i class="bi bi-x fs-2"></i>
                        </span>
                        <!--end::Cancel-->
                        <!--begin::Remove-->
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="{{ __('حذف') }}">
                            <i class="bi bi-x fs-2"></i>
                        </span>
                        <!--end::Remove-->
                    </div>
                    <!--end::Image input-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">{{ __('صيغة الصورة يجب ان تكون من نوع *.jpg, *.jpeg, *.gif, *.svg') }}
                    </div>
                    <!--end::Description-->
                    <div class="invalid-feedback" id="herosection_image"></div>
                </div>
                <!--end::Card body-->


            </div>
            <!--end::Logo settings-->

            <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2>{{ __('Certificate Image') }}</h2>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body text-center pt-0">
                    <!--begin::Image input-->
                    <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                        data-kt-image-input="true">
                        <!--begin::Preview existing avatar-->
                        <div class="image-input-wrapper w-150px h-150px"
                            style="background-image: url({{ asset(getImagePathFromDirectory(setting('certificate_image'), 'Settings')) }})">
                        </div>
                        <!--end::Preview existing avatar-->
                        <!--begin::Label-->
                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="change" data-bs-toggle="tooltip" title="{{ __('تغير الشهادة') }}">
                            <i class="bi bi-pencil-fill fs-7"></i>
                            <!--begin::Inputs-->
                            <input type="file" name="certificate_image" accept=".png, .jpg, .jpeg" />
                            <input type="hidden" name="avatar_remove" />
                            <!--end::Inputs-->
                        </label>
                        <!--end::Label-->
                        <!--begin::Cancel-->
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="{{ __('الغاء') }}">
                            <i class="bi bi-x fs-2"></i>
                        </span>
                        <!--end::Cancel-->
                        <!--begin::Remove-->
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                            data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="{{ __('حذف') }}">
                            <i class="bi bi-x fs-2"></i>
                        </span>
                        <!--end::Remove-->
                    </div>
                    <!--end::Image input-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">{{ __('صيغة الصورة يجب ان تكون من نوع *.jpg, *.jpeg, *.gif, *.svg') }}
                    </div>
                    <!--end::Description-->
                    <div class="invalid-feedback" id="herosection_image"></div>
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
                <div class="tab-pane fade show active" id="settings_landing_page" role="tab-panel">
                    <div class="d-flex flex-column gap-7 gap-lg-10">
                        <!--begin::General options-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>{{ __('القسم الرئيسي') }}</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Input group-->
                                <div class="mb-10 row">
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="required form-label">{{ __('Title in Arabic') }} </label>

                                        <!--begin::Input-->
                                        <input type="text" name="landing_page[main_section_title_ar]"
                                            value="{{ setting('landing_page.main_section_title_ar') }}"
                                            class="form-control mb-2" id="landing_page_main_section_title_ar_inp"
                                            placeholder="{{ __('Title in Arabic') }}" />
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_main_section_title_ar"></div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="required form-label">{{ __('Title in English') }}</label>
                                        <!--begin::Input-->
                                        <input type="text" name="landing_page[main_section_title_en]"
                                            value="{{ setting('landing_page.main_section_title_en') }}"
                                            class="form-control mb-2" id="landing_page_main_section_title_en_inp"
                                            placeholder="{{ __('Title in English') }}" />
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_main_section_title_en"></div>
                                        <!--end::Description-->
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10 row">
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label">{{ __('Description In Arabic') }}</label>

                                        <!--begin::Editor-->
                                        <textarea class="form-control" name="landing_page[main_section_description_ar]"
                                            id="landing_page_main_section_description_ar_inp" rows="11" data-kt-autosize="true"
                                            placeholder="{{ __('Description In Arabic') }}">{{ setting('landing_page.main_section_description_ar') }}</textarea>
                                        <!--end::Editor-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_main_section_description_ar"></div>
                                        <!--end::Description-->
                                    </div>

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label">{{ __('Description In English') }}</label>

                                        <!--begin::Editor-->
                                        <textarea class="form-control" name="landing_page[main_section_description_en]"
                                            id="landing_page_main_section_description_en_inp" rows="11" data-kt-autosize="true"
                                            placeholder="{{ __('Description In English') }}">{{ setting('landing_page.main_section_description_en') }}</textarea>
                                        <!--end::Editor-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_main_section_description_en"></div>
                                        <!--end::Description-->
                                    </div>
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
    <script>
        window['onAjaxSuccess'] = (response) => {
            soundStatus = $("[name='sound_status']:checked").val();
        }
    </script>
@endpush
