@extends('layouts.admin')

@section('title','Supports')
@section('toolbar-title','Support Create')

@section('content')
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Supports List</h1>
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
                    <li class="breadcrumb-item text-muted">Support Management</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Supports</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Supports List</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->

        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->
            <div class="col-xl-8 g-xl-16">
                <form id="kt_ecommerce_add_task_form" class="form d-flex flex-column flex-lg-row" enctype="multipart/form-data">
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10 ">
                        <div class="d-flex flex-column gap-7 gap-lg-10">
                            <!--begin::General options-->
                            <div class="card card-flush py-4">
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Input group-->
                                    <div class="mb-5 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label">Title</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="title" class="form-control mb-2"
                                               placeholder="Title" value=""/>
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">A Title name is required</div>
                                        <!--end::Description-->
                                    </div>

                                    <div class="mb-5 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label">Username</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="username" class="form-control mb-2"
                                               placeholder="username" value=""/>
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">A Username is required</div>
                                        <!--end::Description-->
                                    </div>

                                    <div class="mb-5 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label">Type</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-select" name="type" data-kt-select2="true" data-placeholder="Select Referral" data-allow-clear="true">
                                            <option></option>
                                            <option value="telegram" selected="selected">Telegram</option>
                                            <option value="whatsapp">Whatsapp</option>
                                            <option value="messenger">Messenger</option>
                                        </select>
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">A Status is required</div>
                                        <!--end::Description-->
                                    </div>

                                    <div class="mb-5 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label">Status</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-select mb-2" name="status" data-control="select2" data-hide-search="true"
                                                data-placeholder="Select an option"
                                                id="kt_ecommerce_add_product_store_template">
                                            <option></option>
                                            <option value="active" selected="selected">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">A Status is required</div>
                                        <!--end::Description-->
                                    </div>

                                    <div class="mb-5 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label">Description</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <textarea type="text" name="description" class="form-control mb-2"
                                                  placeholder="description" rows="10"></textarea>
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">A Description is required</div>
                                        <!--end::Description-->
                                    </div>

                                </div>
                                <!--end::Card header-->
                            </div>
                            <!--end::General options-->
                        </div>

                        <!--end::Tab content-->
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <a href="" id="kt_ecommerce_add_task_cancel" class="btn btn-light me-5">Cancel</a>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <button type="submit" id="kt_ecommerce_add_task_submit" class="btn btn-primary">
                                <span class="indicator-label">Save Changes</span>
                                <span class="indicator-progress">Please wait...
												<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <!--end::Button-->
                        </div>

                    </div>
                    <!--end::Main column-->
                </form>
            </div>

            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/custom/apps/support-management/support/list/add.js') }}"></script>
@endsection
