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
                            <h3 class="m-4">Edit Account Information</h3>


                            <div class="candidate-education">
                                <form method="post" action="{{ route('student_account_update') }}">
                                    @csrf
                                    <input type="hidden" name="account_id" value="{{ $account_details->id }}">
            
                                    <div class="card-body label-bold">
                                        <div class="mb-3" class="col-form-label">
                                            <label for="account_title">Account Title<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="account_title" name="account_title"
                                                placeholder="Enter Account Title" value="{{ $account_details->account_title }}"
                                                required>
                                        </div>
            
                                        <!-- select -->
                                        <div class="mb-3" class="col-form-label">
                                            <label for="account_type">Account Type<span class="text-danger">*</span></label>
                                            <select class="form-control" name="account_type" id="edit_account_type" required>
                                                @forelse($account_types as $account_type)
                                                    <option value="{{ $account_type }}">{{ $account_type }}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
            
                                        <div class="mb-3" class="col-form-label">
                                            <label for="account_number">Account Number<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="account_number" name="account_number"
                                                placeholder="Enter Account No." value="{{ $account_details->account_number }}"
                                                required>
                                        </div>
            
                                        <div class="mb-3" id="edit_bank_name" class="col-form-label">
                                            <label for="bank_name">Bank Name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="bank_name" name="bank_name"
                                                placeholder="Enter Bank Name" value="{{ $account_details->bank_name }}">
                                        </div>
            
                                        <div class="mb-3" id="edit_branch_name" class="col-form-label">
                                            <label for="branch_name">Branch Name<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="branch_name" name="branch_name"
                                                placeholder="Enter Branch Name" value="{{ $account_details->branch_name }}">
                                        </div>
            
            
                                        <div class="form-group">
                                            <label for="note">Note</label></label>
                                            <textarea type="textarea" class="form-control" id="note" name="note"
                                                placeholder="Self/ Father's account/ Mother's account..."
                                                maxlength="999">{{ $account_details->note }}" </textarea>
                                        </div>
            
            
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    

    {{-- ------------------------Edit account Modal------------------------- --}}
    <div class="modal fade" id="edit_account_modal" tabindex="-1" aria-labelledby="edit_account_modalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_account_modal">New Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('student_account_update') }}">
                        @csrf
                        <input type="hidden" name="account_id" value="{{ $account_details->id }}">

                        <div class="card-body label-bold">
                            <div class="mb-3" class="col-form-label">
                                <label for="account_title">Account Title<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="account_title" name="account_title"
                                    placeholder="Enter Account Title" value="{{ $account_details->account_title }}"
                                    required>
                            </div>

                            <!-- select -->
                            <div class="mb-3" class="col-form-label">
                                <label for="account_type">Account Type<span class="text-danger">*</span></label>
                                <select class="form-control" name="account_type" id="edit_account_type" required>
                                    @forelse($account_types as $account_type)
                                        <option value="{{ $account_type }}">{{ $account_type }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>

                            <div class="mb-3" class="col-form-label">
                                <label for="account_number">Account Number<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="account_number" name="account_number"
                                    placeholder="Enter Account No." value="{{ $account_details->account_number }}"
                                    required>
                            </div>

                            <div class="mb-3" id="edit_bank_name" class="col-form-label">
                                <label for="bank_name">Bank Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="bank_name" name="bank_name"
                                    placeholder="Enter Bank Name" value="{{ $account_details->bank_name }}">
                            </div>

                            <div class="mb-3" id="edit_branch_name" class="col-form-label">
                                <label for="branch_name">Branch Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="branch_name" name="branch_name"
                                    placeholder="Enter Branch Name" value="{{ $account_details->branch_name }}">
                            </div>


                            <div class="form-group">
                                <label for="note">Note</label></label>
                                <textarea type="textarea" class="form-control" id="note" name="note"
                                    placeholder="Self/ Father's account/ Mother's account..."
                                    maxlength="999">{{ $account_details->note }}" </textarea>
                            </div>


                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
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
    <script>
        $(window).on('load', function() {
            document.getElementById("edit_account_type").value = "{{ $account_details->account_type }}";
        });
    </script>

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
