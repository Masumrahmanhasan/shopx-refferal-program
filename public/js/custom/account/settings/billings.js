"use strict";

// Class definition
var KTAccountSettingsBillings = function () {
    // Private functions
    var initSettings = function () {

        var signInMainEl = document.getElementById('kt_signin_email');
        var signInEditEl = document.getElementById('kt_signin_email_edit');

        // button elements
        var signInChangeEmail = document.getElementById('kt_signin_email_button');
        var signInCancelEmail = document.getElementById('kt_signin_cancel');

        signInChangeEmail.querySelector('button').addEventListener('click', function () {
            toggleChangeEmail();
        });

        signInCancelEmail.addEventListener('click', function () {
            toggleChangeEmail();
        });

        var toggleChangeEmail = function () {
            signInMainEl.classList.toggle('d-none');
            signInChangeEmail.classList.toggle('d-none');
            signInEditEl.classList.toggle('d-none');
        }
    }

    var handleChangeAccounts = function (e) {
        var validation;

        // form elements
        var signInForm = document.getElementById('kt_signin_change_accounts');

        validation = FormValidation.formValidation(
            signInForm,
            {
                fields: {
                    bkash: {
                        validators: {
                            notEmpty: {
                                message: 'Bkash is required'
                            }
                        }
                    },

                    nagad: {
                        validators: {
                            notEmpty: {
                                message: 'Nagad is required'
                            }
                        }
                    }
                },

                plugins: { //Learn more: https://formvalidation.io/guide/plugins
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row'
                    })
                }
            }
        );

        signInForm.querySelector('#kt_signin_submit').addEventListener('click', function (e) {
            e.preventDefault();
            const formData = new FormData(signInForm);
            const formDataObject = {};
            formData.forEach((value, key) => {
                formDataObject[key] = value;
            });

            validation.validate().then(function (status) {
                if (status === 'Valid') {
                    axios.post('/admin/billings/update', formDataObject)
                        .then(response => {
                            Swal.fire({
                                text: "Form has been successfully submitted!",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            }).then(function (result) {
                                if (result.isConfirmed) {

                                    // submitButton.disabled = false;
                                    window.location.reload()
                                }
                            });
                        }).catch(error => {

                        Swal.fire({
                            html: error.response.data.message,
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });
                    }).finally(() => {
                        // Remove loading indicator
                        // submitButton.removeAttribute('data-kt-indicator');
                        // submitButton.disabled = false;
                    });
                } else {
                    swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    });
                }
            });
        });
    }
    return {
        init: function () {
            initSettings();
            handleChangeAccounts();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTAccountSettingsBillings.init();
});
