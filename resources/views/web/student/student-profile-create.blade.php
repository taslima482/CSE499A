@extends('layouts.web')

@section('custom_styles')
<link href="{{ asset('assets/css/bs-datepicker.min.css') }}" rel="stylesheet">

@endsection
<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');




    .container .form-outer {
        width: 100%;
        overflow: hidden;
    }

    .container .form-outer form {
        display: flex;
        width: 400%;
    }

    .form-outer form .page {
        width: 25%;
        transition: margin-left 0.3s ease-in-out;
    }

    .form-outer form .page .title {
        text-align: left;
        font-size: 25px;
        font-weight: 500;
    }

    /* .form-outer form .page .field{
  width: 330px;
  height: 45px;
  margin: 45px 0;
  display: flex;
  position: relative;
} */
    /* form .page .field .label{
  position: absolute;
  top: -30px;
  font-weight: 500;
} */
    /* form .page .field input{
  height: 100%;
  width: 100%;
  border: 1px solid lightgrey;
  border-radius: 5px;
  padding-left: 15px;
  font-size: 18px;
} */
    form .page .field select {
        width: 100%;
        padding-left: 10px;
        font-size: 17px;
        font-weight: 500;
    }





    .container .progress-bar {
        display: flex;
        margin: 40px 0;
        user-select: none;
    }

    .container .progress-bar .step {
        text-align: center;
        width: 13%;
        position: left;
    }

    .container .progress-bar .step p {
        font-weight: 500;
        font-size: 18px;
        color: #000;
        margin-bottom: 8px;
    }

    .progress-bar .step .bullet {
        height: 25px;
        width: 25px;
        border: 2px solid #000;
        display: inline-block;
        border-radius: 50%;
        position: relative;
        transition: 0.2s;
        font-weight: 500;
        font-size: 17px;
        line-height: 25px;
    }

    .progress-bar .step .bullet.active {
        border-color: #d43f8d;
        background: #d43f8d;
    }

    .progress-bar .step .bullet span {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
    }

    .progress-bar .step .bullet.active span {
        display: none;
    }

    .progress-bar .step .bullet:before,
    .progress-bar .step .bullet:after {
        position: absolute;
        content: '';
        bottom: 11px;
        right: -135px;
        height: 5px;
        width: 134px;
        background: #262626;
    }

    .progress-bar .step .bullet.active:after {
        background: #d43f8d;
        transform: scaleX(0);
        transform-origin: left;
        animation: animate 0.3s linear forwards;
    }

    @keyframes animate {
        100% {
            transform: scaleX(1);
        }
    }

    .progress-bar .step:last-child .bullet:before,
    .progress-bar .step:last-child .bullet:after {
        display: none;
    }

    .progress-bar .step p.active {
        color: #d43f8d;
        transition: 0.2s linear;
    }

    .progress-bar .step .check {
        position: absolute;
        left: 50%;
        top: 119%;
        font-size: 15px;
        transform: translate(-50%, -50%);
        display: none;
    }

    .progress-bar .step .check.active {
        display: block;
        color: #fff;
    }


  .firstNext{
  float: right;
  background: #001935;
  color: #fff;
  border: none;
  width: 120px;
  height: 40px;
  font-size: 15px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 2px;
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
  transition-property: background;
}

.next-1{
  float: right;
  background: #001935;
  color: #fff;
  border: none;
  width: 120px;
  height: 40px;
  font-size: 15px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 2px;
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
  transition-property: background;
}

.next-2{
  float: right;
  background: #001935;
  color: #fff;
  border: none;
  width: 120px;
  height: 40px;
  font-size: 15px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 2px;
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
  transition-property: background;
}

.firstNext:hover{
  background: #2E94E3;
}
.next-1:hover{
  background: #2E94E3;
}
.next-2:hover{
  background: #2E94E3;
}

.prev-1{
  float: left;
  background: #001935;
  color: #fff;
  border: none;
  width: 120px;
  height: 40px;
  font-size: 15px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 2px;
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
  transition-property: background;
}
.prev-2{
  float: left;
  background: #001935;
  color: #fff;
  border: none;
  width: 120px;
  height: 40px;
  font-size: 15px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 2px;
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
  transition-property: background;
}
.prev-3{
  float: left;
  background: #001935;
  color: #fff;
  border: none;
  width: 120px;
  height: 40px;
  font-size: 15px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 2px;
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
  transition-property: background;
}
.prev-1:hover {
  background: #2E94E3;
}
.prev-2:hover{
  background: #2E94E3;
}
.prev-3:hover{
  background: #2E94E3;
}
.save{
  float: right;
  background: red;
  color: #fff;
  border: none;
  width: 120px;
  height: 40px;
  font-size: 15px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 2px;
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
  transition-property: background;
}
.account-btn{
  float: right;
  background: red;
  color: #fff;
  border: none;
  width: 120px;
  height: 40px;
  font-size: 15px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 2px;
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
  transition-property: background;
}


</style>
@section('content')
<section class="page-title">
    <h2>Student Create</h2>
    <ul>
        <li>
            <a href="{{ route('home') }}">Home</a>
        </li>
        <li>Account</li>
    </ul>
</section>

<body>
    <section class="account-section ptb-100">

        <div class="container">
            <div class="row">

                {{-- Student Dashboard Section --}}
                @include('web.student.sidebar-menu')
                {{-- Student Dashboard Section --}}


                <div class="col-md-8">
                    @include('include.messages')
                    <h4 class="text-center text-danger">Please provide the below information to Create your profile</h4>
                    <!-- <div class="progress-bar">
            <div class="step">
              <p>Personal Info</p>
              <div class="bullet">
                <span>1</span>
              </div>
              <div class="check fas fa-check"></div>
            </div>
            <div class="step">
              <p>Academic Info</p>
              <div class="bullet">
                <span>2</span>
              </div>
              <div class="check fas fa-check"></div>
            </div>
            <div class="step">
              <p>Financial</p>
              <div class="bullet">
                <span>3</span>
              </div>
              <div class="check fas fa-check"></div>
            </div>
            <div class="step">
              <p>Address</p>
              <div class="bullet">
                <span>4</span>
              </div>
              <div class="check fas fa-check"></div>
            </div>
          </div> -->
                    <div class="account-details">
                        <div class="form-outer">
                            <form class="basic-info needs-validation" action="{{ route('store_student_information') }}" method="POST">
                                <div class="page slide-page">
                                    <h3>Basic Information</h3>
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Your Full Name <span class="text-danger font-weight-bold">*</span></label>
                                                <input type="text" name="name" class="form-control" placeholder="Your Name" value="{{ auth()->user()->name }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Your Email</label>
                                                <input type="email" name="email" class="form-control" placeholder="Your Email" value="{{ auth()->user()->email }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Your Phone <span class="text-danger font-weight-bold">*</span></label>
                                                <input type="phone" pattern="[0]+[1]+[7/8/9/6/5/4/3]+[0-9]{8}" name="phone" class="form-control" placeholder="Your Phone" value="{{ auth()->user()->phone }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Date of Birth <span class="text-danger font-weight-bold">*</span></label>
                                                <input type="date" name="dob" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Father's Name <span class="text-danger font-weight-bold">*</span></label>
                                                <input type="text" name="father_name" class="form-control" placeholder="Your Father's Name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Father's Profession <span class="text-danger font-weight-bold">*</span></label>
                                                <input type="text" name="father_profession" class="form-control" placeholder="Your Father's Profession" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mother's Name <span class="text-danger font-weight-bold">*</span></label>
                                                <input type="text" name="mother_name" class="form-control" placeholder="Your Mother's Profession" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mother's Profession <span class="text-danger font-weight-bold">*</span></label>
                                                <input type="text" name="mother_profession" class="form-control" placeholder="Your Mother's Name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Siblings and their status (if any)</label>
                                                <textarea name="siblings" class="form-control" placeholder="Write details" maxlength="999" style="max-height: 80px; height: 80px"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Your Aim in Life <span class="text-danger font-weight-bold">*</span></label>
                                                <textarea name="aim_in_life" class="form-control" placeholder="Write details" maxlength="999" style="max-height: 80px; height: 80px" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="gender">Gender <span class="text-danger font-weight-bold">*</span></label>
                                                <select class="form-control" name="gender" id="gender" required>
                                                    <option value="">Select</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <button class="firstNext next">Next</button>
                                    </div>
                                </div>

                                <div class="page">
                                    <h3>Current Academic information</h3>
                                    <div class="row dynm_field">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="level">Level <span class="text-danger font-weight-bold">*</span></label>
                                                <select class="form-control" name="level" id="level" required>
                                                    {{-- <option value="">Select</option> --}}
                                                    @forelse($degree_levels as $degree_level)
                                                    <option value="{{ $degree_level }}">{{ $degree_level }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="school">
                                            <div class="form-group">
                                                <label for="class_degree_sch">Select Class<span class="text-danger font-weight-bold">*</span></label>
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
                                                <label for="class_degree_col">Select Class<span class="text-danger font-weight-bold">*</span></label>
                                                <select class="form-control" name="class_degree_col" id="class_degree_col">
                                                    {{-- <option value="">Select</option> --}}
                                                    @forelse($class_college as $class_college)
                                                    <option value="{{ $class_college }}">{{ $class_college }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-6" id="university">
                                            <div class="form-group">
                                                <label for="class_degree_uni">Degree Year<span class="text-danger font-weight-bold">*</span></label>
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
                                                <label for="institution">Institution <span class="text-danger font-weight-bold">*</span></label>
                                                <input type="text" name="institution" class="form-control" placeholder="Your Institution" id="institution" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="position">
                                            <div class="form-group">
                                                <label>Class Position/Roll/ID <span class="text-danger font-weight-bold">*</span></label>
                                                <input type="text" name="position" class="form-control" placeholder="Your Class Position/Roll/ID" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Marks/GPA/CGPA <span class="text-danger font-weight-bold">*</span></label>
                                                <input type="number" step=0.01 name="marks_cgpa" class="form-control" placeholder="Current Marks/GPA/CGPA">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Semester</label>
                                                <input type="text" name="semester" class="form-control" placeholder="Semester">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Year <span class="text-danger font-weight-bold">*</span></label>
                                                <input type="text" class="form-control" name="year" id="datepicker" required value="{{ date('Y') }}" />
                                            </div>
                                        </div>

                                        <div class="" id="bachelor_next">
                                            <hr style="height:2px;border-width:0;">
                                        </div>
                                        <div class="col-md-6" id="bachelor_year">
                                            <div class="form-group">
                                                <label>Bachelors Passing Year</label>
                                                <input type="text" class="form-control" name="bachelor_year" id="datepicker-3" />
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="bachelor_institution">
                                            <div class="form-group">
                                                <label>Institution Name</label>
                                                <input type="text" name="bachelor_institution" class="form-control" placeholder="Bachelors Institution Name" id="bachelor_institution">
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="bachelor_subject">
                                            <div class="form-group">
                                                <label>Subject</label>
                                                <input type="text" name="bachelor_subject" class="form-control" placeholder="Bachelors Subject" id="bachelor_subject">
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="bachelor_cgpa">
                                            <div class="form-group">
                                                <label>CGPA</label>
                                                <input type="number" step=0.01 name="bachelor_cgpa" class="form-control" placeholder="Bachelors CGPA">
                                            </div>
                                        </div>

                                        <div class="" id="hsc_next">
                                            <hr style="height:2px;border-width:0;">
                                        </div>
                                        <div class="col-md-6" id="hsc_year">
                                            <div class="form-group">
                                                <label>HSC Passing Year</label>
                                                <input type="text" class="form-control" name="hsc_year" id="datepicker-2" />
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="hsc_institution">
                                            <div class="form-group">
                                                <label>HSC Institution Name</label>
                                                <input type="text" name="hsc_institution" class="form-control" placeholder="HSC Institution Name" id="hsc_institution">
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="hsc_gpa">
                                            <div class="form-group">
                                                <label>HSC GPA</label>
                                                <input type="number" step=0.01 name="hsc_gpa" class="form-control" placeholder="HSC GPA">
                                            </div>
                                        </div>

                                        <div class="" id="ssc_next">
                                            <hr style="height:2px;border-width:0;">
                                        </div>
                                        <div class="col-md-6" id="ssc_year">
                                            <div class="form-group">
                                                <label>SSC Passing Year</label>
                                                <input type="text" class="form-control" name="ssc_year" id="datepicker-1" />
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="ssc_institution">
                                            <div class="form-group">
                                                <label>SSC Institution Name</label>
                                                <input type="text" name="ssc_institution" class="form-control" placeholder="SSC Institution Name" id="ssc_institution">
                                            </div>
                                        </div>
                                        <div class="col-md-6" id="ssc_gpa">
                                            <div class="form-group">
                                                <label>SSC GPA</label>
                                                <input type="number" step=0.01 name="ssc_gpa" class="form-control" placeholder="SSC GPA">
                                            </div>
                                        </div>

                                        <div class="" id="sig_ach">
                                            <hr style="height:2px;border-width:0;">
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label>Significant Achievement 1</label>
                                                <textarea name="achievement[]" class="form-control" placeholder=" (e.g., athlete, debater, organizer, etc.)" maxlength="999"></textarea>
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            {{-- <button type="submit" class="account-btn">Edit</button> --}}
                                            {{-- <button type="submit" class="account-btn">Save</button> --}}
                                        </div>
                                    </div>
                                    <a href="javascript:void(0);" class="add_button" title="Add Achievements"><i class="bx bx-plus">Add
                                            Achievements</i></a>
                                    <div class="field btns">
                                        <button class="prev-1 prev">Previous</button>
                                        <button class="next-1 next">Next</button>
                                    </div>
                                </div>

                                <div class="page">
                                    <h3>Reference Details</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Reference name <span class="text-danger font-weight-bold">*</span></label>
                                                <input type="text" name="reference_name" class="form-control" placeholder="Enter reference name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Profession <span class="text-danger font-weight-bold">*</span></label>
                                                <input type="text" name="reference_profession" class="form-control" maxlength="999" placeholder="Enter profession" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Contact Number <span class="text-danger font-weight-bold">*</span></label>
                                                <input type="phone" name="reference_phone" class="form-control" placeholder="Enter contact number" required>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            {{-- <button type="submit" class="account-btn">Edit</button> --}}
                                            {{-- <button type="submit" class="account-btn">Save</button> --}}
                                        </div>
                                    </div>
                                    <h3>Financial Information</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Family Income (Monthly) <span class="text-danger font-weight-bold">*</span></label>
                                                <input type="number" name="family_income" class="form-control" placeholder="Enter monthly family income" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Income Source <span class="text-danger font-weight-bold">*</span></label>
                                                <input type="text" name="income_source" class="form-control" placeholder="Enter income source" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Any Other Scholarship</label>
                                                <textarea name="other_scholarship" class="form-control" placeholder="Please write details (if any)" style="max-height: 80px; height: 80px"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Reason for Financial Support <span class="text-danger font-weight-bold">*</span></label>
                                                <textarea name="reason" class="form-control" placeholder="Please write details" maxlength="999" style="max-height: 80px; height: 80px" required></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            {{-- <button type="submit" class="account-btn">Edit</button> --}}
                                            {{-- <button type="submit" class="account-btn">Save</button> --}}
                                        </div>
                                    </div>
                                    <div class="field btns">
                                        <button class="prev-2 prev">Previous</button>
                                        <button class="next-2 next">Next</button>
                                    </div>
                                </div>

                                <div class="page">
                                    <h3>Present Address</h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="hidden" id="form_type_present" value="CREATE">
                                                <label>Division: <span class="text-danger font-weight-bold">*</span></label>
                                                <select class="form-control" id="division_present" name="division_present" required>
                                                    <option value="">Please select division</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>District: <span class="text-danger font-weight-bold">*</span></label>
                                                <select class="form-control" id="district_present" name="district_present" required>
                                                    <option selected>Please select district</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Upazila: <span class="text-danger font-weight-bold">*</span></label>
                                                <select class="form-control" id="upazila_present" name="upazila_present" required>
                                                    <option selected>Please select upazila</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Area: <span class="text-danger font-weight-bold">*</span></label>
                                                <input type="text" name="area_present" class="form-control" placeholder="House and Area details" required>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            {{-- <button type="submit" class="account-btn">Edit</button> --}}
                                            {{-- <button type="submit" class="account-btn">Save</button> --}}
                                        </div>
                                    </div>

                                    <br>
                                    <h3>Permanent Address</h3>
                                    <div class="row">
                                        <div class="col-md-12" style="margin-bottom: 18px;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="trigger" name="same_as_present">
                                                <label class="form-check-label" for="trigger">
                                                    Same as Present Address
                                                </label>
                                            </div>
                                        </div>

                                        <div class="row" id="permanent_address">

                                            <div class="col-md-6" id="division_check">
                                                <div class="form-group">
                                                    <!-- This hidden input field is necessary for the js file. -->
                                                    <input type="hidden" id="form_type_permanent" value="CREATE">
                                                    <!-- Value = "CREATE" for create form and value = "EDIT" for edit form. -->
                                                    <label>Division:</label>
                                                    <select class="form-control" name="division_permanent" id="division_permanent">
                                                        <option selected="selected" name="division">Please select division
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6" id="district_check">
                                                <div class="form-group">
                                                    <label>District:</label>
                                                    <select class="form-control" name="district_permanent" id="district_permanent">
                                                        <option selected="selected">Please select district</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6" id="upazila_check">
                                                <div class="form-group">
                                                    <label>Upazila:</label>
                                                    <select class="form-control" name="upazila_permanent" id="upazila_permanent">
                                                        <option selected="selected">Please select upazila</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6" id="area_check">
                                                <div class="form-group">
                                                    <label>Area:</label>
                                                    <input type="text" name="area_permanent" class="form-control" placeholder="Your Area">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            {{-- <button type="submit" class="account-btn">Edit</button> --}}

                                            <button type="submit" class="account-btn">Save</button>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="field btns">
                                            <button class="prev-3 prev">Previous</button>
                                            {{-- <button class="save">Save</button> --}}
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-title title-bg10">
        <div class="lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </section>

    @endsection

    @section('custom_js')
    <script src="{{ asset('assets/js/bs-datepicker.min.js') }}"></script>
    <script>
        $("#datepicker, #datepicker-1, #datepicker-2, #datepicker-3").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true //to close picker once year is selected
        });
    </script>
    <script>
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
                    '</label><textarea  id="" name="achievement[]" class="form-control" placeholder=" (e.g., athlete, debater, organizer, etc.)" maxlength="999"></textarea></div><a href="javascript:void(0);" class="remove_button"><i class="fa fa-close text-danger">Remove</i></a></div>'; //New input field html
                //Check maximum number of input fields
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
    {{--
  <script>
    this.getField("myField").display = display.visible;
    this.getField("myField").required = true;

    this.getField("myField").display = display.hidden;
    this.getField("myField").required = false;
  </script> --}}

    <script>
        $('#trigger').on('change', function() {
            this.value = this.checked ? 1 : 0;
            // alert(this.value);
        }).change();
    </script>

    <script src="{{ asset('assets/js/class-level-option.js') }}"></script>


    <script>
        $(window).on('load', function() {
            // Get the form fields 
            var checkbox = $("#trigger");
            var permanent_address = $("#permanent_address");

            // Show the fields.
            // Use JS to do this in case the user doesn't have JS
            permanent_address.show();

            // Setup an event listener for when the state of the
            // checkbox changes.
            checkbox.change(function() {
                // Check to see if the checkbox is checked.
                if (checkbox.is(":checked")) {
                    // Hide the visible fields.
                    permanent_address.hide();
                    // Populate the input.
                } else {
                    permanent_address.show();
                }
            });
        });

        const slidePage = document.querySelector(".slide-page");
        const nextBtnFirst = document.querySelector(".firstNext");
        const prevBtnSec = document.querySelector(".prev-1");
        const nextBtnSec = document.querySelector(".next-1");
        const prevBtnThird = document.querySelector(".prev-2");
        const nextBtnThird = document.querySelector(".next-2");
        const prevBtnFourth = document.querySelector(".prev-3");
        const submitBtn = document.querySelector(".save");
        const progressText = document.querySelectorAll(".step p");
        const progressCheck = document.querySelectorAll(".step .check");
        const bullet = document.querySelectorAll(".step .bullet");
        let current = 1;

        nextBtnFirst.addEventListener("click", function(event) {
            event.preventDefault();
            slidePage.style.marginLeft = "-25%";
            bullet[current - 1].classList.add("active");
            progressCheck[current - 1].classList.add("active");
            progressText[current - 1].classList.add("active");
            current += 1;
        });
        nextBtnSec.addEventListener("click", function(event) {
            event.preventDefault();
            slidePage.style.marginLeft = "-50%";
            bullet[current - 1].classList.add("active");
            progressCheck[current - 1].classList.add("active");
            progressText[current - 1].classList.add("active");
            current += 1;
        });
        nextBtnThird.addEventListener("click", function(event) {
            event.preventDefault();
            slidePage.style.marginLeft = "-75%";
            bullet[current - 1].classList.add("active");
            progressCheck[current - 1].classList.add("active");
            progressText[current - 1].classList.add("active");
            current += 1;
        });
        submitBtn.addEventListener("click", function() {
            bullet[current - 1].classList.add("active");
            progressCheck[current - 1].classList.add("active");
            progressText[current - 1].classList.add("active");
            current += 1;
        });

        prevBtnSec.addEventListener("click", function(event) {
            event.preventDefault();
            slidePage.style.marginLeft = "0%";
            bullet[current - 2].classList.remove("active");
            progressCheck[current - 2].classList.remove("active");
            progressText[current - 2].classList.remove("active");
            current -= 1;
        });
        prevBtnThird.addEventListener("click", function(event) {
            event.preventDefault();
            slidePage.style.marginLeft = "-25%";
            bullet[current - 2].classList.remove("active");
            progressCheck[current - 2].classList.remove("active");
            progressText[current - 2].classList.remove("active");
            current -= 1;
        });
        prevBtnFourth.addEventListener("click", function(event) {
            event.preventDefault();
            slidePage.style.marginLeft = "-50%";
            bullet[current - 2].classList.remove("active");
            progressCheck[current - 2].classList.remove("active");
            progressText[current - 2].classList.remove("active");
            current -= 1;
        });
    </script>

    @endsection

</body>

</html>