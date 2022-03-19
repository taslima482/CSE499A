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
                                <h1 class="h2 mb-0 text-gray-800 text-info font-weight-bold">Add New Mentor</h1>
                                <a href="{{ route('dashboard') }}"
                                    class="d-sm-inline-block btn-sm btn-danger shadow-sm"><i
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
                    <form method="post" action="{{ route('manage_mentors.store')}}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Mentor Name<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter Mentor Name" required>
                            </div>

                            <!-- select -->
                            <div class="form-group">
                                <label>Phone Number<span class="text-danger">*</span></label>
                                <input type="phone" pattern="[0]+[1]+[7/8/9/6/5/4/3]+[0-9]{8}" name="phone"
                                            class="form-control" placeholder="Enter Valid Phone Number" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password <span class="text-danger font-weight-bold">*</span></label>
                                <input id="password" type="password" class="form-control" name="password"
                                    required autocomplete="password" placeholder="Enter Password">
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label><span class="text-danger">*</span></label>
                                <textarea type="textarea" class="form-control" id="address" name="address"
                                    placeholder="Enter address..." required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="profession">Profession<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="profession" name="profession"
                                    placeholder="Enter profession" required>
                            </div>

                            <!-- select -->
                            {{-- <div class="form-group">
                                <label>Payment Type<span class="text-danger">*</span></label>
                                <select class="form-control" name="payment_type" id="payment_type" required>
                                    <option value="">Select</option>
                                    <option value="One Time">One Time</option>
                                    <option value="Monthly">Monthly</option>
                                    <option value="Yearly">Yearly</option>
                                </select>
                            </div> --}}

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('extra_js')
@endsection
