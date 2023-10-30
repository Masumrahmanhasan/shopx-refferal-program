@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                            Overview
                        </div>
                        <h2 class="page-title">
                            Dashboard
                        </h2>
                    </div>

                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards">
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader">Sales</div>
                                </div>
                                <div class="h1 mb-3">75%</div>
                                <div class="d-flex mb-2">
                                    <div>Conversion rate</div>
                                    <div class="ms-auto">
                                        <span class="text-green d-inline-flex align-items-center lh-1">
                                          7% <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                                          <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24"
                                               height="24"
                                               viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                               stroke-linecap="round" stroke-linejoin="round"><path stroke="none"
                                                                                                    d="M0 0h24v24H0z"
                                                                                                    fill="none"></path><path
                                                  d="M3 17l6 -6l4 4l8 -8"></path><path d="M14 7l7 0l0 7"></path></svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary" style="width: 75%" role="progressbar"
                                         aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                         aria-label="75% Complete">
                                        <span class="visually-hidden">75% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection