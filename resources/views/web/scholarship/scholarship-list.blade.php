@extends('layouts.web')

@section('custom_styles')
@endsection

@section('content')
    <section class="page-title title-bg4">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>Available Scholarship</h2>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Available Scholarship</li>
                </ul>
            </div>
        </div>
        <div class="lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </section>
    <section class="job-style-two pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <h2>Scholarships You May Be Interested In</h2>
                {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida</p> --}}
            </div>
            @forelse ($scholarships as $scholarship)
            <div class="row">
                <div class="col-lg-12">
                    <div class="job-card-two">
                        <div class="row align-items-center">
                            <div class="col-md-1">
                                <div class="company-logo">
                                    <a href="#">
                                        <img src="{{asset('assets/img/company-logo/1.png')}}" alt="logo">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="job-info">
                                    <h3>
                                        <a href="{{route('available_scholarships_details',$scholarship->id)}}">{{$scholarship->scholarship_title}}</a>
                                    </h3>
                                    <ul>
                                        {{-- <li>
                                            <i class='bx bx-briefcase'></i>
                                            Grant + Other benefits
                                        </li> --}}
                                        
                                        <li>
                                            <i class='bx bx-location-plus'></i>
                                            Bangladesh
                                        </li>
                                        <li>
                                            <i class='bx bx-briefcase'></i>
                                            {{$scholarship->payment_type}}
                                            </li>
                                        <li>
                                            <i class='bx bx-stopwatch'></i>
                                            {{ (new DateTime($scholarship->deadline))->format('d-M-Y') }}
                                        </li>
                                    </ul>
                                    <span>Level: {{$scholarship->level}}</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="theme-btn text-end">
                                    <a href="{{route('available_scholarships_details',$scholarship->id)}}" class="default-btn">
                                        Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
            </div>
            @empty
            <h3 class="text-center text-danger">Sorry! No scholarships available for this time. 
            @endforelse


            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                            <i class='bx bx-chevrons-left bx-fade-left'></i>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link active" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class='bx bx-chevrons-right bx-fade-right'></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>







@endsection

@section('custom_js')
@endsection
