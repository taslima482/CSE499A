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
                                <h1 class="h2 mb-0 text-gray-800 text-info font-weight-bold">Statement data Edit</h1>
                                <a href="{{ url()->previous() }}"
                                    class="d-none d-sm-inline-block btn-sm btn-danger shadow-sm"><i
                                        class="fa fa-backward mr-2"></i>
                                    Back
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
                    <form method="post" action="{{ route('manage_statement_update') }}">
                        @csrf
                        <input type="hidden" class="form-control" name="statement_id" value="{{ $statement->id }}">

                        <div class="card-body">
                            <div class="form-group">
                                <label for="scholarship_title">Applicant Name</label>
                                <input type="text" class="form-control" value="{{ $statement->student->name }}"
                                    disabled="disabled">
                            </div>

                            <div class="form-group">
                                <label for="amount">Approved Amount(Tk.)</label><span class="text-danger">*</span>
                                <input type="number" class="form-control" id="approved_amount" name="approved_amount"
                                    placeholder="Enter amountin Tk." value="{{ $statement->approved_amount }}">
                            </div>

                            <div class="form-group">
                                <label for="payment_status">Payment Status<span class="text-danger">*</span></label>
                                <select class="form-control" name="payment_status" id="payment_status" required>
                                    <option value="">SELECT</option>
                                    @forelse ($payment_status as $payment_status)
                                    <option value={{$payment_status}}>{{$payment_status}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="note">Note</label>
                                <textarea type="textarea" class="form-control" id="note" name="note" placeholder="" maxlength="500">{{ $statement->note }}</textarea>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->


            </div>

        </div>
    </div>
    </div>
@endsection

@section('extra_js')
    {{-- Alternative JS for picking OLD VALUES in dropdown --}}
    <script>
        $(window).on('load', function() {
            document.getElementById("payment_status").value = "{{ $statement->status }}";
        });
    </script>
@endsection
