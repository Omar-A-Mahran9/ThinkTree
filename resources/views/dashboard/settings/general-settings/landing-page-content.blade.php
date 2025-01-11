@extends('dashboard.partials.master')
@section('content')
    @include('dashboard.partials.settings-nav')

    <!--begin::Form-->
    <form id="" class="form d-flex flex-column flex-lg-row ajax-form"
        action="{{ route('dashboard.settings.general.landing') }}" method="post" data-success-callback="onAjaxSuccess"
        data-success-message="{{ __('تم حفظ الإعدادات بنجاح') }}" data-hide-alert="true">
        @csrf
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
                                        <label class="required form-label">{{ __('العنوان عربي') }} </label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip" data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/main_section_title.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="landing_page[main_section_title_ar]"
                                            value="{{ setting('landing_page.main_section_title_ar') }}"
                                            class="form-control mb-2" id="landing_page_main_section_title_ar_inp"
                                            placeholder="{{ __('إدخل العنوان عربي') }}" />
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_main_section_title_ar"></div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="required form-label">{{ __('العنوان انجليزي') }}</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip" data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/main_section_title.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="landing_page[main_section_title_en]"
                                            value="{{ setting('landing_page.main_section_title_en') }}"
                                            class="form-control mb-2" id="landing_page_main_section_title_en_inp"
                                            placeholder="{{ __('إدخل العنوان انجليزي') }}" />
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
                                        <label class="form-label">{{ __('الوصف عربي') }}</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip" data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/main_section_description.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Editor-->
                                        <textarea class="form-control" name="landing_page[main_section_description_ar]"
                                            id="landing_page_main_section_description_ar_inp" rows="11" data-kt-autosize="true"
                                            placeholder="{{ __('أدخل الوصف عربي') }}">{{ setting('landing_page.main_section_description_ar') }}</textarea>
                                        <!--end::Editor-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_main_section_description_ar"></div>
                                        <!--end::Description-->
                                    </div>

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label">{{ __('الوصف انجليزي') }}</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip" data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/main_section_description.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Editor-->
                                        <textarea class="form-control" name="landing_page[main_section_description_en]"
                                            id="landing_page_main_section_description_en_inp" rows="11" data-kt-autosize="true"
                                            placeholder="{{ __('أدخل الوصف انجليزي') }}">{{ setting('landing_page.main_section_description_en') }}</textarea>
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
                    <div class="d-flex flex-column gap-7 gap-lg-10">
                        <!--begin::General options-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>{{ __('من نحن') }}</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Input group-->
                                <div class="mb-10 row">
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="required form-label">{{ __('العنوان عربي') }}</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip" data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/how_we_are_title.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="landing_page[how_we_are_title_ar]"
                                            value="{{ setting('landing_page.how_we_are_title_ar') }}"
                                            class="form-control mb-2" id="landing_page_how_we_are_title_ar_inp"
                                            placeholder="{{ __('إدخل العنوان عربي') }}" />
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_how_we_are_title_ar"></div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="required form-label">{{ __('العنوان انجليزي') }}</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip"
                                            data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/how_we_are_title.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="landing_page[how_we_are_title_en]"
                                            value="{{ setting('landing_page.how_we_are_title_en') }}"
                                            class="form-control mb-2" id="landing_page_how_we_are_title_en_inp"
                                            placeholder="{{ __('إدخل العنوان انجليزي') }}" />
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_how_we_are_title_en"></div>
                                        <!--end::Description-->
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10 row">
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label">{{ __('الوصف عربي') }}</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip"
                                            data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/how_we_are_description.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>

                                        <!--end::Label-->
                                        <!--begin::Editor-->
                                        <textarea class="form-control" name="landing_page[how_we_are_description_ar]"
                                            id="landing_page_how_we_are_description_ar_inp" rows="11" data-kt-autosize="true"
                                            placeholder="{{ __('أدخل الوصف عربي') }}">{{ setting('landing_page.how_we_are_description_ar') }}</textarea>
                                        <!--end::Editor-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_how_we_are_description_ar"></div>
                                        <!--end::Description-->
                                    </div>

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label">{{ __('الوصف انجليزي') }}</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip"
                                            data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/how_we_are_description.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Editor-->
                                        <textarea class="form-control" name="landing_page[how_we_are_description_en]"
                                            id="landing_page_how_we_are_description_en_inp" rows="11" data-kt-autosize="true"
                                            placeholder="{{ __('أدخل الوصف انجليزي') }}">{{ setting('landing_page.how_we_are_description_en') }}</textarea>
                                        <!--end::Editor-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_how_we_are_description_en"></div>
                                        <!--end::Description-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Card header-->
                        </div>
                        <!--end::General options-->

                    </div>
                    <div class="d-flex flex-column gap-7 gap-lg-10">
                        <!--begin::General options-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>{{ __('لمازا تختارنا') }}</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Input group-->
                                <div class="mb-10 row">
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="required form-label">{{ __('العنوان عربي') }} 1</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip"
                                            data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/why_choose_us_title_1.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="landing_page[why_choose_us_title_1_ar]"
                                            value="{{ setting('landing_page.why_choose_us_title_1_ar') }}"
                                            class="form-control mb-2" id="landing_page_why_choose_us_title_1_ar_inp"
                                            placeholder="{{ __('إدخل العنوان عربي') }}" />
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_why_choose_us_title_1_ar"></div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="required form-label">{{ __('العنوان انجليزي') }} 1</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip"
                                            data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/why_choose_us_title_1.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="landing_page[why_choose_us_title_1_en]"
                                            value="{{ setting('landing_page.why_choose_us_title_1_en') }}"
                                            class="form-control mb-2" id="landing_page_why_choose_us_title_1_en_inp"
                                            placeholder="{{ __('إدخل العنوان انجليزي') }}" />
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_why_choose_us_title_1_en"></div>
                                        <!--end::Description-->
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10 row">
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label">{{ __('الوصف عربي') }} 1</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip"
                                            data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/why_choose_us_description_1.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Editor-->
                                        <textarea class="form-control" name="landing_page[why_choose_us_description_1_ar]"
                                            id="landing_page_why_choose_us_description_1_ar_inp" rows="11" data-kt-autosize="true"
                                            placeholder="{{ __('أدخل الوصف عربي') }}">{{ setting('landing_page.why_choose_us_description_1_ar') }}</textarea>
                                        <!--end::Editor-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_why_choose_us_description_1_ar"></div>
                                        <!--end::Description-->
                                    </div>

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label">{{ __('الوصف انجليزي') }} 1</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip"
                                            data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/why_choose_us_description_1.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Editor-->
                                        <textarea class="form-control" name="landing_page[why_choose_us_description_1_en]"
                                            id="landing_page_why_choose_us_description_1_en_inp" rows="11" data-kt-autosize="true"
                                            placeholder="{{ __('أدخل الوصف انجليزي') }}">{{ setting('landing_page.why_choose_us_description_1_en') }}</textarea>
                                        <!--end::Editor-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_why_choose_us_description_1_en"></div>
                                        <!--end::Description-->
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10 row">
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="required form-label">{{ __('العنوان عربي') }} 2</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip"
                                            data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/why_choose_us_title_2.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="landing_page[why_choose_us_title_2_ar]"
                                            value="{{ setting('landing_page.why_choose_us_title_2_ar') }}"
                                            class="form-control mb-2" id="landing_page_why_choose_us_title_2_ar_inp"
                                            placeholder="{{ __('إدخل العنوان عربي') }}" />
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_why_choose_us_title_2_ar"></div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="required form-label">{{ __('العنوان انجليزي') }} 2</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip"
                                            data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/why_choose_us_title_2.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="landing_page[why_choose_us_title_2_en]"
                                            value="{{ setting('landing_page.why_choose_us_title_2_en') }}"
                                            class="form-control mb-2" id="landing_page_why_choose_us_title_2_en_inp"
                                            placeholder="{{ __('إدخل العنوان انجليزي') }}" />
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_why_choose_us_title_2_en"></div>
                                        <!--end::Description-->
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10 row">
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label">{{ __('الوصف عربي') }} 2</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip"
                                            data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/why_choose_us_description_2.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Editor-->
                                        <textarea class="form-control" name="landing_page[why_choose_us_description_2_ar]"
                                            id="landing_page_why_choose_us_description_2_ar_inp" rows="11" data-kt-autosize="true"
                                            placeholder="{{ __('أدخل الوصف عربي') }}">{{ setting('landing_page.why_choose_us_description_2_ar') }}</textarea>
                                        <!--end::Editor-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_why_choose_us_description_2_ar"></div>
                                        <!--end::Description-->
                                    </div>

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label">{{ __('الوصف انجليزي') }} 2</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip"
                                            data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/why_choose_us_description_2.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Editor-->
                                        <textarea class="form-control" name="landing_page[why_choose_us_description_2_en]"
                                            id="landing_page_why_choose_us_description_2_en_inp" rows="11" data-kt-autosize="true"
                                            placeholder="{{ __('أدخل الوصف انجليزي') }}">{{ setting('landing_page.why_choose_us_description_2_en') }}</textarea>
                                        <!--end::Editor-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_why_choose_us_description_2_en"></div>
                                        <!--end::Description-->
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10 row">
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="required form-label">{{ __('العنوان عربي') }} 3</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip"
                                            data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/why_choose_us_title_3.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="landing_page[why_choose_us_title_3_ar]"
                                            value="{{ setting('landing_page.why_choose_us_title_3_ar') }}"
                                            class="form-control mb-2" id="landing_page_why_choose_us_title_3_ar_inp"
                                            placeholder="{{ __('إدخل العنوان عربي') }}" />
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_why_choose_us_title_3_ar"></div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="required form-label">{{ __('العنوان انجليزي') }} 3</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip"
                                            data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/why_choose_us_title_3.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="landing_page[why_choose_us_title_3_en]"
                                            value="{{ setting('landing_page.why_choose_us_title_3_en') }}"
                                            class="form-control mb-2" id="landing_page_why_choose_us_title_3_en_inp"
                                            placeholder="{{ __('إدخل العنوان انجليزي') }}" />
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_why_choose_us_title_3_en"></div>
                                        <!--end::Description-->
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10 row">
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label">{{ __('الوصف عربي') }} 3</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip"
                                            data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/why_choose_us_description_3.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Editor-->
                                        <textarea class="form-control" name="landing_page[why_choose_us_description_3_ar]"
                                            id="landing_page_why_choose_us_description_3_ar_inp" rows="11" data-kt-autosize="true"
                                            placeholder="{{ __('أدخل الوصف عربي') }}">{{ setting('landing_page.why_choose_us_description_3_ar') }}</textarea>
                                        <!--end::Editor-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_why_choose_us_description_3_ar"></div>
                                        <!--end::Description-->
                                    </div>

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label">{{ __('الوصف انجليزي') }} 3</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip"
                                            data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/why_choose_us_description_3.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Editor-->
                                        <textarea class="form-control" name="landing_page[why_choose_us_description_3_en]"
                                            id="landing_page_why_choose_us_description_3_en_inp" rows="11" data-kt-autosize="true"
                                            placeholder="{{ __('أدخل الوصف انجليزي') }}">{{ setting('landing_page.why_choose_us_description_3_en') }}</textarea>
                                        <!--end::Editor-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_why_choose_us_description_3_en"></div>
                                        <!--end::Description-->
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10 row">
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="required form-label">{{ __('العنوان عربي') }} 4</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip"
                                            data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/why_choose_us_title_4.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="landing_page[why_choose_us_title_4_ar]"
                                            value="{{ setting('landing_page.why_choose_us_title_4_ar') }}"
                                            class="form-control mb-2" id="landing_page_why_choose_us_title_4_ar_inp"
                                            placeholder="{{ __('إدخل العنوان عربي') }}" />
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_why_choose_us_title_4_ar"></div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="required form-label">{{ __('العنوان انجليزي') }} 4</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip"
                                            data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/why_choose_us_title_4.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="landing_page[why_choose_us_title_4_en]"
                                            value="{{ setting('landing_page.why_choose_us_title_4_en') }}"
                                            class="form-control mb-2" id="landing_page_why_choose_us_title_4_en_inp"
                                            placeholder="{{ __('إدخل العنوان انجليزي') }}" />
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_why_choose_us_title_4_en"></div>
                                        <!--end::Description-->
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10 row">
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label">{{ __('الوصف عربي') }} 4</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip"
                                            data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/why_choose_us_description_4.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Editor-->
                                        <textarea class="form-control" name="landing_page[why_choose_us_description_4_ar]"
                                            id="landing_page_why_choose_us_description_4_ar_inp" rows="11" data-kt-autosize="true"
                                            placeholder="{{ __('أدخل الوصف عربي') }}">{{ setting('landing_page.why_choose_us_description_4_ar') }}</textarea>
                                        <!--end::Editor-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_why_choose_us_description_4_ar"></div>
                                        <!--end::Description-->
                                    </div>

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label">{{ __('الوصف انجليزي') }} 4</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip"
                                            data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/why_choose_us_description_4.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Editor-->
                                        <textarea class="form-control" name="landing_page[why_choose_us_description_4_en]"
                                            id="landing_page_why_choose_us_description_4_en_inp" rows="11" data-kt-autosize="true"
                                            placeholder="{{ __('أدخل الوصف انجليزي') }}">{{ setting('landing_page.why_choose_us_description_4_en') }}</textarea>
                                        <!--end::Editor-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_why_choose_us_description_4_en"></div>
                                        <!--end::Description-->
                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Card header-->
                        </div>
                        <!--end::General options-->

                    </div>
                    <div class="d-flex flex-column gap-7 gap-lg-10">
                        <!--begin::General options-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>{{ __('مميزات التطبيق') }}</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Input group-->
                                <div class="mb-10 row">
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="required form-label">
                                            {{ __('العنوان عربي') }} 1
                                        </label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip"
                                            data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/app_features_title_odd.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="landing_page[app_features_title_1_ar]"
                                            value="{{ setting('landing_page.app_features_title_1_ar') }}"
                                            class="form-control mb-2" id="landing_page_app_features_title_1_ar_inp"
                                            placeholder="{{ __('إدخل العنوان عربي') }}" />
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_app_features_title_1_ar"></div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="required form-label">{{ __('العنوان انجليزي') }} 1</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip"
                                            data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/app_features_title_odd.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="landing_page[app_features_title_1_en]"
                                            value="{{ setting('landing_page.app_features_title_1_en') }}"
                                            class="form-control mb-2" id="landing_page_app_features_title_1_en_inp"
                                            placeholder="{{ __('إدخل العنوان انجليزي') }}" />
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_app_features_title_1_en"></div>
                                        <!--end::Description-->
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10 row">
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label">{{ __('الوصف عربي') }} 1</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip"
                                            data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/app_features_description_odd.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Editor-->
                                        <textarea class="form-control" name="landing_page[app_features_description_1_ar]"
                                            id="landing_page_app_features_description_1_ar_inp" rows="11" data-kt-autosize="true"
                                            placeholder="{{ __('أدخل الوصف عربي') }}">{{ setting('landing_page.app_features_description_1_ar') }}</textarea>
                                        <!--end::Editor-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_app_features_description_1_ar"></div>
                                        <!--end::Description-->
                                    </div>

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label">{{ __('الوصف انجليزي') }} 1</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip"
                                            data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/app_features_description_odd.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Editor-->
                                        <textarea class="form-control" name="landing_page[app_features_description_1_en]"
                                            id="landing_page_app_features_description_1_en_inp" rows="11" data-kt-autosize="true"
                                            placeholder="{{ __('أدخل الوصف انجليزي') }}">{{ setting('landing_page.app_features_description_1_en') }}</textarea>
                                        <!--end::Editor-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_app_features_description_1_en"></div>
                                        <!--end::Description-->
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10 row">
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="required form-label">{{ __('العنوان عربي') }} 2</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip"
                                            data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/app_features_title_even.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="landing_page[app_features_title_2_ar]"
                                            value="{{ setting('landing_page.app_features_title_2_ar') }}"
                                            class="form-control mb-2" id="landing_page_app_features_title_2_ar_inp"
                                            placeholder="{{ __('إدخل العنوان عربي') }}" />
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_app_features_title_2_ar"></div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="required form-label">{{ __('العنوان انجليزي') }} 2</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip"
                                            data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/app_features_title_even.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="landing_page[app_features_title_2_en]"
                                            value="{{ setting('landing_page.app_features_title_2_en') }}"
                                            class="form-control mb-2" id="landing_page_app_features_title_2_en_inp"
                                            placeholder="{{ __('إدخل العنوان انجليزي') }}" />
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_app_features_title_2_en"></div>
                                        <!--end::Description-->
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10 row">
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label">{{ __('الوصف عربي') }} 2</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip"
                                            data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/app_features_description_even.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Editor-->
                                        <textarea class="form-control" name="landing_page[app_features_description_2_ar]"
                                            id="landing_page_app_features_description_2_ar_inp" rows="11" data-kt-autosize="true"
                                            placeholder="{{ __('أدخل الوصف عربي') }}">{{ setting('landing_page.app_features_description_2_ar') }}</textarea>
                                        <!--end::Editor-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_app_features_description_2_ar"></div>
                                        <!--end::Description-->
                                    </div>

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label">{{ __('الوصف انجليزي') }} 2</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip"
                                            data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/app_features_description_even.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Editor-->
                                        <textarea class="form-control" name="landing_page[app_features_description_2_en]"
                                            id="landing_page_app_features_description_2_en_inp" rows="11" data-kt-autosize="true"
                                            placeholder="{{ __('أدخل الوصف انجليزي') }}">{{ setting('landing_page.app_features_description_2_en') }}</textarea>
                                        <!--end::Editor-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_app_features_description_2_en"></div>
                                        <!--end::Description-->
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10 row">
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="required form-label">{{ __('العنوان عربي') }} 3</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip"
                                            data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/app_features_title_odd.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="landing_page[app_features_title_3_ar]"
                                            value="{{ setting('landing_page.app_features_title_3_ar') }}"
                                            class="form-control mb-2" id="landing_page_app_features_title_3_ar_inp"
                                            placeholder="{{ __('إدخل العنوان عربي') }}" />
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_app_features_title_3_ar"></div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="required form-label">{{ __('العنوان انجليزي') }} 3</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip"
                                            data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/app_features_title_odd.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="landing_page[app_features_title_3_en]"
                                            value="{{ setting('landing_page.app_features_title_3_en') }}"
                                            class="form-control mb-2" id="landing_page_app_features_title_3_en_inp"
                                            placeholder="{{ __('إدخل العنوان انجليزي') }}" />
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_app_features_title_3_en"></div>
                                        <!--end::Description-->
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10 row">
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label">{{ __('الوصف عربي') }} 3</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip"
                                            data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/app_features_description_odd.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Editor-->
                                        <textarea class="form-control" name="landing_page[app_features_description_3_ar]"
                                            id="landing_page_app_features_description_3_ar_inp" rows="11" data-kt-autosize="true"
                                            placeholder="{{ __('أدخل الوصف عربي') }}">{{ setting('landing_page.app_features_description_3_ar') }}</textarea>
                                        <!--end::Editor-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_app_features_description_3_ar"></div>
                                        <!--end::Description-->
                                    </div>

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label">{{ __('الوصف انجليزي') }} 3</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip"
                                            data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/app_features_description_odd.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Editor-->
                                        <textarea class="form-control" name="landing_page[app_features_description_3_en]"
                                            id="landing_page_app_features_description_3_en_inp" rows="11" data-kt-autosize="true"
                                            placeholder="{{ __('أدخل الوصف انجليزي') }}">{{ setting('landing_page.app_features_description_3_en') }}</textarea>
                                        <!--end::Editor-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_app_features_description_3_en"></div>
                                        <!--end::Description-->
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10 row">
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="required form-label">{{ __('العنوان عربي') }} 4</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip"
                                            data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/app_features_title_even.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="landing_page[app_features_title_4_ar]"
                                            value="{{ setting('landing_page.app_features_title_4_ar') }}"
                                            class="form-control mb-2" id="landing_page_app_features_title_4_ar_inp"
                                            placeholder="{{ __('إدخل العنوان عربي') }}" />
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_app_features_title_4_ar"></div>
                                        <!--end::Description-->
                                    </div>
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="required form-label">{{ __('العنوان انجليزي') }} 4</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip"
                                            data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/app_features_title_even.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="landing_page[app_features_title_4_en]"
                                            value="{{ setting('landing_page.app_features_title_4_en') }}"
                                            class="form-control mb-2" id="landing_page_app_features_title_4_en_inp"
                                            placeholder="{{ __('إدخل العنوان انجليزي') }}" />
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_app_features_title_4_en"></div>
                                        <!--end::Description-->
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10 row">
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label">{{ __('الوصف عربي') }} 4</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip"
                                            data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/app_features_description_even.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Editor-->
                                        <textarea class="form-control" name="landing_page[app_features_description_4_ar]"
                                            id="landing_page_app_features_description_4_ar_inp" rows="11" data-kt-autosize="true"
                                            placeholder="{{ __('أدخل الوصف عربي') }}">{{ setting('landing_page.app_features_description_4_ar') }}</textarea>
                                        <!--end::Editor-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_app_features_description_4_ar"></div>
                                        <!--end::Description-->
                                    </div>

                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="form-label">{{ __('الوصف انجليزي') }} 4</label>
                                        <button type="button" class="btn " data-bs-toggle="tooltip"
                                            data-bs-html="true"
                                            data-bs-title='<img width=600 src="{{ asset('/assets/dashboard/landing-page-sections/app_features_description_even.png') }}" alt="" srcset="">'>
                                            <i class="far fa-question-circle text-primary"></i>
                                        </button>
                                        <!--end::Label-->
                                        <!--begin::Editor-->
                                        <textarea class="form-control" name="landing_page[app_features_description_4_en]"
                                            id="landing_page_app_features_description_4_en_inp" rows="11" data-kt-autosize="true"
                                            placeholder="{{ __('أدخل الوصف انجليزي') }}">{{ setting('landing_page.app_features_description_4_en') }}</textarea>
                                        <!--end::Editor-->
                                        <!--begin::Description-->
                                        <div class="fv-plugins-message-container invalid-feedback"
                                            id="landing_page_app_features_description_4_en"></div>
                                        <!--end::Description-->
                                    </div>
                                </div>
                                <!--end::Input group-->
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
