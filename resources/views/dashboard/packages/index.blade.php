@extends('dashboard.partials.master')
@push('styles')
    <link href="{{ asset('assets/dashboard/css/datatables' . (isDarkMode() ? '.dark' : '') . '.bundle.css') }}"
        rel="stylesheet" type="text/css" />
    <link
        href="{{ asset('assets/dashboard/plugins/custom/datatables/datatables.bundle' . (isArabic() ? '.rtl' : '') . '.css') }}"
        rel="stylesheet" type="text/css" />
@endpush
@section('content')
    <!--begin::Basic info-->
    <div class="card mb-5 mb-x-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">{{ __('Packages list') }}</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Content-->
        <div class="card-body">
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack flex-wrap mb-5">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1 mb-2 mb-md-0">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                            <path
                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                fill="currentColor"></path>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" data-kt-docs-table-filter="search"
                        class="form-control form-control-solid w-250px ps-15" placeholder="{{ __('Search for packages') }}">
                </div>
                <!--end::Search-->
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" id="add_btn" data-bs-toggle="modal" data-bs-target="#crud_modal"
                    data-kt-docs-table-toolbar="base">
                    <!--begin::Add customer-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="tooltip"
                        data-bs-original-title="Coming Soon" data-kt-initialized="1">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                    transform="rotate(-90 11.364 20.364)" fill="currentColor"></rect>
                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                    fill="currentColor"></rect>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->{{ __('Add new package') }}</button>
                    <!--end::Add customer-->
                </div>
                <!--end::Toolbar-->
                <!--begin::Group actions-->
                <div class="d-flex justify-content-end align-items-center d-none" data-kt-docs-table-toolbar="selected">
                    <div class="fw-bold me-5">
                        <span class="me-2" data-kt-docs-table-select="selected_count"></span>{{ __('Selected item') }}
                    </div>
                    <button type="button" class="btn btn-danger"
                        data-kt-docs-table-select="delete_selected">{{ __('delete') }}</button>
                </div>
                <!--end::Group actions-->
            </div>
            <!--end::Wrapper-->

            <!--begin::Datatable-->
            <table id="kt_datatable" class="table align-middle text-center table-row-dashed fs-6 gy-5">
                <thead>
                    <tr class=" text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true"
                                    data-kt-check-target="#kt_datatable .form-check-input" value="1" />
                            </div>
                        </th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Price') }}</th>

                        <th>{{ __('Available') }}</th>
                        <th>{{ __('Featured') }}</th>

                        <th>{{ __('Created at') }}</th>
                        <th class=" min-w-100px">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-semibold">
                </tbody>
            </table>
            <!--end::Datatable-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Basic info-->


    <form id="crud_form" class="ajax-form" action="{{ route('dashboard.packages.store') }}" method="post"
        data-success-callback="onAjaxSuccess" data-error-callback="onAjaxError">
        @csrf
        <div class="modal fade" tabindex="-1" id="crud_modal">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="form_title">{{ __('Add new package') }}</h5>
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="ki-outline ki-cross fs-1"></i>
                        </div>
                        <!--end::Close-->
                    </div>

                    <div class="modal-body">
                        <div class="d-flex flex-row justify-content-center align-items-center px-10 mb-5">
                            <!-- Image Upload Field -->
                            <div class="text-center">
                                <label for="image_upload"
                                    class="form-label required fs-6 fw-bold mb-2">{{ __('Image') }}</label>
                                <x-dashboard.upload-image-inp id="image_upload" name="image" :image="null"
                                    :directory="null" placeholder="default_image.svg" type="editable">
                                </x-dashboard.upload-image-inp>
                            </div>
                        </div>




                        <!-- begin :: Row -->
                        <div class="row mb-10">
                            <!-- begin :: Column -->
                            <div class="col-md-6 fv-row">

                                <label for="name_ar_inp"
                                    class="form-label required fs-6 fw-bold mb-3">{{ __('Name ar') }}</label>
                                <input type="text" name="name_ar"
                                    class="form-control form-control-lg form-control-solid" id="name_ar_inp"
                                    placeholder="{{ __('Name ar') }}">
                                <div class="fv-plugins-message-container invalid-feedback" id="name_ar"></div>

                            </div>
                            <!-- end   :: Column -->

                            <!-- begin :: Column -->
                            <div class="col-md-6 fv-row">
                                <label for="name_en_inp"
                                    class="form-label required fs-6 fw-bold mb-3">{{ __('Name en') }}</label>
                                <input type="text" name="name_en"
                                    class="form-control form-control-lg form-control-solid" id="name_en_inp"
                                    placeholder="{{ __('Name en') }}">
                                <div class="fv-plugins-message-container invalid-feedback" id="name_en"></div>
                            </div>
                            <!-- end   :: Column -->
                        </div>



                        <div class="row mb-10">

                            <!-- Description AR -->
                            <div class="col-md-6 fv-row">
                                <label for="description_ar_inp"
                                    class="form-label required fs-6 fw-bold mb-3">{{ __('Description ar') }}</label>
                                <textarea name="description_ar" class="form-control form-control-lg form-control-solid" id="description_ar_inp"
                                    placeholder="{{ __('Description ar') }}" rows="4"></textarea>
                                <div class="fv-plugins-message-container invalid-feedback" id="description_ar"></div>
                            </div>

                            <!-- Description EN -->
                            <div class="col-md-6 fv-row">
                                <label for="description_en_inp"
                                    class="form-label required fs-6 fw-bold mb-3">{{ __('Description en') }}</label>
                                <textarea name="description_en" class="form-control form-control-lg form-control-solid" id="description_en_inp"
                                    placeholder="{{ __('Description en') }}" rows="4"></textarea>
                                <div class="fv-plugins-message-container invalid-feedback" id="description_en"></div>
                            </div>
                        </div>
                        <div class="fv-row mb-0 fv-plugins-icon-container">
                            <!--end::Label-->
                            <label class="required fs-5 fw-semibold mb-2">{{ __('Features') }}</label>
                            <!--end::Label-->

                            <select class="form-select" data-control="select2" id="features_inp" name="features[]"
                                multiple="multiple" data-placeholder="{{ __('Choose features') }}"
                                data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                                <option value="" disabled></option>
                                @foreach ($features as $feature)
                                    <option value="{{ $feature->id }}">{{ $feature->name }}</option>
                                @endforeach
                            </select>
                            <div class="fv-plugins-message-container invalid-feedback" id="features"></div>
                        </div>

                        <!--end::Col-->

                        <div class="fv-row mb-10 fv-plugins-icon-container">
                            <!--end::Label-->
                            <label class="required fs-5 fw-semibold mb-2">{{ __('Outcomes') }}</label>
                            <!--end::Label-->

                            <select class="form-select" data-control="select2" id="outcomes_inp" name="outcomes[]"
                                multiple="multiple" data-placeholder="{{ __('Choose outcomes') }}"
                                data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                                <option value="" disabled></option>
                                @foreach ($outcomes as $outcome)
                                    <option value="{{ $outcome->id }}">{{ $outcome->name }}</option>
                                @endforeach
                            </select>
                            <div class="fv-plugins-message-container invalid-feedback" id="outcomes"></div>
                        </div>

                        <!-- begin :: Row -->
                        <div class="row mb-10">
                            <!-- begin :: Column -->
                            <div class="col-md-6 fv-row">

                                <label class="fs-5 fw-bold mb-2">{{ __('Price') }}</label>
                                <div class="form-floating">
                                    <input type="number" min="1" class="form-control" id="price_inp"
                                        name="price" placeholder="example" />
                                    <label for="price_inp">{{ __('Enter the price') }}</label>
                                </div>
                                <p class="invalid-feedback" id="price"></p>


                            </div>
                            <!-- end   :: Column -->

                            <!-- begin :: Column -->
                            <div class="col-md-6 fv-row">

                                <div class="form-check form-switch form-check-custom form-check-solid mb-2">
                                    <label class="fs-5 fw-bold">{{ __('Discount price') }}</label>

                                    <!-- Hidden input to send default value when unchecked -->
                                    <input type="hidden" name="have_discount" value="0">

                                    <!-- Checkbox input -->
                                    <input class="form-check-input mx-2" style="height: 18px; width: 36px;"
                                        type="checkbox" name="have_discount" id="discount-price-switch"
                                        value="1" />
                                    <label class="form-check-label" for="discount-price-switch"></label>
                                </div>


                                <div class="form-floating">
                                    <input type="number" min="1" class="form-control" id="discount_price_inp"
                                        name="discount_price" disabled placeholder="example" />
                                    <label for="discount_price_inp">{{ __('Enter the discount price') }}</label>
                                </div>
                                <p class="invalid-feedback" id="discount_price"></p>


                            </div>
                            <!-- end   :: Column -->
                        </div>

                        <div class="row mb-10">
                            <!-- begin :: Column -->
                            <div class="col-md-6 fv-row">

                                <label class="fs-5 fw-bold mb-2">{{ __('Price per session') }}</label>
                                <div class="form-floating">
                                    <input type="number" min="1" class="form-control" id="price_per_session_inp"
                                        name="price_per_session" placeholder="example" />
                                    <label for="price_per_session_inp">{{ __('Enter the price') }}</label>
                                </div>
                                <p class="invalid-feedback" id="price_per_session"></p>


                            </div>
                            <!-- end   :: Column -->

                            <!-- begin :: Column -->
                            <div class="col-md-6 fv-row">
                                <label class="fs-5 fw-bold mb-2">{{ __('Duration ("Monthly")') }}</label>
                                <div class="form-floating">
                                    <input type="number" min="1" class="form-control" id="duration_monthly_inp"
                                        name="duration_monthly" placeholder="example" />
                                    <label for="duration_monthly_inp">{{ __('Enter the Duration') }}</label>
                                </div>
                                <p class="invalid-feedback" id="duration_monthly"></p>

                            </div>

                        </div>
                        <!-- end   :: Column -->
                        <div class="row mb-10">

                            <!-- begin :: Column -->
                            <div class="col-md-6 fv-row">
                                <label class="fs-5 fw-bold mb-2">{{ __('number of session per week') }}</label>
                                <div class="form-floating">
                                    <input type="number" min="1" class="form-control"
                                        id="number_of_session_per_week_inp" name="number_of_session_per_week"
                                        placeholder="example" />
                                    <label
                                        for="number_of_session_per_week_inp">{{ __('Enter the number of session per week') }}</label>
                                </div>
                                <p class="invalid-feedback" id="number_of_session_per_week"></p>

                            </div>
                            <!-- end   :: Column -->

                            <!-- begin :: Column -->
                            <div class="col-md-6 fv-row">
                                <label class="fs-5 fw-bold mb-2">{{ __('number of levels') }}</label>
                                <div class="form-floating">
                                    <input type="number" min="1" class="form-control" id="number_of_levels_inp"
                                        name="number_of_levels" placeholder="example" />
                                    <label for="number_of_levels_inp">{{ __('Enter the number of levels') }}</label>
                                </div>
                                <p class="invalid-feedback" id="number_of_levels"></p>

                            </div>
                            <!-- end   :: Column -->
                        </div>

                        <!-- end   :: Column -->
                        <div class="row mb-10">

                            <!-- begin :: Column -->
                            <div class="col-md-6 fv-row">
                                <label class="fs-5 fw-bold mb-2">{{ __('number of sessions') }}</label>
                                <div class="form-floating">
                                    <input type="number" min="1" class="form-control"
                                        id="number_of_sessions_inp" name="number_of_sessions" placeholder="example" />
                                    <label for="number_of_sessions_inp">{{ __('Enter the number of session') }}</label>
                                </div>
                                <p class="invalid-feedback" id="number_of_sessions"></p>

                            </div>
                            <!-- end   :: Column -->

                            <!-- begin :: Column -->
                            <div class="col-md-6 fv-row">
                                <div class="row mb-10 mt-10 align-items-center">
                                    <!-- begin :: Column for Available -->
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-5 fw-bold">{{ __('Available') }}</label>
                                        <input type="hidden" name="available" value="0">
                                        <div class="form-check form-switch form-check-custom form-check-solid mb-2">
                                            <input class="form-check-input mx-2" style="height: 18px; width: 36px;"
                                                type="checkbox" name="available" id="available-switch" value="1" />
                                            <label class="form-check-label" for="available-switch"></label>
                                        </div>
                                        <p class="invalid-feedback" id="available"></p>

                                    </div>
                                    <!-- end :: Column -->

                                    <!-- begin :: Column for Featured -->
                                    <div class="col-md-6 fv-row">
                                        <label class="fs-5 fw-bold">{{ __('Featured') }}</label>
                                        <input type="hidden" name="featured" value="0">
                                        <div class="form-check form-switch form-check-custom form-check-solid mb-2">
                                            <input class="form-check-input mx-2" style="height: 18px; width: 36px;"
                                                type="checkbox" name="featured" id="featured-switch" value="1" />
                                            <label class="form-check-label" for="featured-switch"></label>
                                        </div>
                                        <p class="invalid-feedback" id="featured"></p>

                                    </div>
                                    <!-- end :: Column -->
                                </div>
                            </div>
                            <!-- end   :: Column -->
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-light"
                                data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">
                                    {{ __('Save') }}
                                </span>
                                <span class="indicator-progress">
                                    {{ __('Please wait....') }} <span
                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
    </form>
    <div class="row attachments">
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/dashboard/js/global/datatable-config.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/datatables/packages.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/global/crud-operations.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/forms/packages/create.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#add_btn").click(function(e) {
                e.preventDefault();

                $("#form_title").text(__('Add new package'));
                $("[name='_method']").remove();
                $("#crud_form").trigger('reset');
                $("#crud_form").attr('action', `/dashboard/packages`);
                $('.image-input-wrapper').css('background-image', `url('/placeholder_images/default.svg')`);
            });


        });
    </script>
@endpush
