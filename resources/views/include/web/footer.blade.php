{{-- <footer class="footer-area pt-100 pb-70"> --}}
<footer class="footer-area pt-50 pb-50">

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <div class="footer-logo">
                        <a href="index.html">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="logo">
                        </a>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut
                        labore et dolore magna. Sed eiusmod tempor incididunt ut.</p>
                    <div class="footer-social">
                        <a href="https://www.facebook.com/hilinkz" target="_blank"><i class='bx bxl-facebook'></i></a>
                        {{-- <a href="#" target="_blank"><i class='bx bxl-twitter'></i></a> --}}
                        {{-- <a href="#" target="_blank"><i class='bx bxl-pinterest-alt'></i></a> --}}
                        <a href="https://www.linkedin.com/company/hilinkz" target="_blank"><i
                                class='bx bxl-linkedin'></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget pl-60">
                    <h3>For Candidate</h3>
                    <ul>
                        <li>
                            <a href="{{ route('available_scholarships') }}">
                                <i class='bx bx-chevrons-right bx-tada'></i>
                                Browse Scholarship
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}">
                                <i class='bx bx-chevrons-right bx-tada'></i>
                                Account
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('available_scholarships') }}">
                                <i class='bx bx-chevrons-right bx-tada'></i>
                                Browse Categories
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}">
                                <i class='bx bx-chevrons-right bx-tada'></i>
                                Profile
                            </a>
                        </li>
                        {{-- <li>
                            <a href="{{route('login')}}">
                                <i class='bx bx-chevrons-right bx-tada'></i>
                                Job List
                            </a>
                        </li> --}}
                        <li>
                            <a href="{{ route('register') }}">
                                <i class='bx bx-chevrons-right bx-tada'></i>
                                Sign Up
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget pl-60">
                    <h3>Quick Links</h3>
                    <ul>
                        <li>
                            <a href="{{ route('home') }}">
                                <i class='bx bx-chevrons-right bx-tada'></i>
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class='bx bx-chevrons-right bx-tada'></i>
                                About
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class='bx bx-chevrons-right bx-tada'></i>
                                FAQ
                            </a>
                        </li>
                        {{-- <li>
                            <a href="pricing.html">
                                <i class='bx bx-chevrons-right bx-tada'></i>
                                Pricing
                            </a>
                        </li>
                        <li>
                            <a href="privacy.html">
                                <i class='bx bx-chevrons-right bx-tada'></i>
                                Privacy
                            </a>
                        </li> --}}
                        <li>
                            <a href="#">
                                <i class='bx bx-chevrons-right bx-tada'></i>
                                Contact
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget footer-info">
                    <h3>Information</h3>
                    <ul>
                        <li>
                            <span>
                                <i class='bx bxs-phone'></i>
                                Phone:
                            </span>
                            <a href="tel: +88 01749 117117 ">
                                +88 01749 117117
                            </a>
                        </li>
                        <li>
                            <span>
                                <i class='bx bxs-envelope'></i>
                                Email:
                            </span>
                            <a href="mailto: contact@hilinkz.com">
                                contact@hilinkz.com
                            </a>
                        </li>
                        <li>
                            <span>
                                <i class='bx bx-location-plus'></i>
                                Address:
                            </span>
                            Basundhara R/A, Dhaka, Bangladesh
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="copyright-text text-center">
    <p>Copyright @2021 Shikkha Britti. All Rights Reserved By <a href="https://hilinkz.com/" target="_blank">HiLinkz
            Ltd.</a></p>
</div>
