"use strict";

// Class definition
var KTAccountSettingsWebsite = function () {
    // Private variables
    var form;
    var submitButton;
    var validation;

    // Private functions
    var initValidation = function () {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            form,
            {
                fields: {
                    bkash_content_1: {
                        validators: {
                            notEmpty: {
                                message: 'Bkash Short Content is required'
                            }
                        }
                    },
                    bkash_content_2: {
                        validators: {
                            notEmpty: {
                                message: 'Bkash Big Content is required'
                            }
                        }
                    },
                    nagad_content_1: {
                        validators: {
                            notEmpty: {
                                message: 'Nagad Short Content is required'
                            }
                        }
                    },
                    nagad_content_2: {
                        validators: {
                            notEmpty: {
                                message: 'Nagad Big Content is required'
                            }
                        }
                    },
                    telegram_content: {
                        validators: {
                            notEmpty: {
                                message: 'Telegram Content is required'
                            }
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    //defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );
    }

    var handleForm = function () {
        submitButton.addEventListener('click', function (e) {
            e.preventDefault();

            const formData = new FormData(form);
            const formDataObject = {};
            formData.forEach((value, key) => {
                formDataObject[key] = value;
            });

            validation.validate().then(function (status) {
                if (status === 'Valid') {
                    axios.post('/admin/website-settings/update', formDataObject)
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
                            confirmButton: "btn fw-bold btn-light-primary"
                        }
                    });
                }
            });
        });
    }

    // Public methods
    return {
        init: function () {
            form = document.getElementById('kt_account_profile_details_form');
            submitButton = form.querySelector('#kt_account_profile_details_submit');

            initValidation();
            handleForm();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTAccountSettingsWebsite.init();
});
