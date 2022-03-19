@extends('layouts.web')

@section('custom_styles')
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <style>
        .label-bold label {
            font-weight: bold;
        }

    </style>


@endsection

@section('content')

    <section class="page-title title-bg10">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>Student Account</h2>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Account</li>
                </ul>
            </div>
        </div>
        <div class="lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </section>

    <section class="account-section ptb-100">

        <div class="container">
            <div class="row">
                {{-- Student Dashboard Section --}}
                @include('web.student.sidebar-menu')
                {{-- Student Dashboard Section --}}


                <div class="col-md-8">

                    <div class="row">
                        <div class="job-style-two ">

                            <div class="display-message">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                            </div>


                            @include('include.messages')

                            {{-- <h5 class="text-center text-danger" style="margin-bottom: 30px;">Please upload the necessary
                                Documents </h5> --}}
                            <h3 class="m-4">Account Information</h3>


                            <div class="candidate-info-text candidate-education">
                                @forelse($account_details as $account_details)

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="education-info">
                                                <h4>Account Title</h4>
                                                <p>{{ $account_details->account_title }}</p>
                                                {{-- <span>2000-2010</span> --}}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="education-info">
                                                <h4>Account Type</h4>
                                                <p>{{ $account_details->account_type }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="education-info">
                                                <h4>Account Number</h4>
                                                <p>{{ $account_details->account_number }}</p>
                                            </div>
                                        </div>

                                        @if ($account_details->bank_name)
                                            <div class="col-md-6">
                                                <div class="education-info">
                                                    <h4>Bank Name</h4>
                                                    <p>{{ $account_details->bank_name }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="education-info">
                                                    <h4>Branch Name</h4>
                                                    <p>{{ $account_details->branch_name }}</p>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="col-md-6">
                                            <div class="education-info">
                                                <h4>Note</h4>
                                                <p>{{ $account_details->note }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-12">
                                        {{-- <button type="button" class="btn btn-danger edit_account_modal"
                                            data-target="#edit_account_modal"
                                            data-document_id="{{ $student_data->id }}">Edit</button> --}}

                                        <a href="{{ route('student_account_edit',$account_details->id) }}" type="button" class="btn btn-primary">Edit</a>

                                    </div>
                                @empty
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal"><i class="fas fa-university"></i> Create New
                                        Account</button>
                                    <br><br>
                                    <h3 class="text-danger mt-4"> Sorry! No account found.</h3>

                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>


    {{-- ------------------------Create account Modal------------------------- --}}

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('student_account_store') }}">
                        @csrf
                        <input type="hidden" name="student_id" value="{{ $student_data->id }}">

                        <div class="card-body sadi">
                            <div class="mb-3" class="col-form-label">
                                <label for="account_title">Account Title<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="account_title" name="account_title"
                                    placeholder="Enter Account Title" required>
                            </div>

                            <!-- select -->
                            <div class="mb-3" class="col-form-label">
                                <label for="account_type">Account Type<span class="text-danger">*</span></label>
                                <select class="form-control" name="account_type" id="account_type" required>
                                    @forelse($account_types as $account_type)
                                        <option value="{{ $account_type }}">{{ $account_type }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>

                            <div class="mb-3" class="col-form-label">
                                <label for="account_number">Account Number<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="account_number" name="account_number"
                                    placeholder="Enter Account No." required>
                            </div>

                            <div class="mb-3" id="bank_name" class="col-form-label">
                                <label for="bank_name">Bank Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="bank_name" name="bank_name"
                                    placeholder="Enter Bank Name">
                            </div>

                            <div class="mb-3" id="branch_name" class="col-form-label">
                                <label for="branch_name">Branch Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="branch_name" name="branch_name"
                                    placeholder="Enter Branch Name">
                            </div>


                            <div class="form-group">
                                <label for="note">Note</label></label>
                                <textarea type="textarea" class="form-control" id="note" name="note"
                                    placeholder="Self/ Father's account/ Mother's account..." maxlength="999"></textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


   


    {{-- ------------------------Delete User Modal------------------------- --}}
    {{-- <div class="modal fade" id="delete_document_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">ATTENTION!!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('student_document_delete') }}" method="POST">
                        @csrf
                        <div class="text-center my-3">
                            <i class="fas fa-trash fa-4x text-danger" aria-hidden="true"></i>
                        </div>
                        <div class="text-center display-5 font-weight-bold">
                            Are You Sure ?
                        </div>

                        <input type="hidden" id="document_id" name="document_id" value="">
                        <div class="modal-footer justify-content-center">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}


@endsection

@section('custom_js')
    <script src="{{ asset('assets/js/mentor-student-payment-types.js') }}"></script>


    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>

    {{-- ------------Delete Payment Script-------------- --}}
    <script>
        $(document).on('click', '.delete_document_modal', function() {
            var document_id = $(this).attr('data-document_id');
            $('#document_id').val(document_id);
            $('#delete_document_modal').modal('show');
        });
    </script>
@endsection
