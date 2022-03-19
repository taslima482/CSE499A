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
                                <h1 class="h2 mb-0 text-gray-800 text-info font-weight-bold">Approve Application</h1>
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
                    <form method="post" action="{{ route('manage_applications_approval') }}">
                        @csrf
                        <input type="hidden" id="student_id" name="student_id" value="{{ $student_data->id }}">
                        <input type="hidden" id="scholarship_id" name="scholarship_id"
                            value="{{ $scholarship_data->id }}">

                        <div class="card-body">
                            <div class="form-group">
                                <label for="scholarship_title">Applicant Name</label>
                                <input type="text" class="form-control" value="{{ $student_data->name }}"
                                    disabled="disabled">
                            </div>

                            <div class="form-group">
                                <label for="amount">Approved Amount(Tk.)</label>
                                <input type="number" class="form-control" id="approved_amount" name="approved_amount"
                                    placeholder="Enter amountin Tk." value="{{ $scholarship_data->amount }}">
                            </div>

                            <div class="form-group">
                                <label>From date<span class="text-danger">*</span></label>
                                <input type="date" name="from_date" class="form-control"
                                    value="{{ (new DateTime($scholarship_data->deadline))->format('Y-m-d') }}" required>
                            </div>

                            <div class="form-group">
                                <label>To date<span class="text-danger">*</span></label>
                                <input type="date" name="to_date" class="form-control" required>
                            </div>


                            <div class="form-group">
                                <label>Pay To<span class="text-danger">*</span></label>
                                <select class="form-control" name="pay_to" id="pay_to" required>
                                    <option value="">SELECT</option>
                                    @forelse ($payees as $payee)
                                        <option value={{ $payee }}>{{ $payee }}</option>
                                        {{-- <option value="MENTOR">Mentor Account</option> --}}
                                    @empty
                                    @endforelse
                                </select>
                            </div>

                            @forelse($account_details as $account_details)
                                <div id="student">
                                    <input type="hidden" name="account_id_student" id="account_id"
                                        value="{{ $account_details->id }}">

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Account Name: </strong>
                                            {{ $account_details->account_title }}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Account Number: </strong>
                                            ({{ $account_details->account_type }})
                                            {{ $account_details->account_number }}
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse


                            <div id="mentor">
                                <div class="form-group">
                                    <label>Mentor Name<span class="text-danger">*</span></label>
                                    <select class="form-control" name="account_id_mentor" id="mentor">
                                        <option value="">SELECT</option>
                                        @forelse($mentors as $mentor)
                                            <option value="{{ $mentor->mentor_active_account->id ?? null }}">
                                                {{ $mentor->user->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Approve</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('extra_js')
    <script>
        $("#pay_to").change(function() {

            if ($(this).val() == "STUDENT") {
                $('#student').show();
                $('#mentor').hide();
                // $("#st_account_title").prop("required", true);

            } else if ($(this).val() == "MENTOR") {
                $('#student').hide();
                $('#mentor').show();
                // this.getField("st_account_title").required = true;

            } else {
                $('#student').hide();
                $('#mentor').hide();
            }
        });
        $("#pay_to").trigger("change");
    </script>
@endsection
