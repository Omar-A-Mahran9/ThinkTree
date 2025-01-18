"use strict";

var datatable;
// Class definition
var KTDatatablesServerSide = (function () {
    let dbTable = "packages";
    // Private functions
    var initDatatable = function () {
        datatable = $("#kt_datatable").DataTable({
            language: language,
            searchDelay: searchDelay,
            processing: processing,
            serverSide: serverSide,
            order: [],
            stateSave: saveState,
            select: {
                style: "multi",
                selector: 'td:first-child input[type="checkbox"]',
                className: "row-selected",
            },
            ajax: {
                url: `/dashboard/${dbTable}`,
            },
            columns: [
                { data: "id" },
                { data: "name" },
                { data: "price" },
                { data: "available" },
                { data: "featured" },
                { data: "created_at" },
                { data: null },
            ],
            columnDefs: [
                {
                    targets: 0,
                    orderable: false,
                    render: function (data) {
                        return `
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="${data}" />
                            </div>`;
                    },
                },
                {
                    targets: 1,
                    render: function (data, type, row) {
                        return `
                            <div>
                                <!--begin::Info-->
                                <div class="d-flex flex-column justify-content-center">
                                    <a href="javascript:;" class="mb-1 text-gray-800 text-hover-primary">${row.name}</a>
                                </div>
                                <!--end::Info-->
                            </div>
                        `;
                    },
                },
                {
                    targets: 2,
                    render: function (data, type, row) {
                        return `
                            <div>
                                <!--begin::Info-->
                                <div class="d-flex flex-column justify-content-center">
                                    <a href="javascript:;" class="mb-1 text-gray-800 text-hover-primary">${row.FinalPrice}</a>
                                </div>
                                <!--end::Info-->
                            </div>
                        `;
                    },
                },

                {
                    targets: 3,
                    render: function (data, type, row) {
                        return `
                        <div>
                            <!--begin::Info-->
                            <div class="d-flex flex-column justify-content-center">
                                <a href="javascript:;" class="mb-1 text-gray-800 text-hover-primary">
                                    ${
                                        row.available == 1
                                            ? `<span class="badge bg-success text-white">${__(
                                                  "Active"
                                              )}</span>` // Green badge for active
                                            : `<span class="badge bg-danger text-white">${__(
                                                  "Inactive"
                                              )}</span>` // Red badge for inactive
                                    }
                                </a>
                            </div>
                            <!--end::Info-->
                        </div>
                    `;
                    },
                },
                {
                    targets: 4,
                    render: function (data, type, row) {
                        return `
                        <div>
                            <!--begin::Info-->
                            <div class="d-flex flex-column justify-content-center">
                                <a href="javascript:;" class="mb-1 text-gray-800 text-hover-primary">
                                    ${
                                        row.featured == 1
                                            ? `<span class="badge bg-success text-white">          ${__(
                                                  "Featured"
                                              )}</span>` // Green badge for active
                                            : `<span class="badge bg-danger text-white">${__(
                                                  "UnFeatured"
                                              )}</span>` // Red badge for inactive
                                    }
                                </a>
                            </div>
                            <!--end::Info-->
                        </div>
                    `;
                    },
                },
                {
                    targets: 5,
                    render: function (data, type, row) {
                        return `
                            <div>
                                <!--begin::Info-->
                                <div class="d-flex flex-column justify-content-center">
                                    <a href="javascript:;" class="mb-1 text-gray-800 text-hover-primary">${row.created_at}</a>
                                </div>
                                <!--end::Info-->
                            </div>
                        `;
                    },
                },
                {
                    targets: 6,
                    data: null,
                    orderable: false,
                    render: function (data, type, row) {
                        return `
                        <div>
                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm " data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                                <span class="svg-icon svg-icon-dark svg-icon-1 m-0"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3" d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z" fill="currentColor"/>
                                    <path d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z" fill="currentColor"/>
                                    </svg>
                                </span>
                            </a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="javascript:;" class="menu-link px-3" data-kt-docs-table-filter="edit_row">
                                        ${__("Edit")}
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                ${`<!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-docs-table-filter="delete_row">
                                        ${__("Delete")}
                                    </a>
                                </div>
                                <!--end::Menu item-->`}
                            </div>
                            <!--end::Menu-->
                        </div
                        `;
                    },
                },
            ],
            // Add data-filter attribute
            createdRow: function (row, data, dataIndex) {
                // $(row).find('td:eq(4)').attr('data-filter', data.CreditCardType);
            },
        });

        // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
        datatable.on("draw", function () {
            initToggleToolbar();
            toggleToolbars();
            handleEditRows();
            deleteRowWithURL(`/dashboard/${dbTable}/`);
            deleteSelectedRowsWithURL({
                url: `/dashboard/${dbTable}/delete-selected`,
                restoreUrl: `/dashboard/${dbTable}/restore-selected`,
            });
            KTMenu.createInstances();
            handlePreviewAttachments();
        });
    };

    var handleEditRows = () => {
        // Select all edit buttons
        const editButtons = document.querySelectorAll(
            '[data-kt-docs-table-filter="edit_row"]'
        );

        editButtons.forEach((button) => {
            // edit button on click
            button.addEventListener("click", function (e) {
                e.preventDefault();

                // Get the current button's index and corresponding data
                let currentBtnIndex = $(editButtons).index(button);
                let data = datatable.row(currentBtnIndex).data();

                // Update modal fields dynamically
                $("#form_title").text(__("Edit package"));
                $(".image-input-wrapper").css(
                    "background-image",
                    `url('${data.full_image_path}')`
                );
                $("#name_ar_inp").val(data.name_ar);
                $("#name_en_inp").val(data.name_en);
                $("#description_ar_inp").val(data.description_ar);
                $("#description_en_inp").val(data.description_en);
                $("#price_inp").val(data.price);
                $("#discount_price_inp").val(data.discount_price);
                $("#discount-price-switch").prop(
                    "checked",
                    data.have_discount === 1
                );
                // Get the discount input element
                let discountInp = $("#discount_price_inp");

                // Enable or disable the discount input based on the initial value of `have_discount`
                if (data.have_discount === 1) {
                    discountInp.prop("disabled", false); // Enable input
                } else {
                    discountInp.prop("disabled", true); // Disable input
                }
                $("#price_per_session_inp").val(data.price_per_session);
                $("#duration_monthly_inp").val(data.duration_monthly);
                $("#number_of_session_per_week_inp").val(
                    data.number_of_session_per_week
                );
                $("#number_of_levels_inp").val(data.number_of_levels);
                $("#number_of_sessions_inp").val(data.number_of_sessions);
                $("#featured-switch").prop("checked", data.featured === 1);
                $("#available-switch").prop("checked", data.available === 1);

                // Set the form's action attribute and add the hidden input for PUT method
                $("#crud_form").attr(
                    "action",
                    `/dashboard/${dbTable}/${data.id}`
                );
                $("#crud_form").prepend(
                    `<input type="hidden" name="_method" value="PUT">`
                );
                $("#crud_modal").modal("show");

                // Handle the features dropdown
                if (data.features && data.features.length > 0) {
                    // Set selected features
                    let selectedFeatures = data.features.map(
                        (feature) => feature.id
                    ); // Assuming `data.features` is an array of feature objects with `id`
                    $("#features_inp").val(selectedFeatures).trigger("change"); // Trigger select2 to update the selected options
                }

                // Handle the features dropdown
                if (data.outcomes && data.outcomes.length > 0) {
                    // Set selected features
                    let selectedoutcomes = data.outcomes.map(
                        (outcome) => outcome.id
                    ); // Assuming `data.features` is an array of feature objects with `id`
                    $("#outcomes_inp").val(selectedoutcomes).trigger("change"); // Trigger select2 to update the selected options
                }

                if (data.groups && data.groups.length > 0) {
                    // Set selected features
                    let selectedgroups = data.groups.map((group) => group.id); // Assuming `data.features` is an array of feature objects with `id`
                    $("#groups_inp").val(selectedgroups).trigger("change"); // Trigger select2 to update the selected options
                }
            });
        });
    };

    var handlePreviewAttachments = () => {
        // Select all edit buttons
        const previewButtons = $('[data-action="preview_attachments"]');

        $.each(previewButtons, function (indexInArray, button) {
            $(button).on("click", function (e) {
                e.preventDefault();

                let data = datatable.row(indexInArray).data();
                $(".attachments").html("");

                $(".attachments").append(`
                    <!--begin::Overlay-->
                    <a class="d-block overlay" data-fslightbox="lightbox-basic" href="${data.full_image_path}">
                        <!--begin::Action-->
                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                            <i class="bi bi-eye-fill text-white fs-3x"></i>
                        </div>
                        <!--end::Action-->

                    </a>
                    <!--end::Overlay-->
                `);
                refreshFsLightbox();
                $("[data-fslightbox='lightbox-basic']:first").trigger("click");
            });
        });
    };

    // Public methods
    return {
        init: function () {
            initDatatable();
            handleSearchDatatable();
            initToggleToolbar();
            handleEditRows();
            deleteRowWithURL(`/dashboard/${dbTable}/`);
            deleteSelectedRowsWithURL({
                url: `/dashboard/${dbTable}/delete-selected`,
                restoreUrl: `/dashboard/${dbTable}/restore-selected`,
            });
            handlePreviewAttachments();
        },
    };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTDatatablesServerSide.init();
});
