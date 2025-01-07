@extends('dashboard.partials.master')
@section('content')
    @include('dashboard.partials.settings-nav')

    <!--begin::Form-->
    <form class="form d-flex flex-column flex-lg-row ajax-form" action="{{ route('dashboard.settings.home-content') }}"
        method="post" data-success-callback="onAjaxSuccess" data-hide-alert="true">
        @csrf
        <!--begin::Main column-->
        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
            @include('dashboard.partials.settings-payment-nav')
            <!--begin::Tab content-->
            <div class="tab-content">
                <!--begin::Tab pane-->
                <div class="tab-pane fade show active" id="settings_about_us" role="tab-panel">
                    <div class="d-flex flex-column gap-7 gap-lg-10">
                        <!--begin::Inventory-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>{{ __('Payment ways') }}</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0 ">
                                <div class="row g-4 justify-content-center">
                                    @foreach ($payment as $pay)
                                        <div class="col-lg-3 col-md-3 text-center">
                                            <!-- Card for each payment -->
                                            <div class="card card-flush w-100">
                                                <!-- Card Header with Delete and Update Icons -->
                                                <div class="mt-3 ms-3 d-flex justify-content-between align-items-center">
                                                    <!-- Update Icon (You can link to a separate update page or trigger an update modal) -->
                                                    {{-- <a href="{{ route('payment.update', ['id' => $pay->id]) }}"
                                                                                          class="text-primary">
                                                                                          <i class="fas fa-edit"></i> <!-- Font Awesome Edit Icon -->
                                                                                      </a> --}}

                                                    <!-- Delete Icon (Add your delete logic here, e.g., a modal or confirmation) -->
                                                    <a href="javascript:void(0);" class="text-danger"
                                                        onclick="deletePayment({{ $pay->id }})">
                                                        <i class="fas fa-trash-alt"></i>
                                                        <!-- Font Awesome Trash Icon -->
                                                    </a>
                                                </div>
                                                <div class="card-body ">


                                                    <div class="row align-items-center justify-content-center gap-3">
                                                        <!-- Image as icon inside name (2 columns) -->
                                                        <div class="col-3">
                                                            <img src="{{ $pay->full_image_path }}" alt="Payment Image"
                                                                class="img-fluid rounded-circle"
                                                                style="width: 30px; height: 30px; object-fit: cover;">
                                                        </div>

                                                        <!-- Name (10 columns) -->
                                                        <div class="col-7">
                                                            <div class="payment-name"
                                                                style="font-weight: bold; color: #000;">
                                                                {{ $pay->name_ar }}
                                                                <!-- Adjust according to language, e.g., $pay->name_en -->
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Dotted Line -->
                                                    <div class="dotted-line"
                                                        style="border-top: 1px dotted rgb(0, 0, 0); margin: 5px 0;"></div>

                                                    <!-- Description -->
                                                    <div class="payment-description" style="color:#125D12;">
                                                        {{ $pay->description_ar }}
                                                        <!-- Adjust according to language, e.g., $pay->description_en -->
                                                    </div>
                                                </div>

                                                <!-- Toggle Switch -->
                                                <div class="d-flex justify-content-center align-items-center mb-5">
                                                    <label
                                                        class="form-check form-switch form-check-custom form-check-solid">
                                                        <input class="form-check-input payment-status-toggle"
                                                            data-id="{{ $pay->id }}" type="checkbox" value="active"
                                                            {{ $pay->statue == 'active' ? 'checked' : '' }}>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>



                                <div class="d-flex justify-content-center flex-wrap mb-5 mt-10">

                                    <!--begin::Toolbar-->
                                    <div class="d-flex justify-content-end w-50" id="add_btn" data-bs-toggle="modal"
                                        data-bs-target="#crud_modal" data-kt-docs-table-toolbar="base">
                                        <!--begin::Add customer-->
                                        <button type="button" class="btn btn-primary w-100" data-bs-toggle="tooltip"
                                            data-bs-original-title="Coming Soon" data-kt-initialized="1">
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                            <span class="svg-icon svg-icon-2">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2"
                                                        rx="1" transform="rotate(-90 11.364 20.364)"
                                                        fill="currentColor">
                                                    </rect>
                                                    <rect x="4.36396" y="11.364" width="16" height="2"
                                                        rx="1" fill="currentColor"></rect>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->{{ __('Add Payment ways') }}
                                        </button>
                                        <!--end::Add customer-->
                                    </div>
                                    <!--end::Toolbar-->
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Card header-->
                        </div>
                        <!--end::Inventory-->
                    </div>
                </div>
                <!--end::Tab pane-->
            </div>
            {{-- <!--end::Tab content-->
            <div class="d-flex justify-content-end">
                <!--begin::Button-->
                <button type="submit" id="submit" class="btn btn-primary">
                    <span class="indicator-label"> {{ __('حفظ البيانات') }}</span>
                    <span class="indicator-progress"> {{ __('يرجى الانتظار...') }}
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
                <!--end::Button-->
            </div> --}}
        </div>
        <!--end::Main column-->
    </form>

    {{-- begin::Add Country Modal --}}
    <form id="crud_form" class="ajax-form" action="{{ route('dashboard.settings.home.payment-way.post') }}" method="post"
        data-success-callback="onAjaxSuccess" data-error-callback="onAjaxError">
        @csrf
        <div class="modal fade" tabindex="-1" id="crud_modal">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="form_title">{{ __('Add Payment ways') }}</h5>
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i class="ki-outline ki-cross fs-1"></i>
                        </div>
                        <!--end::Close-->
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
                        <div class="fv-row mb-0 fv-plugins-icon-container">
                            <label for="name_en_inp"
                                class="form-label required fs-6 fw-bold mb-3">{{ __('Name en') }}</label>
                            <input type="text" name="name_en" class="form-control form-control-lg form-control-solid"
                                id="name_en_inp" placeholder="{{ __('Name en') }}">
                            <div class="fv-plugins-message-container invalid-feedback" id="name_en"></div>
                        </div>
                        <div class="fv-row mb-0 fv-plugins-icon-container">
                            <label for="description_ar_inp"
                                class="form-label required fs-6 fw-bold mb-3">{{ __('Description ar') }}</label>
                            <input type="text" name="description_ar"
                                class="form-control form-control-lg form-control-solid" id="description_ar_inp"
                                placeholder="{{ __('Description ar') }}">
                            <div class="fv-plugins-message-container invalid-feedback" id="description_ar"></div>
                        </div>
                        <div class="fv-row mb-0 fv-plugins-icon-container">
                            <label for="description_en_inp"
                                class="form-label required fs-6 fw-bold mb-3">{{ __('Description en') }}</label>
                            <input type="text" name="description_en"
                                class="form-control form-control-lg form-control-solid" id="description_en_inp"
                                placeholder="{{ __('Description en') }}">
                            <div class="fv-plugins-message-container invalid-feedback" id="description_en"></div>
                        </div>
                        <div class="fv-row mb-0 fv-plugins-icon-container">
                            <div class="d-flex flex-stack">
                                <!-- Label -->
                                <div class="me-5">
                                    <label class="fs-6 fw-semibold">{{ __('Statue') }}</label>
                                </div>
                                <!-- Hidden Input for Fallback -->
                                <input type="hidden" name="statue" value="inactive">
                                <!-- Toggle Switch -->
                                <label class="form-check form-switch form-check-custom form-check-solid">
                                    <input class="form-check-input" name="statue" type="checkbox" value="active"
                                        id="statue_inp">
                                </label>
                            </div>
                            <!-- Feedback -->
                            <div class="fv-plugins-message-container invalid-feedback" id="statue">
                            </div>
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
    {{-- end::Add Country Modal --}}
    <!--end::Form-->
@endsection

@push('scripts')
    <script>
        window['onAjaxSuccess'] = () => {
            soundStatus = $("[name='sound_status']:checked").val();
            showToast();
        }
    </script>
    <script src="{{ asset('assets/dashboard/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>

    <script src="{{ asset('assets/dashboard/js/global/crud-operations.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#add_btn").click(function(e) {
                e.preventDefault();
                $("#form_title").text(__('Add Payment ways'));
                $("[name='_method']").remove();
                $("#crud_form").trigger('reset');
                $("#crud_form").attr('action', `/dashboard/settings/payment-content/payment-way`);
            });
        });
    </script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        $(document).ready(function() {
            // On change of the toggle switch
            $(".payment-status-toggle").change(function() {
                const paymentId = $(this).data("id"); // Get the ID of the payment
                const newStatus = $(this).is(":checked") ? "active" :
                    "inactive"; // Determine the new status

                // AJAX request to update the status
                $.ajax({
                    url: `/dashboard/settings/payment-content/payment-way/${paymentId}/update_statue`, // Corrected route for your backend
                    type: "POST",
                    data: {
                        statue: newStatus, // Send the new status as 'statue'
                        _token: $('meta[name="csrf-token"]').attr(
                            'content') // CSRF token for security
                    },
                    success: function(response) {
                        showToast(__("Item has been updated successfully"));
                    },
                    error: function(xhr, status, error) {
                        alert("An error occurred: " + xhr.responseText); // Handle errors
                    }
                });
            });
        });
    </script>

    <script>
        function deletePayment(paymentId) {
            if (paymentId) {
                // Send an AJAX request to delete the payment (use a POST or DELETE request based on your backend)
                $.ajax({
                    url: `/dashboard/settings/payment-content/payment-way/${paymentId}/delete`, // Adjust to your route for deletion
                    type: 'DELETE',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
                    },
                    success: function(response) {
                        // alert('Payment deleted successfully');
                        location.reload(); // Reload the page after successful deletion
                    },
                    error: function(xhr, status, error) {
                        // alert('An error occurred while deleting the payment');
                    }
                });
            }
        }
    </script>
@endpush
