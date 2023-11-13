@extends('layouts.admin')

@section('title','Tasks')
@section('toolbar-title','Tasks Create')

@section('content')
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Tasks List</h1>
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
                    <li class="breadcrumb-item text-muted">Task Management</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Tasks</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Tasks Create</li>
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
                                        <label class="required form-label">Link</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="url" class="form-control mb-2"
                                               placeholder="First name" value=""/>
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">A Link is required</div>
                                        <!--end::Description-->
                                    </div>

                                    <div class="mb-5 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label">Price</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="number" name="price" class="form-control mb-2"
                                               placeholder="price" value=""/>
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">A Price is required</div>
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

                                    <div class="fv-row mb-5">

                                        <label class="required form-label">Thumbnail</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="file" name="thumbnail" id="thumbnail" class="form-control mb-2"/>
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">Thumbnail is required</div>
                                        <!--begin::Dropzone-->
{{--                                        <div class="dropzone" id="kt_ecommerce_add_task_media">--}}
{{--                                            <!--begin::Message-->--}}
{{--                                            <div class="dz-message needsclick">--}}
{{--                                                <!--begin::Icon-->--}}
{{--                                                <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>--}}
{{--                                                <!--end::Icon-->--}}
{{--                                                <!--begin::Info-->--}}
{{--                                                <div class="ms-4">--}}
{{--                                                    <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Drop files here or click--}}
{{--                                                        to upload.</h3>--}}
{{--                                                    <span class="fs-7 fw-bold text-gray-400">Upload Only One file</span>--}}
{{--                                                </div>--}}
{{--                                                <!--end::Info-->--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <!--end::Dropzone-->
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
    <script src="{{ asset('js/custom/apps/task-management/tasks/list/add.js') }}"></script>
@endsection
