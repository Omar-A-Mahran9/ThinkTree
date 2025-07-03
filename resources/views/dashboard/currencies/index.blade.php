@extends('dashboard.partials.master')
@push('styles')
    <link href="{{ asset('assets/dashboard/css/datatables' . (isDarkMode() ? '.dark' : '') . '.bundle.css') }}"
        rel="stylesheet" type="text/css" />
    <link
        href="{{ asset('assets/dashboard/plugins/custom/datatables/datatables.bundle' . (isArabic() ? '.rtl' : '') . '.css') }}"
        rel="stylesheet" type="text/css" />
@endpush
@section('content')
    <div class="row g-6 g-xl-9 mb-10 ">
        <!--begin::Col-->
        <div class="col-md-6 col-xl-6 ">
            <!--begin::Card-->
            <div class="card border-hover-primary h-100">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-9">
                    <!--begin::Card Title-->
                    <div class="card-title m-0">
                        <!--begin::Avatar-->
                        <div class=" w-35px h-35px bg-light m-auto d-flex justify-content-center align-items-center">
                            <!-- SVG Icon -->
                        </div>
                        <h4 class="fw-bold me-auto px-4 py-3">{{ __('currencies') }}</h4>
                        <!--end::Avatar-->
                    </div>
                </div>
                <!--end:: Card header-->
                <div class="card-body p-9">
                    <div class="d-flex  justify-content-between flex-wrap ">
                        <div class=" rounded min-w-125px py-1 px-4 me-7">
                            <div class="fs-2 fw-bold">{{ __('currencies count') }}</div>
                            <div class="fs-4  ">{{ $count_currencies }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Col-->

        <div class="col-md-6 col-xl-6">
            <div class="card border-hover-primary h-100">
                <div class="card-header border-0 pt-9">
                    <div class="card-title m-0">
                        <div class=" w-35px h-35px bg-light m-auto d-flex justify-content-center align-items-center">
                            <!-- SVG Icon -->
                        </div>
                        <h4 class="fw-bold me-auto px-4 py-3">{{ __('currencies') }}</h4>
                    </div>
                </div>
                <div class="card-body p-9">
                    <div class="d-flex justify-content-center flex-wrap mb-5 mt-5">
                        <div class="d-flex justify-content-end w-100" id="add_btn" data-bs-toggle="modal"
                            data-bs-target="#crud_modal" data-kt-docs-table-toolbar="base">
                            <button type="button" class="btn btn-primary w-100">
                                <span class="svg-icon svg-icon-2">
                                    <!-- Plus icon -->
                                </span>
                                {{ __('Add currency') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--begin::Currency List-->
    <div class="card mb-5 mb-x-10">
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">{{ __('Currencies list') }}</h3>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex flex-stack flex-wrap mb-5">
                <div class="d-flex align-items-center position-relative my-1 mb-2 mb-md-0">
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <!-- Search icon -->
                    </span>
                    <input type="text" data-kt-docs-table-filter="search"
                        class="form-control form-control-solid w-250px ps-15"
                        placeholder="{{ __('Search for currencies') }}">
                </div>

                <div class="d-flex justify-content-end align-items-center d-none" data-kt-docs-table-toolbar="selected">
                    <div class="fw-bold me-5">
                        <span class="me-2" data-kt-docs-table-select="selected_count"></span>{{ __('Selected item') }}
                    </div>
                    <button type="button" class="btn btn-danger"
                        data-kt-docs-table-select="delete_selected">{{ __('delete') }}</button>
                </div>
            </div>

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
                        <th>{{ __('Image') }}</th>
                        <th>{{ __('Created at') }}</th>
                        <th class=" min-w-100px">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-semibold">
                </tbody>
            </table>
        </div>
    </div>
    <!--end::Currency List-->

    {{-- begin::Add Currency Modal --}}
    <form id="crud_form" class="ajax-form" action="{{ route('dashboard.currencies.store') }}" method="post"
        data-success-callback="onAjaxSuccess" data-error-callback="onAjaxError">
        @csrf
        <div class="modal fade" tabindex="-1" id="crud_modal">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="form_title">{{ __('Add new currency') }}</h5>
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="ki-outline ki-cross fs-1"></i>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="d-flex flex-column justify-content-center">
                            <label for="image_inp"
                                class="form-label required text-center fs-6 fw-bold mb-3">{{ __('Image') }}</label>
                            <x-dashboard.upload-image-inp name="image" :image="null" :directory="null"
                                placeholder="default.svg" type="editable"></x-dashboard.upload-image-inp>
                        </div>
                        <div class="fv-row mb-0 fv-plugins-icon-container">
                            <label for="name_ar_inp"
                                class="form-label required fs-6 fw-bold mb-3">{{ __('Name ar') }}</label>
                            <input type="text" name="name_ar" class="form-control form-control-lg form-control-solid"
                                id="name_ar_inp" placeholder="{{ __('Name ar') }}">
                            <div class="fv-plugins-message-container invalid-feedback" id="name_ar"></div>
                        </div>
                        <div class="fv-row mb-4 fv-plugins-icon-container">
                            <label for="name_en_inp"
                                class="form-label required fs-6 fw-bold mb-3">{{ __('Name en') }}</label>
                            <input type="text" name="name_en" class="form-control form-control-lg form-control-solid"
                                id="name_en_inp" placeholder="{{ __('Name en') }}">
                            <div class="fv-plugins-message-container invalid-feedback" id="name_en"></div>
                        </div>
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
    {{-- end::Add Currency Modal --}}
@endsection

@push('scripts')
    <script src="{{ asset('assets/dashboard/js/global/datatable-config.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/datatables/currencies.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/global/crud-operations.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#add_btn").click(function(e) {
                e.preventDefault();

                $("#form_title").text(__('Add new currency'));
                $("[name='_method']").remove();
                $("#crud_form").trigger('reset');
                $("#crud_form").attr('action', `/dashboard/currencies`);
            });
        });
    </script>
@endpush
