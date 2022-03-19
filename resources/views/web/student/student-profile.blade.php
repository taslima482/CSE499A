@extends('layouts.web')

@section('custom_styles')

@endsection

@section('content')

    <section class="page-title title-bg8">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>Candidate Details</h2>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Candidate Details</li>
                </ul>
            </div>
        </div>
        <div class="lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </section>


    <section class="candidate-details  resume-section pt-100 pb-100">
        <div class="container">
            <div class="row">


                {{-- Student Dashboard Section --}}
                @include('web.student.sidebar-menu')
                {{-- Student Dashboard Section --}}


                <div class="col-lg-8">
                    @include('include.messages')

                    {{-- <div class="candidate-info-text">
                        <h3>About Me</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                            but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                    </div> --}}
                    <div class="candidate-info-text candidate-education">
                        <h3><i class='bx bx-user-circle candidate-heading'></i> Personal Information</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="education-info">
                                    <h4>Full Name</h4>
                                    <p>{{ $student_data->name }}</p>
                                    {{-- <span>2000-2010</span> --}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="education-info">
                                    <h4>Email</h4>
                                    <p>{{ $student_data->email }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="education-info">
                                    <h4>Phone</h4>
                                    <p>{{ $student_data->phone }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="education-info">
                                    <h4>Date of Birth</h4>
                                    <p>{{ (new DateTime($student_data->dob))->format('d-M-Y') }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="education-info">
                                    <h4>Father's Name</h4>
                                    <p>{{ $student_data->father_name }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="education-info">
                                    <h4>Father's Profession</h4>
                                    <p>{{ $student_data->father_profession }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="education-info">
                                    <h4>Mother's Name</h4>
                                    <p>{{ $student_data->mother_name }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="education-info">
                                    <h4>Mother's Profession</h4>
                                    <p>{{ $student_data->mother_profession }}</p>
                                </div>
                            </div>
                            @if ($student_data->siblings)
                                <div class="col-md-12">
                                    <div class="education-info">
                                        <h4>Siblings and their status</h4>
                                        <p>{{ $student_data->siblings }}</p>
                                    </div>
                                </div>
                            @endif
                            @if ($student_data->aim_in_life)
                                <div class="col-md-12">
                                    <div class="education-info">
                                        <h4>Aim in Life</h4>
                                        <p>{{ $student_data->aim_in_life }}</p>
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-6">
                                <div class="education-info">
                                    <h4>Gender</h4>
                                    <p>{{ $student_data->gender }}</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="candidate-info-text candidate-education">
                        <h3><i class='bx bx-link candidate-heading'></i> Reference Information</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="education-info">
                                    <h4>Reference Name</h4>
                                    <p>{{ $student_data->reference_name }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="education-info">
                                    <h4>Reference Profession</h4>
                                    <p>{{ $student_data->reference_profession }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="education-info">
                                    <h4>Reference Contact No.</h4>
                                    <p>{{ $student_data->reference_phone }}</p>
                                </div>
                            </div>
                            {{-- @if ($academic_data->position)
                                <div class="col-md-6">
                                    <div class="education-info">
                                        <h4>Position</h4>
                                        <p>{{ $academic_data->position }}</p>
                                    </div>
                                </div>
                            @endif --}}

                        </div>
                    </div>

                    <div class="candidate-info-text candidate-education">
                        <h3><i class='bx bx-money candidate-heading'></i> Financial Information</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="education-info">
                                    <h4>Family Income (Tk. Monthly)</h4>
                                    <p>{{ $student_data->family_income }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="education-info">
                                    <h4>Income Source</h4>
                                    <p>{{ $student_data->income_source }}</p>
                                </div>
                            </div>
                            @if ($student_data->other_scholarship)
                                <div class="col-md-12">
                                    <div class="education-info">
                                        <h4>Other Scholarship</h4>
                                        <p>{{ $student_data->other_scholarship }}</p>
                                    </div>
                                </div>
                            @endif

                            <div class="col-md-12">
                                <div class="education-info">
                                    <h4>Reason</h4>
                                    <p>{{ $student_data->reason }}</p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="candidate-info-text candidate-education">
                        <h3><i class='bx bx-book-reader candidate-heading'></i> Educational Information</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="education-info">
                                    <h4>Level</h4>
                                    <p>{{ $academic_data->level }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="education-info">
                                    <h4>Institution</h4>
                                    <p>{{ $academic_data->institution }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="education-info">
                                    <h4>Class / Degree</h4>
                                    <p>{{ $academic_data->class_degree }}</p>
                                    @if ($academic_data->semester)
                                        <span>{{ $academic_data->semester }} Semester</span>
                                    @endif
                                </div>
                            </div>
                            @if ($academic_data->position)
                                <div class="col-md-6">
                                    <div class="education-info">
                                        <h4>Position</h4>
                                        <p>{{ $academic_data->position }}</p>
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-6">
                                <div class="education-info">
                                    <h4>Marks/GPA/CGPA</h4>
                                    <p>{{ $academic_data->marks_cgpa }}</p>
                                </div>
                            </div>
                            @if ($academic_data->bachelor_year)
                                <div class="col-md-6">
                                    <div class="education-info">
                                        <h4>Bachelors Passing Year</h4>
                                        <p>{{ $academic_data->bachelor_year }}</p>
                                    </div>
                                </div>
                            @endif
                            @if ($academic_data->bachelor_institution)
                                <div class="col-md-6">
                                    <div class="education-info">
                                        <h4>Bachelors Institution Name</h4>
                                        <p>{{ $academic_data->bachelor_institution }}</p>
                                    </div>
                                </div>
                            @endif
                            @if ($academic_data->bachelor_subject)
                                <div class="col-md-6">
                                    <div class="education-info">
                                        <h4>Bachelors Subject</h4>
                                        <p>{{ $academic_data->bachelor_subject }}</p>
                                    </div>
                                </div>
                            @endif
                            @if ($academic_data->bachelor_cgpa)
                                <div class="col-md-6">
                                    <div class="education-info">
                                        <h4>Bachelors CGPA</h4>
                                        <p>{{ $academic_data->bachelor_cgpa }}</p>
                                    </div>
                                </div>
                            @endif
                            @if ($academic_data->hsc_year)
                                <div class="col-md-6">
                                    <div class="education-info">
                                        <h4>HSC Passing Year</h4>
                                        <p>{{ $academic_data->hsc_year }}</p>
                                    </div>
                                </div>
                            @endif
                            @if ($academic_data->hsc_institution)
                                <div class="col-md-6">
                                    <div class="education-info">
                                        <h4>HSC Institution Name</h4>
                                        <p>{{ $academic_data->hsc_institution }}</p>
                                    </div>
                                </div>
                            @endif
                            @if ($academic_data->hsc_gpa)
                                <div class="col-md-6">
                                    <div class="education-info">
                                        <h4>HSC GPA</h4>
                                        <p>{{ $academic_data->hsc_gpa }}</p>
                                    </div>
                                </div>
                            @endif
                            @if ($academic_data->ssc_year)
                                <div class="col-md-6">
                                    <div class="education-info">
                                        <h4>SSC Passing Year</h4>
                                        <p>{{ $academic_data->ssc_year }}</p>
                                    </div>
                                </div>
                            @endif
                            @if ($academic_data->ssc_institution)
                                <div class="col-md-6">
                                    <div class="education-info">
                                        <h4>SSC Institution Name</h4>
                                        <p>{{ $academic_data->ssc_institution }}</p>
                                    </div>
                                </div>
                            @endif
                            @if ($academic_data->ssc_gpa)
                                <div class="col-md-6">
                                    <div class="education-info">
                                        <h4>SSC GPA</h4>
                                        <p>{{ $academic_data->ssc_gpa }}</p>
                                    </div>
                                </div>
                            @endif
                            
                            @forelse ($achievements as $achievement)
                                <div class="col-md-6">
                                    <div class="education-info">
                                        <h4>Achievement {{ $loop->index + 1 }}</h4>
                                        <p>{{ $achievement->achievement }}</p>
                                    </div>
                                </div>
                            @empty
                            @endforelse

                        </div>
                    </div>

                    <div class="candidate-info-text candidate-education">
                        <h3><i class='bx bx-home candidate-heading'></i> Present Address</h3>
                        @forelse ($addresses_present as $address)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="education-info">
                                        <h4>Division</h4>
                                        <p>{{ $address->division }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="education-info">
                                        <h4>District</h4>
                                        <p>{{ $address->district }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="education-info">
                                        <h4>Upazila</h4>
                                        <p>{{ $address->upazila }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="education-info">
                                        <h4>Area</h4>
                                        <p>{{ $address->area }}</p>
                                    </div>
                                </div>
                            </div>


                            <h3><i class='bx bx-home candidate-heading'></i> Permanent Address</h3>
                            @if ($address->same_as_present == 1)
                                <div class="col-md-6">
                                    <div class="education-info">
                                        <h4>Same as Present Address</h4>
                                    </div>
                                </div>
                            @endif
                        @empty
                        @endforelse


                        @forelse ($addresses_permanent as $address)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="education-info">
                                        <h4>Division</h4>
                                        <p>{{ $address->division }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="education-info">
                                        <h4>District</h4>
                                        <p>{{ $address->district }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="education-info">
                                        <h4>Upazila</h4>
                                        <p>{{ $address->upazila }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="education-info">
                                        <h4>Area</h4>
                                        <p>{{ $address->area }}</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse

                    </div>
                    <div class="col-md-12">
                        <a href="{{ route('student_edit', ['student_id' => $student_data->id]) }}"><button type="submit"
                                class="profile-btn"><i class="bx bxs-edit"></i> Edit</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="subscribe-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="section-title">
                        <h2>Get New Scholarship Notifications</h2>
                        <p>Subscribe & get all related scholarships notification</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <form class="newsletter-form" data-toggle="validator">
                        <input type="email" class="form-control" placeholder="Enter your email" name="EMAIL" required
                            autocomplete="off">
                        <button class="default-btn sub-btn" type="submit">
                            Subscribe
                        </button>
                        <div id="validator-newsletter" class="form-result"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('custom_js')

@endsection
