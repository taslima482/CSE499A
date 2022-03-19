@extends('layouts.dashboard_layout')
@section('custom_style')
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
                                <h1 class="h2 mb-0 text-gray-800 text-info font-weight-bold">Approval Details</h1>
                                <a href="{{ route('dashboard') }}"
                                    class="d-sm-inline-block btn-sm btn-primary shadow-sm"><i
                                        class="fa fa-backward mr-2"></i>
                                    Dashboard
                                </a>
                            </div>
                        </div>
                        <!-- title -->
                    </div>
                </div>
            </div>

            <!-- column -->
            <div class="col-md-12 mt-4">
                <div class="card card-body">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Applied For:</strong>
                            {{$scholarship_data}}

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Student Name:</strong>
                            {{$student_data}}

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Approved Amount:</strong>
                            {{ $approved_application_detail->approved_amount }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>From Date:</strong>
                            {{ (new DateTime($approved_application_detail->from_date))->format('d-M-Y') }}


                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>To Date:</strong>
                            {{ (new DateTime($approved_application_detail->to_date))->format('d-M-Y') }}


                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Approved By:</strong>
                            {{$approved_application_detail->approved_by}}

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Approval Date:</strong>
                            {{ (new DateTime($approved_application_detail->approval_date))->format('d-M-Y') }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Pay to:</strong>
                            {{$approved_application_detail->account->account_title}}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Account info:</strong>
                            {{$approved_application_detail->account->account_type}}<br>
                            Account no.: {{$approved_application_detail->account->account_number}}<br>
                            @if($approved_application_detail->account->account_type == "BANK")
                            Bank name: {{$approved_application_detail->account->bank_name}}<br>
                            Branch name: {{$approved_application_detail->account->branch_name}}<br>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra_js')

@endsection
