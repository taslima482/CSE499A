@extends('layouts.web')

@section('custom_styles')
@endsection

@section('content')
<section class="page-title title-bg6">
    <div class="d-table">
        <div class="d-table-cell">
            <h2>Scholarship Details</h2>
            <ul>
                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li>Scholarship Details</li>
            </ul>
        </div>
    </div>
    <div class="lines">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
</section>

<section class="job-details ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="job-details-text">
                            <div class="job-card">
                                <div class="row align-items-center">
                                    <div class="col-md-2">
                                        <div class="company-logo">
                                            <img src="{{asset('assets/img/company-logo/1.png')}}" alt="logo">
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="job-info">
                                            <h3>{{$scholarship->scholarship_title}}</h3>
                                            <ul>
                                                <li>
                                                    <i class='bx bx-location-plus'></i>
                                                    Bangladesh
                                                </li>
                                                <li>
                                                    <i class='bx bx-filter-alt'></i>
                                                    Level: {{$scholarship->level}}
                                                </li>
                                                <li>
                                                    <i class='bx bx-briefcase'></i>
                                                    {{$scholarship->payment_type}}
                                                </li>
                                            </ul>
                                            <span>
                                                <i class='bx bx-paper-plane'></i>
                                                Application Deadline:  {{ (new DateTime($scholarship->deadline))->format('d-M-Y') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="details-text">
                                <h3>Eligibility</h3>
                                <p style="white-space: pre-wrap;">{{$scholarship->eligibility}}</p>
                            </div>
                            {{-- <div class="details-text">
                                <h3>Requirements</h3>
                                <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                <ul>
                                    <li>
                                        <i class='bx bx-check'></i>
                                        Work experience
                                    </li>
                                    <li>
                                        <i class='bx bx-check'></i>
                                        Skills (soft skills and/or technical skills)
                                    </li>
                                    <li>
                                        <i class='bx bx-check'></i>
                                        WPersonal qualities and attributes.
                                    </li>
                                    <li>
                                        <i class='bx bx-check'></i>
                                        Support software roll-outs to production.
                                    </li>
                                    <li>
                                        <i class='bx bx-check'></i>
                                        Guide and mentor junior engineers. Serve as team lead if appropriate.
                                    </li>
                                </ul>
                            </div> --}}
                            <div class="details-text">
                                <h3>Scholarship Summary</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td><span>Organization:  </span></td>
                                                    <td> Hridoya Bangladesh</td>
                                                </tr>
                                                <tr>
                                                    <td><span>Scholarship Type: </span></td>
                                                    <td>{{$scholarship->payment_type}}</td>
                                                </tr>
                                                {{-- <tr>
                                                    <td><span>Job Type</span></td>
                                                    <td>Full Time</td>
                                                </tr>
                                                <tr>
                                                    <td><span>Email</span></td>
                                                    <td><a href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#85ede0e9e9eac5e6eae8f5e4ebfcabe6eae8"><span class="__cf_email__" data-cfemail="325a575e5e5d72515d5f42535c4b1c515d5f">[email&#160;protected]</span></a></td>
                                                </tr> --}}
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td><span>Location: </span></td>
                                                    <td>Bangladesh</td>
                                                </tr>
                                                {{-- <tr>
                                                    <td><span>Amount: </span></td>
                                                    <td>Tk. {{$scholarship->amount}}</td>
                                                </tr> --}}
                                                {{-- <tr>
                                                    <td><span>Salary</span></td>
                                                    <td>$10,000</td>
                                                </tr>
                                                <tr>
                                                    <td><span>Website</span></td>
                                                    <td><a href="#">www.company.com</a></td>
                                                </tr> --}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @if(App\Helpers\Helper::is_applied_for_scholarship($scholarship->id))
                                <div class="theme-btn">
                                    <form class="" action="{{ route('available_scholarships_apply') }}" method="POST">
                                        @csrf
                                        {{-- <input type="hidden" name="user_id" value="{{ auth()->user()->id }}"> --}}
                                        <input type="hidden" name="tenant_id" value="{{ $scholarship->tenant_id }}">
                                        <input type="hidden" name="scholarship_id" value="{{ $scholarship->id }}">
                                           <button class="default-btn ">
                                                Apply Now
                                            </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="job-sidebar">
                    <h3>Posted By</h3>
                    <div class="posted-by">
                        <img src="{{asset('assets/img/client-1.png')}}" alt="client image">
                        <h4>Manager</h4>
                        <span>Hridoye Bangladesh</span>
                    </div>
                </div>
                <div class="job-sidebar">
                    <h3>Location</h3>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3746841.130182122!2d88.10017077677612!3d23.495625530937712!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30adaaed80e18ba7%3A0xf2d28e0c4e1fc6b!2sBangladesh!5e0!3m2!1sen!2sbd!4v1634641752057!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                {{-- <div class="job-sidebar">
                    <h3>Keywords</h3>
                    <ul>
                        <li>
                            <a href="#">Web Design</a>
                        </li>
                        <li>
                            <a href="#">Data Sceince</a>
                        </li>
                        <li>
                            <a href="#">SEO</a>
                        </li>
                        <li>
                            <a href="#">Content Writter</a>
                        </li>
                        <li>
                            <a href="#">Finance</a>
                        </li>
                        <li>
                            <a href="#">Business</a>
                        </li>
                        <li>
                            <a href="#">Education</a>
                        </li>
                        <li>
                            <a href="#">Graphics</a>
                        </li>
                        <li>
                            <a href="#">Video</a>
                        </li>
                    </ul>
                </div> --}}
                {{-- <div class="job-sidebar social-share">
                    <h3>Share In</h3>
                    <ul>
                        <li>
                            <a href="#" target="_blank">
                                <i class="bx bxl-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <i class="bx bxl-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <i class="bx bxl-pinterest"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <i class="bx bxl-linkedin"></i>
                            </a>
                        </li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </div>
</section>







@endsection

@section('custom_js')
@endsection
