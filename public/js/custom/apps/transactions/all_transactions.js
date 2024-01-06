"use strict";

var KTWAllTransaction = function () {
    // Define shared variables
    var table = document.getElementById('kt_table_all_transaction');
    var datatable;
    var toolbarSelected;
    var selectedCount;

    // Private functions
    var initUserTable = function () {
        // Set date data order
        const tableRows = table.querySelectorAll('tbody tr');

        tableRows.forEach(row => {
            // const dateRow = row.querySelectorAll('td');
            // const lastLogin = dateRow[3].innerText.toLowerCase(); // Get last login time
            // let timeCount = 0;
            // let timeFormat = 'minutes';
            //
            // // Determine date & time format -- add more formats when necessary
            // if (lastLogin.includes('yesterday')) {
            //     timeCount = 1;
            //     timeFormat = 'days';
            // } else if (lastLogin.includes('mins')) {
            //     timeCount = parseInt(lastLogin.replace(/\D/g, ''));
            //     timeFormat = 'minutes';
            // } else if (lastLogin.includes('hours')) {
            //     timeCount = parseInt(lastLogin.replace(/\D/g, ''));
            //     timeFormat = 'hours';
            // } else if (lastLogin.includes('days')) {
            //     timeCount = parseInt(lastLogin.replace(/\D/g, ''));
            //     timeFormat = 'days';
            // } else if (lastLogin.includes('weeks')) {
            //     timeCount = parseInt(lastLogin.replace(/\D/g, ''));
            //     timeFormat = 'weeks';
            // }
            //
            // // Subtract date/time from today -- more info on moment datetime subtraction: https://momentjs.com/docs/#/durations/subtract/
            // const realDate = moment().subtract(timeCount, timeFormat).format();
            //
            // // Insert real date to last login attribute
            // dateRow[3].setAttribute('data-order', realDate);
            //
            // // Set real date for joined column
            // const joinedDate = moment(dateRow[5].innerHTML, "DD MMM YYYY, LT").format(); // select date from 5th column in table
            // dateRow[5].setAttribute('data-order', joinedDate);
        });

        // Init datatable --- more info on datatables: https://datatables.net/manual/
        datatable = $(table).DataTable({
            "info": false,
            'order': [],
            "pageLength": 100,
            "lengthChange": false,
            'columnDefs': [
                {orderable: false, targets: 0}, // Disable ordering on column 0 (checkbox)
                {orderable: false, targets: 7}, // Disable ordering on column 6 (actions)
            ]
        });

        // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
        datatable.on('draw', function () {
            initToggleToolbar();
            toggleToolbars();
        });
    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = () => {
        const filterSearch = document.querySelector('[data-kt-transactions-table-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            datatable.search(e.target.value).draw();
        });
    }

    // Init toggle toolbar
    var initToggleToolbar = () => {
        // Select all checkboxes
        const checkboxes = table.querySelectorAll('[type="checkbox"]');

        toolbarSelected = document.querySelector('[data-kt-withdraw-table-toolbar="selected"]');
        selectedCount = document.querySelector('[data-kt-withdraw-table-select="selected_count"]');
        const statusSelect = $('[data-kt-withdraw-table-select="status_selected"]');

        if (statusSelect) {
            statusSelect.on('select2:select', function (e) {
                const selectedValue = e.params.data.id;
                const checkboxValues = [];

                checkboxes.forEach((checkbox, index) => {
                    if (index !== 0 && checkbox.checked) {
                        checkboxValues.push(checkbox.value);
                    }
                });

                axios.post('/admin/transactions/withdraw/bulk-status-change', {
                    transaction_id: checkboxValues,
                    status: selectedValue
                }).then(response => {
                    window.location.reload();
                }).catch(error => {
                    window.location.reload();
                });

            });
        }
        // Toggle delete selected toolbar
        checkboxes.forEach(c => {
            c.addEventListener('click', function () {
                setTimeout(function () {
                    toggleToolbars();
                }, 50);
            });
        });
    }

    // Toggle toolbars
    const toggleToolbars = () => {
        // Select refreshed checkbox DOM elements
        const allCheckboxes = table.querySelectorAll('tbody [type="checkbox"]');

        // Detect checkboxes state & count
        let checkedState = false;
        let count = 0;

        // Count checked boxes
        allCheckboxes.forEach(c => {
            if (c.checked) {
                checkedState = true;
                count++;
            }
        });

        // Toggle toolbars
        // if (checkedState) {
        //     selectedCount.innerHTML = count;
        //     toolbarSelected.classList.remove('d-none');
        // } else {
        //     toolbarSelected.classList.add('d-none');
        // }
    }

    return {
        // Public functions
        init: function () {
            if (!table) {
                return;
            }
            //
            initUserTable();
            // initToggleToolbar();
            handleSearchDatatable();

        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTWAllTransaction.init();
});
