@extends('layouts.web')

@section('custom_styles')

@endsection

@section('content')

    <section class="page-title title-bg13">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>Sign Up</h2>
                <ul>
                    <li>
                        <a href="index.html">Sign Up</a>
                    </li>
                    <li>Verify Your Phone Number</li>
                </ul>
            </div>
        </div>
        <div class="lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </section>

    <div class="signup-section ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 offset-md-2 offset-lg-3">
                    @if (session('message'))
                        <div class="alert alert-danger text-center" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form class="signup-form" method="POST" action="{{ route('registeruser') }}">
                        @csrf

                        <div class="form-group">
                            <label for="otp">Enter OTP <span class="text-danger font-weight-bold">*</span></label>
                            <input id="otp" type="phone" class="form-control @error('otp') is-invalid @enderror"
                                name="otp" value="{{ old('otp') }}" required autocomplete="otp"
                                placeholder="Enter Your OTP">
                            @error('otp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>



                        <div class="signup-btn text-center">
                            <button type="submit">Verify</button>
                        </div>
                        {{-- <div class="other-signup text-center">
                            <span>Or sign up with</span>
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class='bx bxl-google'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class='bx bxl-facebook'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class='bx bxl-twitter'></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class='bx bxl-linkedin'></i>
                                    </a>
                                </li>
                            </ul>
                        </div> --}}
                        <div class="create-btn text-center">
                            <p>
                                Don't receive OTP?
                                <button onClick="history.go(0);">Resend OTP</button><i class="bx bx-refresh"></i>
                            </p>
                            <p>
                                Already have an account?
                                <a href="{{route('login')}}">
                                    Sign In
                                    <i class='bx bx-chevrons-right bx-fade-right'></i>
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


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
