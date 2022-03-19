@extends('layouts.web')

@section('custom_styles')

@endsection

@section('content')

<section class="page-title title-bg8">
    <div class="d-table">
        <div class="d-table-cell">
            <h2>Dashboard</h2>
            <ul>
                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li>Dashboard</li>
            </ul>
        </div>
    </div>
    <div class="lines">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
</section>


<section class="candidate-details pt-100 pb-100">
    <div class="container">
        <div class="row">


            {{-- Student Dashboard Section --}}
            @include('web.student.sidebar-menu')
            {{-- Student Dashboard Section --}}

            <div class="col-md-7 mx-auto signin-form signup-form">

                <form class="" method="POST" action="{{ route('update_user_other_info') }}">
                    <h3 class="text-center">Change User Info</h3>
                    @csrf
                    <div class="form-group">
                        <label for="name">Enter Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name"  value="{{auth()->user()->name}}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Enter Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email"  value="{{auth()->user()->email}}">
                    </div>

                    <div class="form-group">
                        <label for="phone">Enter Phone</label>
                        <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter Your Phone Number" value="{{auth()->user()->phone}}" required>
                    </div>

                    <div class="signin-btn text-center">
                        <button type="submit">Submit</button>
                    </div>

                </form>

            <br><hr><br>
                
                <form class="" method="POST" action="{{ route('update_user_password') }}">
                    <h3 class="text-center">Change Password</h3>
                    @csrf                    

                    <div class="form-group">
                        <label for="password">Enter Old Password</label>
                        <input id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" required autocomplete="old_password">

                        @error('old_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="new_password">Enter New Password</label>
                        <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required autocomplete="new_password">

                        @error('new_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="confirm_new_password">Confirm New Password</label>
                        <input id="confirm_new_password" type="password" class="form-control" name="confirm_new_password" required autocomplete="new-password">
                    </div>

                    <div class="signup-btn text-center">
                        <button type="submit">Submit</button>
                    </div>
                    
                </form>

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
                <input type="email" class="form-control" placeholder="Enter your email" name="EMAIL" required autocomplete="off">
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