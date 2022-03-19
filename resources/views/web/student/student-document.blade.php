@extends('layouts.web')

@section('custom_styles')
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">

@endsection

@section('content')

    <section class="page-title title-bg10">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>Student Documents</h2>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Documents</li>
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
                        <div class="job-style-two account-details">

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

                            <h5 class="text-center text-danger" style="margin-bottom: 30px;">Please upload the necessary
                                Documents </h5>
                            <div class="basic-info">
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <form method="POST" class="basic-info" action="{{ route('student_document_upload') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                                    <div class="dynm_field">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="type">Document Type <span class="text-danger font-weight-bold">*</span></label>
                                                    <select class="form-control" name="type" id="type" required>
                                                        <option value="">Select</option>
                                                        <option value="Birth Certificate/NID">Birth Certificate/NID</option>
                                                        <option value="Studentship Certificate">Studentship Certificate
                                                        </option>
                                                        <option value="SSC Certificate">SSC Certificate</option>
                                                        <option value="HSC Certificate">HSC Certificate</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Choose Document <span class="text-danger font-weight-bold">*</span></label>
                                                    <input type="file" id="document" name="document" class="form-control"
                                                        onchange="Filevalidation()" required>
                                                    <small class="">*Document format must be <span
                                                            class="text-danger">PDF/JPG/PNG/JPEG</span> and File Size max
                                                        <span class="text-danger">5MB</span></small>
                                                    <p id="size"></p>



                                                </div>
                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-danger">Upload Document</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><br>

                    <div class="row">
                        <section class="job-style-two job-list-section pt-50 pb-70">
                            <h2 class="text-center text-dark" style="margin-bottom: 30px;">Uploaded Documents</h2>
                            <div class="container">
                                @forelse ($documents as $document)
                                    <div class="job-card-two">
                                        <div class="row align-items-center">
                                            <div class="col-lg-8 col-md-6">
                                                <div class="job-info">
                                                    <h3><a href="{{ url('storage/uploaded_file/student_document/' . $document->document_url) }}"
                                                            target="_blank">{{ $loop->index + 1 }}.
                                                            {{ $document->type }}</a>
                                                    </h3>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6">
                                                <div class="job-info">

                                                    <button class="btn btn-secondary"><a class="text-light"
                                                            href="{{ url('storage/uploaded_file/student_document/' . $document->document_url) }}"
                                                            target="_blank" class="default-btn">View</a></button>

                                                    <button type="button" class="btn btn-danger delete_document_modal"
                                                        data-target="#delete_document_modal"
                                                        data-document_id="{{ $document->id }}">Delete</button>

                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <h5 class="text-center text-danger" style="margin-top: 30px;">No document found!</h5>
                                @endforelse

                            </div>
                        </section>
                    </div>
                </div>
            </div>
    </section>


    {{-- ------------------------Delete User Modal---------------------------- --}}
    <div class="modal fade" id="delete_document_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                            {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>



@endsection

@section('custom_js')
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    {{-- ------------Delete Payment Script-------------- --}}
    <script>
        $(document).on('click', '.delete_document_modal', function() {
            var document_id = $(this).attr('data-document_id');
            $('#document_id').val(document_id);
            $('#delete_document_modal').modal('show');
        });
    </script>
    <script>
        Filevalidation = () => {
            const fi = document.getElementById('document');
            // Check if any file is selected.
            if (fi.files.length > 0) {
                for (const i = 0; i <= fi.files.length - 1; i++) {

                    const fsize = fi.files.item(i).size;
                    const file = Math.round((fsize / 1024));
                    // The size of the file.
                    // if (file > 5120) {
                    //     alert(
                    //       "File is too Big, maximum upload limit 5MB");
                    // }
                    // else {   }

                    document.getElementById('size').innerHTML = '<b>' +
                        file + '</b> KB';

                }
            }
        }
    </script>




@endsection
