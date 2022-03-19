@extends('layouts.dashboard_layout')
@section('custom_style')
@endsection

@section('page_errors')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
                                <h1 class="h2 mb-0 text-gray-800 text-info font-weight-bold">Edit Account</h1>
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
                    <form method="post" action="{{ route('manage_mentor_accounts_update') }}">
                        @csrf
                        <input type="hidden" id="account_id" name="account_id" value="{{ $account_details->id }}">
                        <input type="hidden" id="mentor_id" name="mentor_id"
                            value="{{ $account_details->accountable_id }}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="account_title">Account Title<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="account_title" name="account_title"
                                    placeholder="Enter Account Title" value="{{ $account_details->account_title }}"
                                    required>
                            </div>

                            <!-- select -->
                            <div class="form-group">
                                <label for="account_type">Account Type<span class="text-danger">*</span></label>
                                <select class="form-control" name="account_type" id="account_type" required>
                                    @forelse($account_types as $account_type)
                                        <option value="{{ $account_type }}">{{ $account_type }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="account_number">Account Number<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="account_number" name="account_number"
                                    placeholder="Enter Account No." value="{{ $account_details->account_number }}"
                                    required>
                            </div>
                            <div class="form-group" id="bank_name">
                                <label for="bank_name">Bank Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="bank_name" name="bank_name"
                                    placeholder="Enter Bank Name" value="{{ $account_details->bank_name }}">
                            </div>
                            <div class="form-group" id="branch_name">
                                <label for="branch_name">Branch Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="branch_name" name="branch_name"
                                    placeholder="Enter Branch Name" value="{{ $account_details->branch_name }}">
                            </div>

                            <div class="form-group">
                                <label for="note">Note</label>
                                <textarea type="textarea" class="form-control" id="note" name="note"
                                    placeholder="Self/ Father's account/ Mother's account..."
                                    maxlength="999">{{ $account_details->note }}</textarea>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra_js')
    <script src="{{ asset('assets/js/mentor-student-payment-types.js') }}"></script>

    <script>
        $(window).on('load', function() {
            document.getElementById("account_type").value = "{{ $account_details->account_type }}";
        });
    </script>
@endsection
