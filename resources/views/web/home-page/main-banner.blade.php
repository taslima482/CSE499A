<div class="banner-style-two">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="banner-text">
                    {{-- <span>Find Jobs, Employment & Career Opportunities</span> --}}
                    <h1>Find Scholarships to Finance Your Study</h1>
                    {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Quis ipsum suspendisse.</p> --}}
                    @guest
                        <div class="theme-btn">
                            <a href="{{ route('login') }}" class="btn default-btn">Sign In</a>
                            <a href="{{ route('register') }}" class="btn default-btn">Sign Up</a>
                        @else
                            <div class="theme-btn">
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-img">
            <img src="{{ asset('assets/img/banner/banner-img-2.jpeg') }}" alt="banner image">
        </div>
    </div>
