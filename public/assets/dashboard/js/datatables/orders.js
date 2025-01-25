"use strict";

var datatable;
// Class definition
var KTDatatablesServerSide = (function () {
    let dbTable = "orders";
    // if(typeof userId !== 'undefined'){
    //     dbTable +='?user_id='+userId;
    //     console.log(dbTable);
    // }
    // Private functions
    var initDatatable = function () {
        datatable = $("#kt_datatable_orders").DataTable({
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
                { data: "customer.name", name: "customer_id" },
                { data: "customer.phone", name: "customer_id" },
                { data: "package.name", name: "package_id" },
                { data: "package.FinalPrice", name: "package_id" },
                { data: "Payment_statue", name: "Payment_statue" },
                { data: "created_at" },
                { data: null },
            ],
            columnDefs: [
                {
                    targets: 0,
                    orderable: false,
                    render: function (data, type, row, meta) {
                        return meta.row + 1;
                    },
                },
                {
                    targets: 1,
                    orderable: false,
                    render: function (data, type, row) {
                        return `
                            <div class="d-flex align-items-center">
                                <span href="javascript:;" class="mb-1 text-gray-800 text-hover-primary">${row.customer.name}</span>
                            </div>`;
                    },
                },
                {
                    targets: 2,
                    orderable: false,
                    render: function (data, type, row) {
                        return `
                            <div class="d-flex align-items-center">
                                <span href="javascript:;" class="mb-1 text-gray-800 text-hover-primary">${row.customer.phone}</span>
                            </div>`;
                    },
                },
                {
                    targets: 3,
                    orderable: false,
                    render: function (data, type, row) {
                        return `
                            <div class="d-flex align-items-center">
                                <span href="javascript:;" class="mb-1 text-gray-800 text-hover-primary">${row.package.name}</span>
                            </div>`;
                    },
                },
                {
                    targets: 4,
                    orderable: false,
                    render: function (data, type, row) {
                        return `
                            <div class="d-flex align-items-center">
                                <span href="javascript:;" class="mb-1 text-gray-800 text-hover-primary">${row.package.FinalPrice}</span>
                            </div>`;
                    },
                },
                {
                    targets: 5,
                    orderable: false,
                    render: function (data) {
                        let status = {
                            Pending: {
                                color: "warning",
                                title: "Pending",
                            },
                            Paid: {
                                color: "success",
                                title: "Paid",
                            },
                            Rejected: {
                                color: "danger",
                                title: "Rejected",
                            },
                        };

                        // Check if the data exists in the status object, otherwise show a default badge
                        if (status[data]) {
                            return `<span class="badge badge-light-${status[data].color}">${status[data].title}</span>`;
                        } else {
                            return `<span class="badge badge-light-secondary">Unknown</span>`;
                        }
                    },
                },
                {
                    targets: 4,
                    orderable: false,
                    render: function (data, type, row) {
                        return `
                            <div class="d-flex align-items-center">
                                <span href="javascript:;" class="mb-1 text-gray-800 text-hover-primary">${row.created_at}</span>
                            </div>`;
                    },
                },
                {
                    targets: -1,
                    data: null,
                    orderable: false,
                    render: function (data, type, row) {
                        return `
                        <a href="/dashboard/orders/${
                            data.id
                        }" class="btn btn-light btn-active-light-primary btn-sm ">
                            <span class="indicator-label">
                                ${__("Show")}
                            </span>
                            <i class="fa-regular fa-eye fs-4"></i>
                        </a>
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
            //initToggleToolbar();
            // if(typeof userId === 'undefined'){
            // toggleToolbars();
            // }
            KTMenu.createInstances();
        });
    };

    // Public methods
    return {
        init: function () {
            initDatatable();
            // if(typeof userId === 'undefined'){
            handleSearchDatatable();
            handleFilterRowsByColumnIndex();
            //initToggleToolbar();
            // }
        },
    };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTDatatablesServerSide.init();
});
