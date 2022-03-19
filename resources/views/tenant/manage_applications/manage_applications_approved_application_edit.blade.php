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
                                <h1 class="h2 mb-0 text-gray-800 text-info font-weight-bold">Approved Application Edit</h1>
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
                    <form method="post" action="{{ route('manage_applications_approved_update') }}">
                        @csrf
                        <input type="hidden" class="form-control" name="approved_app_id" value="{{ $approved_application->id }}">

                        <div class="card-body">
                            <div class="form-group">
                                <label for="scholarship_title">Applicant Name</label>
                                <input type="text" class="form-control"
                                    value="{{ $approved_application->student->name }}" disabled="disabled">
                            </div>

                            <div class="form-group">
                                <label for="amount">Approved Amount(Tk.)</label>
                                <input type="number" class="form-control" id="approved_amount" name="approved_amount"
                                    placeholder="Enter amountin Tk." value="{{ $approved_application->approved_amount }}">
                            </div>

                            <div class="form-group">
                                <label>From date<span class="text-danger">*</span></label>
                                <input type="date" name="from_date" class="form-control"
                                    value="{{ (new DateTime($approved_application->from_date))->format('Y-m-d') }}"
                                    required>
                            </div>

                            <div class="form-group">
                                <label>To date<span class="text-danger">*</span></label>
                                <input type="date" name="to_date" class="form-control"
                                    value="{{ (new DateTime($approved_application->to_date))->format('Y-m-d') }}"
                                    required>
                            </div>
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
