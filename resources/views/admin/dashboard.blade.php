@extends('layouts.admin')

@section('title','Dashboard')
@section('toolbar-title','Dashboard')

@section('content')

    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Dashboard</h1>
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
                    <li class="breadcrumb-item text-muted">Statistics Management</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Dashboard</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">All Statistics</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->

        </div>
        <!--end::Container-->
    </div>

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <div class="row g-5 g-xl-10">
                <div class="col-xl-4 mb-xl-10">
                    <div class="card card-flush h-xl-100">
                        <!--begin::Heading-->
                        <div
                            class="card-header rounded bgi-no-repeat bgi-size-cover bgi-position-y-top bgi-position-x-center align-items-start h-250px"
                            style="background-image:url('{{ asset('media/svg/shapes/top-green.png') }}')"
                            data-bs-theme="light">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column text-white pt-15">
                                <span class="fw-bold fs-2x mb-3">Users</span>
                            </h3>
                            <!--end::Title-->

                        </div>
                        <!--end::Heading-->

                        <!--begin::Body-->
                        <div class="card-body mt-n20">
                            <!--begin::Stats-->
                            <div class="mt-n20 position-relative">
                                <!--begin::Row-->
                                <div class="row g-3 g-lg-6">
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Items-->
                                        <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-30px me-5 mb-8">
                                <span class="symbol-label">
                                    <i class="ki-duotone ki-flask fs-1 text-primary">
                                        <span class="path1"></span><span class="path2"></span>
                                    </i>
                                </span>
                                            </div>
                                            <!--end::Symbol-->

                                            <!--begin::Stats-->
                                            <div class="m-0">
                                                <!--begin::Number-->
                                                <span
                                                    class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $data->total }}</span>
                                                <!--end::Number-->

                                                <!--begin::Desc-->
                                                <span class="text-gray-500 fw-semibold fs-6">Total</span>
                                                <!--end::Desc-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Items-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Items-->
                                        <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-30px me-5 mb-8">
                                <span class="symbol-label">
                                    <i class="ki-duotone ki-bank fs-1 text-primary"><span class="path1"></span><span
                                            class="path2"></span></i>
                                </span>
                                            </div>
                                            <!--end::Symbol-->

                                            <!--begin::Stats-->
                                            <div class="m-0">
                                                <!--begin::Number-->
                                                <span
                                                    class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $data->active }}</span>
                                                <!--end::Number-->

                                                <!--begin::Desc-->
                                                <span class="text-gray-500 fw-semibold fs-6">Active</span>
                                                <!--end::Desc-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Items-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Items-->
                                        <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-30px me-5 mb-8">
                                <span class="symbol-label">
                                    <i class="ki-duotone ki-award fs-1 text-primary"><span class="path1"></span><span
                                            class="path2"></span><span class="path3"></span></i>
                                </span>
                                            </div>
                                            <!--end::Symbol-->

                                            <!--begin::Stats-->
                                            <div class="m-0">
                                                <!--begin::Number-->
                                                <span
                                                    class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $data->inactive }}</span>
                                                <!--end::Number-->

                                                <!--begin::Desc-->
                                                <span class="text-gray-500 fw-semibold fs-6">Inactive</span>
                                                <!--end::Desc-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Items-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <!--begin::Items-->
                                        <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-30px me-5 mb-8">
                                <span class="symbol-label">
                                    <i class="ki-duotone ki-timer fs-1 text-primary"><span class="path1"></span><span
                                            class="path2"></span><span class="path3"></span></i>
                                </span>
                                            </div>
                                            <!--end::Symbol-->

                                            <!--begin::Stats-->
                                            <div class="m-0">
                                                <!--begin::Number-->
                                                <span
                                                    class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $data->new_requests }}</span>
                                                <!--end::Number-->

                                                <!--begin::Desc-->
                                                <span class="text-gray-500 fw-semibold fs-6">New Request</span>
                                                <!--end::Desc-->
                                            </div>
                                            <!--end::Stats-->
                                        </div>
                                        <!--end::Items-->
                                    </div>
                                    <!--end::Col-->

                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Body-->
                    </div>
                </div>

                <div class="col-xl-8 g-xl-16">
                    <div class="card pt-4 mb-6 mb-xl-9">
                        <!--begin::Card header-->
                        <div class="card-header border-0">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Transaction History</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0 pb-5">
                            <!--begin::Table-->
                            <div id="kt_table_customers_payment_wrapper"
                                 class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed gy-5 dataTable no-footer"
                                           id="kt_table_customers_payment">
                                        <!--begin::Table head-->
                                        <thead class="border-bottom border-gray-200 fs-7 fw-bolder">
                                        <!--begin::Table row-->
                                        <tr class="text-start text-muted text-uppercase gs-0">
                                            <th class="min-w-100px sorting" tabindex="0"
                                                aria-controls="kt_table_customers_payment" rowspan="1" colspan="1"
                                                aria-label="order No.: activate to sort column ascending"
                                                style="width: 131.859px;">Trnx No.
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="kt_table_customers_payment"
                                                rowspan="1" colspan="1"
                                                aria-label="Status: activate to sort column ascending"
                                                style="width: 112.734px;">Status
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="kt_table_customers_payment"
                                                rowspan="1" colspan="1"
                                                aria-label="Amount: activate to sort column ascending"
                                                style="width: 107.328px;">Amount
                                            </th>
                                            <th class="min-w-100px sorting" tabindex="0"
                                                aria-controls="kt_table_customers_payment" rowspan="1" colspan="1"
                                                aria-label="Rewards: activate to sort column ascending"
                                                style="width: 134.969px;">Payment Method
                                            </th>
                                            <th class="min-w-100px sorting" tabindex="0"
                                                aria-controls="kt_table_customers_payment" rowspan="1" colspan="1"
                                                aria-label="Rewards: activate to sort column ascending"
                                                >Payment Type
                                            </th>
                                            <th class="min-w-100px sorting_disabled" rowspan="1" colspan="1"
                                                aria-label="Date" style="width: 203.859px;">Date
                                            </th>
                                        </tr>
                                        <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody class="fs-6 fw-bold text-gray-600">
                                        <!--begin::Table row-->

                                        @foreach($transactions as $transaction)
                                            <tr class="odd">
                                                <!--begin::order=-->
                                                <td>
                                                    <a href="javascript:void(0)"
                                                       class="text-gray-600 text-hover-primary mb-1">#{{ $transaction->trxn_id }}</a>
                                                </td>
                                                <!--end::order=-->
                                                <!--begin::Status=-->
                                                <td>
                                                    <span class="badge badge-light-success">{{ ucfirst($transaction->status)}}</span>
                                                </td>
                                                <!--end::Status=-->
                                                <!--begin::Amount=-->
                                                <td>BDT {{ $transaction->amount }}</td>
                                                <!--end::Amount=-->
                                                <!--begin::Amount=-->
                                                <td data-order="0000-01-12T00:00:00+06:01">{{ ucfirst($transaction->gateway) }}</td>
                                                <!--end::Amount=-->
                                                <!--begin::Date=-->
                                                <td><span class="badge badge-light-success">{{ ucfirst($transaction->type) }}</span></td>
                                                <td>{{ $transaction->created_at }}</td>
                                                <!--end::Date=-->
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                </div>

                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
