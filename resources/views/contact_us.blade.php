@extends('layouts.web')

@section('custom_styles')

@endsection

@section('content')

    <section class="page-title title-bg13">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>Contact Us</h2>
                <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>Contact Us</li>
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
                    <form class="signup-form" method="POST" action="{{ route('sendMessage') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name <span class="text-danger font-weight-bold">*</span></label>
                            <input id="name" type="text" class="form-control"
                                name="name"  required autocomplete="name" autofocus
                                placeholder="Enter Your Name">
                            
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control "
                                name="email"  autocomplete="email"
                                placeholder="Enter Your Email">

                        </div>

                        <div class="form-group">
                            <label for="phone">Phone<span class="text-danger font-weight-bold">*</span></label>
                            <input id="phone" type="phone" class="form-control"
                                name="phone"  required autocomplete="phone"
                                placeholder="Example: 01X12345678">
                            
                        </div>

                        <div class="form-group">
                            <label for="message">Type Your Message... <span class="text-danger font-weight-bold">*</span></label>
                            <textarea id="message" type="message"
                                class="form-control" name="password" required
                                 placeholder="Type Your Message..."></textarea>
                           
                                
                        </div>

                        
                        <div class="signup-btn text-center">
                            <button type="submit">Send</button>
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
