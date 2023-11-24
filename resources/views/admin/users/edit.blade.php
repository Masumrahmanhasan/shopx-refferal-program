@extends('layouts.admin')

@section('title','Users')
@section('toolbar-title','Users')

@section('content')

    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Users Edit</h1>
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
                    <li class="breadcrumb-item text-muted">User Management</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Users</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">Users Edit</li>
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
            <!--begin::Form-->
            <div class="col-xl-8 g-xl-16">
                <form id="kt_ecommerce_add_user_form" class="form d-flex flex-column flex-lg-row" enctype="multipart/form-data">
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">

                        <div class="d-flex flex-column gap-7 gap-lg-10">
                            <!--begin::General options-->
                            <div class="card card-flush py-4">
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">

                                    <div class="fv-row mb-5">
                                        <label class="required form-label">User Role</label>
                                        <!--begin::Row-->
                                        <div class="row g-9"
                                             data-kt-buttons="true" data-kt-buttons-target="[data-kt-button='true']">
                                            <!--begin::Col-->
                                            <div class="col">
                                                <!--begin::Option-->
                                                <label
                                                    class="btn btn-outline btn-outline-dashed btn-outline-default active d-flex text-start p-6"
                                                    data-kt-button="true">
                                                    <!--begin::Radio-->
                                                    <span
                                                        class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                        <input class="form-check-input"
                                                               type="radio"
                                                               name="role" value="user"
                                                               @if($user->role === 'user')
                                                               checked="checked"
                                                               @endif
                                                        />
                                                    </span>

                                                    <span class="ms-5">
                                                        <span
                                                            class="fs-4 fw-bolder text-gray-800 d-block">User</span>
                                                    </span>

                                                </label>
                                                <!--end::Option-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col">
                                                <!--begin::Option-->
                                                <label
                                                    class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6"
                                                    data-kt-button="true">
                                                    <!--begin::Radio-->
                                                    <span
                                                        class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                        <input class="form-check-input"
                                                               type="radio"
                                                               name="role"
                                                               value="admin"
                                                               @if($user->role === 'admin')
                                                                   checked="checked"
                                                               @endif
                                                        />
                                                    </span>
                                                    <!--end::Radio-->
                                                    <!--begin::Info-->
                                                    <span class="ms-5">
                                                        <span
                                                            class="fs-4 fw-bolder text-gray-800 d-block">Admin</span>
                                                    </span>
                                                    <!--end::Info-->
                                                </label>
                                                <!--end::Option-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>

                                    <div class="mb-5 fv-row" id="kt_ecommerce_check_type">
                                        <!--begin::Label-->
                                        <label class="required form-label">Refferel</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-select" name="referred_by" data-kt-select2="true" data-placeholder="Select Referral" data-allow-clear="true">
                                            <option></option>
                                            @foreach($users as $item)
                                                <option @if($item->referral_id === $user->referred_by) selected="selected" @endif value="{{ $item->referral_id }}">{{ $item->username }}</option>
                                            @endforeach

                                        </select>
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">A User is required</div>
                                        <!--end::Description-->
                                    </div>

                                    <!--begin::Input group-->
                                    <div class="mb-5 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label">First Name</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="first_name" class="form-control mb-2"
                                               placeholder="First name" value="{{ $user->first_name }}"/>
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">A First name is required</div>
                                        <!--end::Description-->
                                    </div>

                                    <div class="mb-5 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label">Last Name</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="last_name" class="form-control mb-2"
                                               placeholder="First name" value="{{ $user->last_name }}"/>
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">A Last name is required</div>
                                        <!--end::Description-->
                                    </div>

                                    <div class="mb-5 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label">Phone</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="phone" class="form-control mb-2"
                                               placeholder="Phone Number" value="{{ $user->phone }}"/>
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">A Phone is required</div>
                                        <!--end::Description-->
                                    </div>

                                    <div class="mb-5 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label">Email</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="email" class="form-control mb-2"
                                               placeholder="Email" value="{{ $user->email }}"/>
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">A Email is required</div>
                                        <!--end::Description-->
                                    </div>

                                    <div class="mb-5">
                                        <!--begin::Label-->
                                        <label class=" form-label">Password</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="password"
                                               class="form-control mb-2"
                                               placeholder="Password" value=""/>
                                        <!--end::Input-->
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
                                            <option value="active" @if($user->status === 'active') selected="selected" @endif>Active</option>
                                            <option value="inactive" @if($user->status === 'inactive') selected="selected" @endif>Inactive</option>
                                        </select>
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">A Status is required</div>
                                        <!--end::Description-->
                                    </div>

                                </div>
                                <!--end::Card header-->
                            </div>
                            <!--end::General options-->
                            <!--begin::Media-->
                            <div class="card card-flush py-4">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Avatar</h2>
                                    </div>
                                </div>

                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-2">

                                        <!--begin::Input-->
                                        <input type="file" name="avatar" id="avatar" class="form-control mb-2"/>
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">Avatar is required</div>
                                        <!--end::Dropzone-->
                                    </div>
                                </div>
                                <!--end::Card header-->
                            </div>
                        </div>

                        <!--end::Tab content-->
                        <div class="d-flex justify-content-end">
                            <!--begin::Button-->
                            <a href="" id="kt_ecommerce_add_user_cancel" class="btn btn-light me-5">Cancel</a>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <button type="submit" id="kt_ecommerce_add_user_submit" class="btn btn-primary">
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
            <!--end::Form-->
        </div>
        <!--end::Container-->
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/custom/apps/user-management/users/list/edit.js') }}"></script>
@endsection
