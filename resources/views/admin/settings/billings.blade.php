@extends('layouts.admin')
@section('title', 'Settings')
@section('toolbar-title', 'Settings')

@section('content')
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Billings Settings</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-300 border-start mx-4"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Billings</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Settings</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
        </div>
        <!--end::Container-->
    </div>

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            @include('admin.settings.partials.__navigation')

            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header card-header-stretch pb-0">
                    <!--begin::Title-->
                    <div class="card-title">
                        <h3 class="m-0">Payment Methods</h3>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Tab content-->
                <div id="kt_billing_payment_tab_content" class="card-body tab-content">
                    <!--begin::Tab panel-->
                    <div id="kt_billing_creditcard" class="tab-pane fade show active" role="tabpanel">

                        <div class="row gx-9 gy-6">

                            <div class="col-xl-6">
                                <!--begin::Card-->
                                <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                                    <!--begin::Info-->
                                    <div class="d-flex flex-column py-2">
                                        <!--begin::Owner-->
                                        <div class="d-flex align-items-center fs-4 fw-bolder mb-5">Bkash</div>
                                        <!--end::Owner-->
                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Icon-->
                                            <img src="{{ asset('images/bkash.png')  }}" width="40" alt="" class="me-4" />
                                            <!--end::Icon-->
                                            <!--begin::Details-->
                                            <div>
                                                <div class="fs-4 fw-bolder">{{ get_settings('bkash') }}</div>
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>

                                </div>
                                <!--end::Card-->
                            </div>

                            <div class="col-xl-6">
                                <!--begin::Card-->
                                <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                                    <!--begin::Info-->
                                    <div class="d-flex flex-column py-2">
                                        <!--begin::Owner-->
                                        <div class="d-flex align-items-center fs-4 fw-bolder mb-5">Nagad</div>
                                        <!--end::Owner-->
                                        <!--begin::Wrapper-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Icon-->
                                            <img src="{{ asset('images/nagod.png')  }}" width="40" alt="" class="me-4" />
                                            <!--end::Icon-->
                                            <!--begin::Details-->
                                            <div>
                                                <div class="fs-4 fw-bolder">{{ get_settings('nagad') }}</div>
                                            </div>
                                            <!--end::Details-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Info-->

                                    <!--end::Actions-->
                                </div>
                                <!--end::Card-->
                            </div>

                            <!--end::Col-->
                        </div>

                        <!--end::Row-->
                    </div>

                </div>

                <div id="kt_account_settings_signin_method" class="collapse show">
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        <!--begin::Email Address-->
                        <div class="d-flex flex-wrap align-items-center">
                            <!--begin::Label-->
                            <div id="kt_signin_email">
                                <div class="fs-6 fw-bolder mb-1">Edit Payment Methods</div>
                            </div>
                            <!--end::Label-->
                            <!--begin::Edit-->
                            <div id="kt_signin_email_edit" class="flex-row-fluid d-none">
                                <!--begin::Form-->
                                <form id="kt_signin_change_accounts" class="form" novalidate="novalidate">
                                    <div class="row mb-6">
                                        <div class="col-lg-6 mb-4 mb-lg-0">
                                            <div class="fv-row mb-0">
                                                <label for="bkash" class="form-label fs-6 fw-bolder mb-3">Bkash</label>
                                                <input type="text" class="form-control form-control-lg form-control-solid" id="bkash"  name="bkash" value="{{ get_settings('bkash') }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="fv-row mb-0">
                                                <label for="nagad" class="form-label fs-6 fw-bolder mb-3">Nagad</label>
                                                <input type="text" class="form-control form-control-lg form-control-solid" name="nagad" id="nagad" {{ get_settings('nagad') }} />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <button id="kt_signin_submit" type="button" class="btn btn-primary me-2 px-6">Update</button>
                                        <button id="kt_signin_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                                    </div>
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Edit-->
                            <!--begin::Action-->
                            <div id="kt_signin_email_button" class="ms-auto">
                                <button class="btn btn-light btn-active-light-primary">Edit</button>
                            </div>
                            <!--end::Action-->
                        </div>
                        <!--end::Email Address-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Tab content-->
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/custom/account/settings/billings.js') }}"></script>
@endsection
