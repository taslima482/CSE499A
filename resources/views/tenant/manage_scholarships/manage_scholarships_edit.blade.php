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
                                <h1 class="h2 mb-0 text-gray-800 text-info font-weight-bold">Edit Scholarship</h1>
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
                    <form method="post" action="{{ route('manage_scholarships_update') }}">
                        @csrf
                        <input type="hidden" id="scholarship_id" name="scholarship_id" value="{{ $scholarship->id }}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="scholarship_title">Scholarship Title<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="scholarship_title" name="scholarship_title"
                                    placeholder="Enter Scholarship Title" autocomplete="off"
                                    value="{{ $scholarship->scholarship_title }}" required>
                            </div>

                            <div class="form-group">
                                <label>Level<span class="text-danger">*</span></label>
                                <select class="form-control" name="level" id="level" required>
                                    <option value="School">School</option>
                                    <option value="College">College</option>
                                    <option value="University/Diploma">University/Diploma</option>
                                    <option value="All">All</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="eligibility">Eligibility</label><span class="text-danger">*</span></label>
                                <textarea type="textarea" class="form-control" id="eligibility" name="eligibility"
                                    placeholder="Please write details eligibility..." maxlength="999"
                                    required>{{ $scholarship->eligibility }}</textarea>
                            </div>

                            <!-- select -->
                            <div class="form-group">
                                <label>Payment Type<span class="text-danger">*</span></label>
                                <select class="form-control" name="payment_type" id="payment_type" required>
                                    <option value="">Select</option>
                                    <option value="One Time">One Time</option>
                                    <option value="Monthly">Monthly</option>
                                    <option value="Yearly">Yearly</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="amount">Amount (Tk.)<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="amount" name="amount"
                                    placeholder="Enter amountin Tk." value="{{ $scholarship->amount }}">
                            </div>

                            

                            <div class="form-group">
                                <label>Application Deadline</label>
                                <input type="date" name="deadline" class="form-control"
                                    value="{{ (new DateTime($scholarship->deadline))->format('Y-m-d') }}" required>
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
    {{-- Alternative JS for picking OLD VALUES in dropdown --}}
    <script>
        $(window).on('load', function() {
            document.getElementById("level").value = "{{ $scholarship->level }}";
            document.getElementById("payment_type").value = "{{ $scholarship->payment_type }}";
        });
    </script>
@endsection
