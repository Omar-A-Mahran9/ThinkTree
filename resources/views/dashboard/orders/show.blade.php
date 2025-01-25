@extends('dashboard.partials.master')
@push('styles')
    <link href="{{ asset('assets/dashboard/css/datatables' . (isDarkMode() ? '.dark' : '') . '.bundle.css') }}"
        rel="stylesheet" type="text/css" />
    <link
        href="{{ asset('assets/dashboard/plugins/custom/datatables/datatables.bundle' . (isArabic() ? '.rtl' : '') . '.css') }}"
        rel="stylesheet" type="text/css" />
@endpush
@section('content')
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-fluid">
            <!--begin::Order details page-->
            <div class="d-flex flex-column gap-7 gap-lg-10">
                <div class="d-flex flex-wrap flex-stack gap-5 gap-lg-10">
                    <!--begin:::Tabs-->
                    <ul
                        class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-lg-n2 me-auto">
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primar pb-4 active" data-bs-toggle="tab"
                                href="#kt_ecommerce_sales_order_summary">{{ __('Order Summary') }}</a>
                        </li>
                        <!--end:::Tab item-->

                    </ul>
                    <!--end:::Tabs-->
                    <!--begin::Button-->
                    <a href="{{ route('dashboard.orders.index') }}"
                        class="btn btn-icon btn-light btn-active-secondary btn-sm ms-auto me-lg-n7">
                        <i class="fa-solid {{ isArabic() ? 'fa-arrow-right' : 'fa-arrow-left' }} fs-2"></i>
                    </a>

                </div>
                <!--begin::Order summary-->
                <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-2">
                    <!--begin::Order details-->
                    <div class="card card-flush py-4 flex-row-fluid">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{ __('Order Details') }} ({{ $order->id }})</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-bordered mb-0 fs-6 gy-6 min-w-300px">
                                    <tbody class="fw-semibold text-gray-600">
                                        <tr>
                                            <td class="text-muted">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa-regular fa-calendar fs-4 me-2"></i>{{ __('Created at') }}
                                                </div>
                                            </td>
                                            <td class="fw-bold text-end">{{ $order->created_at->format('d-m-Y') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa-solid fa-wallet fs-4 me-2"></i>{{ __('Package') }}
                                                </div>
                                            </td>
                                            <td class="fw-bold text-end"> {{ __('' . $order->Package->name) }} </td>
                                        </tr>

                                        <tr>
                                            <td class="text-muted">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa-solid fa-wallet fs-4 me-2"></i>{{ __('Price') }}
                                                </div>
                                            </td>
                                            <td class="fw-bold text-end"> {{ __('' . $order->Package->FinalPrice) }} </td>
                                        </tr>

                                        <tr>
                                            <td class="text-muted">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa-solid fa-wallet fs-4 me-2"></i>{{ __('Status') }}
                                                </div>
                                            </td>
                                            <td class="fw-bold text-end"> {{ __('' . $order->Payment_statue) }}
                                            </td>
                                        </tr>


                                    </tbody>
                                </table>
                                <!--end::Table-->
                            </div>
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Order details-->
                    <!--begin::Customer details-->
                    <div class="card card-flush py-4 flex-row-fluid">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{ __('Customer Details') }}</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                    <tbody class="fw-semibold text-gray-600">
                                        <tr>
                                            <td class="text-muted">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa-regular fa-user fs-4 me-2"></i>{{ __('Customer') }}
                                                </div>
                                            </td>
                                            <td class="fw-bold text-end">
                                                <div class="d-flex align-items-center justify-content-end">
                                                    <!--begin:: Avatar -->
                                                    <div class="symbol symbol-circle symbol-40px overflow-hidden me-3">
                                                        <div class="symbol-label fs-2 fw-semibold text-success">
                                                            {{ strtoupper(substr($order->customer->name, 0, 2)) }}</div>
                                                    </div>
                                                    <!--end::Avatar-->
                                                    <!--begin::Name-->
                                                    <a
                                                        class="text-gray-600 text-hover-primary">{{ $order->customer->name }}</a>
                                                    <!--end::Name-->
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa-regular fa-envelope fs-5 me-2"></i>{{ __('Email') }}
                                                </div>
                                            </td>
                                            <td class="fw-bold text-end">
                                                <a
                                                    class="text-gray-600 text-hover-primary">{{ $order->customer->email }}</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa-solid fa-phone fs-4 me-2"></i>{{ __('Phone') }}
                                                </div>
                                            </td>
                                            <td class="fw-bold text-end">{{ $order->customer->phone }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!--end::Table-->
                            </div>
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Customer details-->

                </div>
                <!--end::Order summary-->

            </div>
            <!--end::Order details page-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
@endsection
