@extends('layouts.dashboard_layout')
@section('custom_style')
    <style>
        .table-6 tbody th {
            width: 50%;
            margin: 0;
        }

        .table-12 tbody th {
            width: 30%;
            margin: 0;
        }

        @media (max-width: 768px) {
            .table-12 tbody th {
                width: 40%;
                margin: 0;
            }
        }

    </style>
@endsection


@section('content')
    <div class="container">
        <div class="main-body">

            {{-- <button class="btn btn-primary text-right mb-2">Download Profile</button> --}}
            <a class="btn btn-primary text-right mb-2" href="{{ route('pdf_student_profile', [$student_data->id]) }}"
                role="button">Download PDF</a>
            <button class="btn btn-primary mb-2" onclick="window.print()">Print Profile</button>
            {{-- <button >Print this page</button> --}}



            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{$user_data->photo_url != null ? url('storage/' . $user_data->photo_url) : asset('/assets/img/null/avatar.jpg') }}" alt="Shikkha Britti" class="rounded-circle" width="150">

                                <div class="mt-3">
                                    <h4 class="text-bold">{{ $student_data->name }}</h4>
                                    <p class="text-secondary mb-1">Scholarship Candidate</p>
                                    <p class="text-bold text-info">Student ID: {{ $student_data->sid }}</p>
                                    {{-- <button class="btn btn-primary">Download Profile</button> --}}
                                    {{-- <button class="btn btn-outline-primary">Message</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><i class="fas fa-phone pr-2"></i>Phone </h6>
                                <span class="text-secondary">{{ $student_data->phone }}</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><i class="far fa-envelope pr-2"></i>Email</h6>
                                <span class="text-secondary">{{ $student_data->email }}</span>
                            </li>


                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><i class="fa fa-table pr-2"></i>Date of Birth</h6>
                                <span
                                    class="text-secondary">{{ (new DateTime($student_data->dob))->format('d-M-Y') }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><i class="far fa-user pr-2"></i>Gender</h6>
                                <span class="text-secondary">{{ $student_data->gender }}</span>
                            </li>
                            @forelse($documents as $document)
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><i class="fas fa-file pr-2"></i>{{ $document->type }}
                                    </h6>
                                    {{-- <span class="text-secondary">{{ $student_data->aim_in_life }}</span> --}}
                                    <a href="{{ url('storage/uploaded_file/student_document/' . $document->document_url) }}"
                                        target="_blank">View/Download</a>
                                </li>
                            @empty
                            @endforelse


                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <h4 class="text-center mt-3 text-bold text-info">Educational information</h4>
                        <hr>
                        <div class="col-md-12">
                            <div class="row">

                                @if ($academic_data->ssc_gpa || $academic_data->hsc_gpa)
                                    <div class="col-md-6">
                                        <table class="table table-borderless table-sm table-6">

                                        @else
                                            <div class="col-md-12">
                                                <table class="table table-borderless table-sm table-12">
                                @endif


                                <tbody>
                                    <tr>
                                        <th scope="row">Education Level:</th>
                                        <td>{{ $academic_data->level }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Institution:</th>
                                        <td>{{ $academic_data->institution }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Class/Degree:</th>
                                        <td>{{ $academic_data->class_degree }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Semester:</th>
                                        <td>{{ $academic_data->semester }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Marks/GPA/CGPA:</th>
                                        <td>{{ $academic_data->marks_cgpa }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Class Position/ID:</th>
                                        <td>{{ $academic_data->position }}</td>
                                    </tr>
                                </tbody>

                                </table>
                            </div>

                            @if ($academic_data->ssc_gpa || $academic_data->ssc_year || $academic_data->hsc_gpa || $academic_data->hsc_year || $academic_data->bachelor_year || $academic_data->bachelor_cgpa)
                                <div class="col-md-6">
                                    <table class="table table-borderless table-sm table-6">

                                        <tbody>
                                            @if($academic_data->bachelor_year || $academic_data->bachelor_cgpa)
                                            <tr>
                                                <th scope="row">Bachelors Passing Year:</th>
                                                <td>{{ $academic_data->bachelor_year }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Institution Name:</th>
                                                <td>{{ $academic_data->bachelor_institution }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Subject:</th>
                                                <td>{{ $academic_data->bachelor_subject }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">CGPA:</th>
                                                <td>{{ $academic_data->bachelor_cgpa }}</td>
                                            </tr>                                          
                                            @endif

                                            @if($academic_data->hsc_gpa || $academic_data->hsc_year)
                                            <tr>
                                                <th scope="row">HSC Passing Year:</th>
                                                <td>{{ $academic_data->hsc_year }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Institution Name:</th>
                                                <td>{{ $academic_data->hsc_institution }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">GPA:</th>
                                                <td>{{ $academic_data->hsc_gpa }}</td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <th scope="row">SSC Passing Year:</th>
                                                <td>{{ $academic_data->ssc_year }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Institution Name:</th>
                                                <td>{{ $academic_data->ssc_institution }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">GPA:</th>
                                                <td>{{ $academic_data->ssc_gpa }}</td>
                                            </tr>
                                            
                                        </tbody>

                                    </table>
                                </div>
                            @endif
                            <div class="col-md-12">
                                <table class="table table-borderless table-sm table-12">

                                    <tbody>
                                        @forelse ($achievements as $achievement)
                                            @if ($achievement->achievement != null)
                                                <tr>
                                                    <th scope="row">Achievement {{ $loop->index + 1 }} :</th>
                                                    <td class="text-left">{{ $achievement->achievement }}</td>
                                                </tr>
                                            @endif
                                        @empty
                                        @endforelse
                                        <tr>
                                            <th scope="row">Ain in Life :</th>
                                            <td class="text-left">{{ $student_data->aim_in_life }}</td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <h4 class="text-center mt-3 text-bold text-info">Personal information</h4>
                    <hr>
                    <div class="col-md-12">

                        <table class="table table-borderless table-sm table-12">

                            <tbody>
                                <tr>
                                    <th scope="row">Father's Name:</th>
                                    <td>{{ $student_data->father_name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Father's Profession:</th>
                                    <td>{{ $student_data->father_profession }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Mother's Name:</th>
                                    <td>{{ $student_data->mother_name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Mother's Profession:</th>
                                    <td>{{ $student_data->mother_profession }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Siblings and their status :</th>
                                    <td>{{ $student_data->siblings }}</td>
                                </tr>

                            </tbody>

                        </table>

                    </div>
                </div>
                <div class="card mb-3">
                    <h4 class="text-center mt-3 text-bold text-info">Reference information</h4>
                    <hr>
                    <div class="col-md-12">

                        <table class="table table-borderless table-sm table-12">

                            <tbody>
                                <tr>
                                    <th scope="row">Reference Name:</th>
                                    <td>{{ $student_data->reference_name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Reference Profession:</th>
                                    <td>{{ $student_data->reference_profession }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Reference Contact No.</th>
                                    <td>{{ $student_data->reference_phone }}</td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="card mb-3">
                    <h4 class="text-center mt-3 text-bold text-info">Financial information</h4>
                    <hr>
                    <div class="col-md-12">
                        <table class="table table-borderless table-sm table-12">

                            <tbody>
                                <tr>
                                    <th scope="row">Family Income (Tk. Monthly):</th>
                                    <td>{{ $student_data->family_income }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Income Source:</th>
                                    <td>{{ $student_data->income_source }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Other Scholarship:</th>
                                    <td>{{ $student_data->other_scholarship }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Reason:</th>
                                    <td>{{ $student_data->reason }}</td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-borderless table-sm">

                                    <tbody>
                                        <tr>
                                            <h5 scope="row" class="mt-2 text-info">Present Address</h5>
                                            <hr>
                                        </tr>
                                        <tr>
                                            <th scope="row">Division:</th>
                                            <td>{{ $addresses_present->division }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">District:</th>
                                            <td>{{ $addresses_present->district }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Upazila:</th>
                                            <td>{{ $addresses_present->upazila }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Area:</th>
                                            <td>{{ $addresses_present->area }}</td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>

                            <div class="col-md-6">
                                <table class="table table-borderless table-sm">
                                    <tbody>
                                        <tr>
                                            <h5 scope="row" class="mt-2 text-info">Permanent Address</h5>
                                            <hr>
                                        </tr>
                                        @if ($addresses_present->same_as_present == 1)
                                            <tr>
                                                {{-- <th scope="row">Permanent Address:</th> --}}
                                                <th>Same as Present Address</th>
                                            </tr>
                                        @else
                                            <tr>
                                                <th scope="row">Division:</th>
                                                <td>{{ $addresses_permanent->division }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">District:</th>
                                                <td>{{ $addresses_permanent->district }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Upazila:</th>
                                                <td>{{ $addresses_permanent->upazila }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Area:</th>
                                                <td>{{ $addresses_permanent->area }}</td>
                                            </tr>
                                        @endif
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('extra_js')
@endsection
