@extends('layouts.dashboard_layout')
@section('custom_style')
    {{-- <link href="{{ asset('/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet"> --}}
@endsection


@section('content')
    <div class="container-fluid px-lg-4">
        <div class="row">
            <div class="col-md-12 mt-lg-4 mt-4">
                <!-- Page Heading -->
                <div class="card">
                    <div class="card-body">
                        <!-- title -->
                        <div class="col-md-12 mt-lg-4 mt-4">
                            <!-- Page Heading -->
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h2 mb-0 text-gray-800 text-info font-weight-bold">Account Details</h1>
                                @if($account_details->count() == NULL)
                                <a href="{{ route('manage_mentor_accounts_create',$mentor_id) }}"
                                    class="d-none d-sm-inline-block btn btn-success shadow-sm"> <i
                                        class="fas fa-university"></i>
                                    Create New Account
                                </a>
                                @endif
                            </div>
                        </div>
                        <!-- title -->
                    </div>
                </div>
            </div>

            <!-- column -->
            <div class="col-md-12 mt-4">
                @forelse($account_details as $account_details)
                    <div class="card card-body">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Account Title:</strong>
                                {{ $account_details->account_title }}

                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Account Type:</strong>
                                {{ $account_details->account_type }}

                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Account Number:</strong>
                                {{ $account_details->account_number }}

                            </div>
                        </div>
                        @if($account_details->bank_name)
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Bank Name:</strong>
                                {{ $account_details->bank_name }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Branch Name:</strong>
                                {{ $account_details->branch_name }}
                            </div>
                        </div>
                        @endif
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Note:</strong>
                                {{ $account_details->note }}

                            </div>
                        </div>
                        <br>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <a href="{{ route('manage_mentor_accounts_edit',$account_details->id) }}" class="btn btn-primary">Edit</a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="card card-body">
                        <h4 class="text-danger d-flex mx-auto">No account found for this user</h4>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
@endsection

@section('extra_js')
    {{-- <script src="{{ asset('/plugins/tables/js/jquery.dataTables.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script> --}}
@endsection
