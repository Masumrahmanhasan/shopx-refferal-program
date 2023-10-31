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
                    <div class="col-12">
                        <div class="row row-cards">
                            <div class="col-sm-6 col-lg-3">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <span class="bg-primary text-white avatar">
                                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users"
                                                       width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                       fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                       <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                                       <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                                       <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                                       <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                                  </svg>
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    <strong>{{ $data->total }}</strong> Total Users
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                            <span class="bg-green text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users"
                                                   width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                   fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                       <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                                       <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                                       <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                                       <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                                  </svg>
                                            </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    <strong>{{ $data->active }}</strong> Active Users
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                            <span class="bg-danger text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/shopping-cart -->
                                              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users"
                                                   width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                   fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                       <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                                       <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                                       <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                                       <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                                  </svg>
                                            </span>
                                            </div>
                                            <div class="col">
                                                <div class="font-weight-medium">
                                                    <strong>{{ $data->inactive }}</strong> Inactive Users
                                                </div>
                                            </div>
                                        </div>
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
