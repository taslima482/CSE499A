@extends('layouts.web')

@section('custom_styles')
    <link href="{{ asset('assets/css/bs-datepicker.min.css') }}" rel="stylesheet">
@endsection


@section('content')
    <section class="page-title title-bg10">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>Update Information</h2>
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
                    <div class="account-details">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif

                        <h3>Basic Information</h3>
                        <form class="basic-info" action="{{ route('student_update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="student_id" value="{{ $student_data->id }}">
                            <input type="hidden" name="degrees_id" value="{{ $academic_data->id }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Your Full Name <span class="text-danger font-weight-bold">*</span></label>
                                        <input type="text" name="name" class="form-control" placeholder="Your Name"
                                            value="{{ $student_data->name }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Your Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Your Email"
                                            value="{{ $student_data->email }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Your Phone <span class="text-danger font-weight-bold">*</span></label>
                                        <input type="phone" pattern="[0]+[1]+[7/8/9/6/5/4/3]+[0-9]{8}" name="phone"
                                            class="form-control" placeholder="Your Phone"
                                            value="{{ $student_data->phone }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date of Birth <span class="text-danger font-weight-bold">*</span></label>
                                        <input type="date" name="dob" class="form-control"
                                            value="{{ (new DateTime($student_data->dob))->format('Y-m-d') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Father's Name <span class="text-danger font-weight-bold">*</span></label>
                                        <input type="text" name="father_name" class="form-control"
                                            placeholder="Your Father's Name" value="{{ $student_data->father_name }}"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Father's Profession <span
                                                class="text-danger font-weight-bold">*</span></label>
                                        <input type="text" name="father_profession" class="form-control"
                                            placeholder="Your Father's Profession"
                                            value="{{ $student_data->father_profession }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mother's Name <span class="text-danger font-weight-bold">*</span></label>
                                        <input type="text" name="mother_name" class="form-control"
                                            placeholder="Your Mother's Profession"
                                            value="{{ $student_data->mother_name }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mother's Profession <span
                                                class="text-danger font-weight-bold">*</span></label>
                                        <input type="text" name="mother_profession" class="form-control"
                                            placeholder="Your Mother's Name"
                                            value="{{ $student_data->mother_profession }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Siblings and their status (if any)</label>
                                        <textarea name="siblings" class="form-control" placeholder="Write details"
                                            maxlength="999"
                                            style="max-height: 80px; height: 80px">{{ $student_data->siblings }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Your Aim in Life <span class="text-danger font-weight-bold">*</span></label>
                                        <textarea name="aim_in_life" class="form-control" placeholder="Write details"
                                            maxlength="999" style="max-height: 80px; height: 80px"
                                            required>{{ $student_data->aim_in_life }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gender">Gender <span
                                                class="text-danger font-weight-bold">*</span></label>
                                        <select class="form-control" name="gender" id="gender" required>
                                            {{-- <option value="">Select</option> --}}
                                            <option value="Male"
                                                {{ old('gender', $student_data->gender) == 'Male' ? 'selected' : '' }}>
                                                Male</option>
                                            <option value="Female"
                                                {{ old('gender', $student_data->gender) == 'Female' ? 'selected' : '' }}>
                                                Female</option>
                                            <option value="Other"
                                                {{ old('gender', $student_data->gender) == 'Other' ? 'selected' : '' }}>
                                                Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <h3>Current Academic information</h3>
                            <div class="row dynm_field">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="level">Level <span class="text-danger font-weight-bold">*</span></label>
                                        <select class="form-control" name="level" id="level" required>
                                            {{-- <option value="">Select</option> --}}
                                            <option value="School"
                                                {{ old('level', $academic_data->level) == 'School' ? 'selected' : '' }}>
                                                School</option>
                                            <option value="College"
                                                {{ old('level', $academic_data->level) == 'College' ? 'selected' : '' }}>
                                                College</option>
                                            <option value="Diploma"
                                                {{ old('level', $academic_data->level) == 'Diploma' ? 'selected' : '' }}>
                                                Diploma</option>
                                            <option value="Bachelors"
                                                {{ old('level', $academic_data->level) == 'Bachelors' ? 'selected' : '' }}>
                                                Bachelors</option>
                                            <option value="Masters"
                                                {{ old('level', $academic_data->level) == 'Masters' ? 'selected' : '' }}>
                                                Masters</option>
                                            {{-- @forelse($degree_levels as $degree_level)
                                                <option value="{{ $degree_level }}">{{ $degree_level }}</option>
                                            @empty
                                            @endforelse --}}
                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6" id="school">
                                    <div class="form-group">
                                        <label for="class_degree">Select Class<span
                                                class="text-danger font-weight-bold">*</span></label>
                                        <select class="form-control" name="class_degree_sch" id="class_degree_sch">
                                            {{-- <option value="">Select</option> --}}
                                            @forelse($class_school as $class_school)
                                                <option value="{{ $class_school }}">{{ $class_school }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6" id="college">
                                    <div class="form-group">
                                        <label for="class_degree">Select Class<span
                                                class="text-danger font-weight-bold">*</span></label>
                                        <select class="form-control" name="class_degree_col" id="class_degree_col">
                                            {{-- <option value="">Select</option> --}}
                                            {{-- <option value="Class-11">Class-11</option>
                                            <option value="Class-12">Class-12</option> --}}
                                            @forelse($class_college as $class_college)
                                                <option value="{{ $class_college }}">{{ $class_college }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6" id="university">
                                    <div class="form-group">
                                        <label for="class_degree">Degree Year<span
                                                class="text-danger font-weight-bold">*</span></label>
                                        <select class="form-control" name="class_degree_uni" id="class_degree_uni">
                                            {{-- <option value="">Select</option> --}}
                                            @forelse($class_uni as $class_uni)
                                                <option value="{{ $class_uni }}">{{ $class_uni }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="institution">Institution <span
                                                class="text-danger font-weight-bold">*</span></label>
                                        <input type="text" name="institution" class="form-control"
                                            placeholder="Your Institution" id="institution"
                                            value="{{ $academic_data->institution }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6" id="position">
                                    <div class="form-group">
                                        <label>Class Position/Roll/ID <span
                                                class="text-danger font-weight-bold">*</span></label>
                                        <input type="text" name="position" class="form-control"
                                            placeholder="Your Class Position" value="{{ $academic_data->position }}"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Marks/GPA/CGPA <span class="text-danger font-weight-bold">*</span></label>
                                        <input type="number" step=0.01 name="marks_cgpa" class="form-control"
                                            placeholder="CGPA" value="{{ $academic_data->marks_cgpa }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Semester</label>
                                        <input type="text" name="semester" class="form-control" placeholder="Semester"
                                            value="{{ $academic_data->semester }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Year <span class="text-danger font-weight-bold">*</span></label>
                                        <input type="text" class="form-control" name="year" id="datepicker"
                                            value="{{ $academic_data->year }}" required />

                                    </div>
                                </div>

                                <div class="" id="bachelor_next">
                                    <hr style="height:2px;border-width:0;">
                                </div>
                                <div class="col-md-6" id="bachelor_year">
                                    <div class="form-group">
                                        <label>Bachelors Passing Year</label>
                                        <input type="text" class="form-control" name="bachelor_year" id="datepicker-3" value="{{ $academic_data->bachelor_year }}" />
                                    </div>
                                </div>
                                <div class="col-md-6" id="bachelor_institution">
                                    <div class="form-group">
                                        <label>Institution Name</label>
                                        <input type="text" name="bachelor_institution" class="form-control"
                                            placeholder="Bachelors Institution Name" id="bachelor_institution" value="{{ $academic_data->bachelor_institution }}">
                                    </div>
                                </div>
                                <div class="col-md-6" id="bachelor_subject">
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input type="text" name="bachelor_subject" class="form-control"
                                            placeholder="Bachelors Subject" id="bachelor_subject" value="{{ $academic_data->bachelor_subject }}">
                                    </div>
                                </div>
                                <div class="col-md-6" id="bachelor_cgpa">
                                    <div class="form-group">
                                        <label>CGPA</label>
                                        <input type="number" step=0.01 name="bachelor_cgpa" class="form-control"
                                            placeholder="Bachelors CGPA" value="{{ $academic_data->bachelor_cgpa }}">
                                    </div>
                                </div>
                                
                                <div class="" id="hsc_next">
                                    <hr style="height:2px;border-width:0;">
                                </div>
                                <div class="col-md-6" id="hsc_year">
                                    <div class="form-group">
                                        <label>HSC Passing Year</label>
                                        <input type="text" class="form-control" name="hsc_year" id="datepicker-2"
                                            value="{{ $academic_data->hsc_year }}" />
                                    </div>
                                </div>
                                <div class="col-md-6" id="hsc_institution">
                                    <div class="form-group">
                                        <label>HSC Institution Name</label>
                                        <input type="text" name="hsc_institution" class="form-control"
                                            placeholder="HSC Institution Name" id="hsc_institution"
                                            value="{{ $academic_data->hsc_institution }}">
                                    </div>
                                </div>
                                <div class="col-md-6" id="hsc_gpa">
                                    <div class="form-group">
                                        <label>HSC GPA</label>
                                        <input type="number" step=0.01 name="hsc_gpa" class="form-control"
                                            placeholder="HSC GPA" value="{{ $academic_data->hsc_gpa }}">
                                    </div>
                                </div>

                                <div class="" id="ssc_next">
                                    <hr style="height:2px;border-width:0;">
                                </div>
                                <div class="col-md-6" id="ssc_year">
                                    <div class="form-group">
                                        <label>SSC Passing Year</label>
                                        <input type="text" class="form-control" name="ssc_year"
                                            value="{{ $academic_data->ssc_year }}" id="datepicker-1" />
                                    </div>
                                </div>
                                <div class="col-md-6" id="ssc_institution">
                                    <div class="form-group">
                                        <label>SSC Institution Name</label>
                                        <input type="text" name="ssc_institution" class="form-control"
                                            placeholder="SSC Institution Name" id="ssc_institution"
                                            value="{{ $academic_data->ssc_institution }}">
                                    </div>
                                </div>
                                <div class="col-md-6" id="ssc_gpa">
                                    <div class="form-group">
                                        <label>SSC GPA</label>
                                        <input type="number" step=0.01 name="ssc_gpa" class="form-control"
                                            placeholder="SSC GPA" value="{{ $academic_data->ssc_gpa }}">
                                    </div>
                                </div>

                                @forelse ($achievements as $achievement)
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Achievement {{ $loop->index + 1 }}</label>
                                            <textarea id="" name="achievement[]" class="form-control"
                                                placeholder=" (e.g., athlete, debater, organizer, etc.)" maxlength="999"
                                                style="max-height: 80px; height: 80px">{{ $achievement->achievement }}</textarea>
                                        </div>
                                    </div>
                                @empty
                                @endforelse

                                <div class="col-md-12">
                                    {{-- <button type="submit" class="account-btn">Edit</button> --}}
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="add_button" title="Add Achievements"><i
                                    class="bx bx-plus">Add Achievements</i></a>


                            <br>
                            <br>
                            <h3>Reference Details</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Reference name <span class="text-danger font-weight-bold">*</span></label>
                                        <input type="text" name="reference_name" class="form-control"
                                            placeholder="Enter reference name"
                                            value="{{ $student_data->reference_name }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Profession <span class="text-danger font-weight-bold">*</span></label>
                                        <input type="text" name="reference_profession" class="form-control"
                                            placeholder="Enter profession" maxlength="999"
                                            value="{{ $student_data->reference_profession }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Contact Number <span class="text-danger font-weight-bold">*</span></label>
                                        <input type="phone" name="reference_phone" class="form-control"
                                            placeholder="Enter contact number"
                                            value="{{ $student_data->reference_phone }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    {{-- <button type="submit" class="account-btn">Save</button> --}}
                                </div>
                            </div>
                            <br>

                            <h3>Financial Information</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Family Income (Monthly) <span
                                                class="text-danger font-weight-bold">*</span></label>
                                        <input type="number" name="family_income" class="form-control"
                                            placeholder="Enter monthly family income"
                                            value="{{ $student_data->family_income }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Income Source <span class="text-danger font-weight-bold">*</span></label>
                                        <input type="text" name="income_source" class="form-control"
                                            placeholder="Enter income source" value="{{ $student_data->income_source }}"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Any Other Scholarship</label>
                                        <textarea name="other_scholarship" class="form-control"
                                            placeholder="Please write details (if any)"
                                            style="max-height: 80px; height: 80px">{{ $student_data->other_scholarship }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Reason for Financial Support <span
                                                class="text-danger font-weight-bold">*</span></label>
                                        <textarea name="reason" class="form-control" placeholder="Please write details"
                                            maxlength="999"
                                            style="max-height: 80px; height: 80px">{{ $student_data->reason }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    {{-- <button type="submit" class="account-btn">Save</button> --}}
                                </div>
                            </div>

                            <br>

                            <br>

                            <h3>Present Address</h3>
                            <div class="row">
                                @forelse ($addresses_present as $present)
                                    <input type="hidden" name="present_address_id" value="{{ $present->id }}">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="hidden" id="form_type_present" value="EDIT">
                                            <label>Division: <span class="text-danger font-weight-bold">*</span></label>
                                            <select class="form-control" id="division_present" name="division_present"
                                                required>
                                                <option selected="selected" name="division_present">
                                                    {{ $present->division }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>District: <span class="text-danger font-weight-bold">*</span></label>
                                            <select class="form-control" id="district_present" name="district_present"
                                                required>
                                                <option selected="selected">{{ $present->district }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Upazila: <span class="text-danger font-weight-bold">*</span></label>
                                            <select class="form-control" id="upazila_present" name="upazila_present"
                                                required>
                                                <option selected="selected">{{ $present->upazila }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Area: <span class="text-danger font-weight-bold">*</span></label>
                                            <input type="text" name="area_present" class="form-control"
                                                placeholder="House and Area details" value="{{ $present->area }}"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        {{-- <button type="submit" class="account-btn">Save</button> --}}
                                    </div>
                            </div>

                            <br>
                            <h3>Permanent Address</h3>
                            <div class="row">
                                <div class="col-md-12" style="margin-bottom: 18px;">
                                    <div class="form-check">
                                        {{-- <input class="form-check-input" type="checkbox"
                                            value="{{ $present->same_as_present }}" id="trigger" name="same_as_present"> --}}

                                        <input type="checkbox" id="trigger" class="form-check-input"
                                            value="{{ $present->same_as_presen }}" name="same_as_present"
                                            @if (old('same_as_present', $present->same_as_present)) checked @endif>

                                        <label class="form-check-label" for="trigger">Same as Present Address (Tick, if
                                            yes)</label>
                                    </div>
                                </div>
                            @empty
                                @endforelse


                                @forelse ($addresses_permanent as $permanent)
                                    <input type="hidden" name="permanent_address_id" value="{{ $permanent->id }}">
                                    {{-- <input type="text" name="permanent_address_id" value="{{ $permanent->id }}"> --}}
                                    <div class="row" id="permanent_address">

                                        <div class="col-md-6" id="division_check">
                                            <div class="form-group">
                                                <!-- This hidden input field is necessary for the js file. -->
                                                <input type="hidden" id="form_type_permanent" value="EDIT">
                                                <!-- Value = "CREATE" for create form and value = "EDIT" for edit form. -->
                                                <label>Division:</label>
                                                <select class="form-control" name="division_permanent"
                                                    id="division_permanent">
                                                    <option selected="selected" name="division_permanent">
                                                        {{ $permanent->division }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="district_check">
                                            <div class="form-group">
                                                <label>District:</label>
                                                <select class="form-control" name="district_permanent"
                                                    id="district_permanent">
                                                    <option selected="selected">{{ $permanent->district }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="upazila_check">
                                            <div class="form-group">
                                                <label>Upazila:</label>
                                                <select class="form-control" name="upazila_permanent"
                                                    id="upazila_permanent">
                                                    <option selected="selected">{{ $permanent->upazila }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="area_check">
                                            <div class="form-group">
                                                <label>Area:</label>
                                                <input type="text" name="area_permanent" class="form-control"
                                                    placeholder="House and Area details" value="{{ $permanent->area }}">
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="row" id="permanent_address_new">

                                        <div class="col-md-6" id="division_check">
                                            <div class="form-group">
                                                <!-- This hidden input field is necessary for the js file. -->
                                                <input type="hidden" id="form_type_permanent" value="CREATE">
                                                <!-- Value = "CREATE" for create form and value = "EDIT" for edit form. -->
                                                <label>Division:</label>
                                                <select class="form-control" name="division_permanent"
                                                    id="division_permanent">
                                                    <option selected="selected" name="division">Please select division
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="district_check">
                                            <div class="form-group">
                                                <label>District:</label>
                                                <select class="form-control" name="district_permanent"
                                                    id="district_permanent">
                                                    <option selected="selected">Please select district</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="upazila_check">
                                            <div class="form-group">
                                                <label>Upazila:</label>
                                                <select class="form-control" name="upazila_permanent"
                                                    id="upazila_permanent">
                                                    <option selected="selected">Please select upazila</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="area_check">
                                            <div class="form-group">
                                                <label>Area:</label>
                                                <input type="text" name="area_permanent" class="form-control"
                                                    placeholder="Your Area">
                                            </div>
                                        </div>
                                    </div>
                                @endforelse

                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="account-btn">Update Information</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection

@section('custom_js')
    {{-- Dependent School/College/Universty input fields --}}
    <script src="{{ asset('assets/js/class-level-option.js') }}"></script>
    {{-- Bootstrap only YEAR picker --}}
    <script src="{{ asset('assets/js/bs-datepicker.min.js') }}"></script>
    <script>
        $("#datepicker, #datepicker-1, #datepicker-2, #datepicker-3").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true //to close picker once year is selected
        });
    </script>
    {{-- Change the CHECKBOX value --}}
    <script>
        $('#trigger').on('change', function() {
            this.value = this.checked ? 1 : 0;
            // alert(this.value);
        }).change();
    </script>
    {{-- Alternative JS for picking OLD VALUES in dropdown --}}
    <script>
        $(window).on('load', function() {
            document.getElementById("level").value = "{{ $academic_data->level }}";
        });
    </script>
    <script>
        $(window).on('load', function() {
            document.getElementById("class_degree_sch").value = "{{ $academic_data->class_degree }}";
            document.getElementById("class_degree_col").value = "{{ $academic_data->class_degree }}";
            document.getElementById("class_degree_uni").value = "{{ $academic_data->class_degree }}";
        });
    </script>

    {{-- Show/Hide a DIV based on CHECKBOX click --}}
    <script>
        $(window).on('load', function() {
            // Get the form fields 
            var checkbox = $("#trigger");
            var permanent_address = $("#permanent_address");
            var permanent_address_new = $("#permanent_address_new");

            // Show the fields.
            // Use JS to do this in case the user doesn't have JS
            permanent_address.show();
            permanent_address_new.show();

            // Setup an event listener for when the state of the
            // checkbox changes.
            checkbox.change(function() {
                // Check to see if the checkbox is checked.
                if (checkbox.is(":checked")) {
                    // Hide the visible fields.
                    permanent_address.hide();
                    permanent_address_new.hide();
                    // Populate the input.
                } else {
                    permanent_address.show();
                    permanent_address_new.show();
                }
            });
        });
    </script>
    {{-- Dynamic Add/Remove input boxes --}}
    <script type="text/javascript">
        let clicks = 1;
        $(document).ready(function() {
            var maxField = 5; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var more = $('.dynm_field'); //Input field wrapper

            var x = 1; //Initial field counter is 1

            //Once add button is clicked
            $(addButton).click(function() {
                clicks += 1;
                var fieldHTML =
                    '<div class="col-md-6"><div class="form-group"><label>Significant Achievement ' +
                    clicks +
                    '</label><textarea  id="" name="achievement[]" class="form-control" placeholder=" (e.g., athlete, debater, organizer, etc.)" maxlength="999"></textarea></div><a href="javascript:void(0);" class="remove_button"><i class="bx bx-trash-alt text-danger"> Delete</i></a></div>'; //New input field html
                //Check maximum number of input fields bx-trash-alt
                if (x < maxField) {
                    x++; //Increment field counter
                    $(more).append(fieldHTML); //Add field html
                }
                console.log(x);
            });

            //Once remove button is clicked
            $(more).on('click', '.remove_button', function(e) {
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
                clicks--;
            });
        });
    </script>
    {{-- <script>
        this.getField("myField").display = display.visible;
        this.getField("myField").required = true;

        this.getField("myField").display = display.hidden;
        this.getField("myField").required = false;
    </script> --}}

@endsection
