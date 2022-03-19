@extends('layouts.web')

@section('custom_styles')
    {{-- Start added for user profile photo crop --}}
    <script src="{{ asset('js/user_profile_photo_crop/jquery.min.js') }}"></script>
    <script src="{{ asset('js/user_profile_photo_crop/croppie.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/user_profile_photo_crop/croppie.min.css') }}">
    {{-- END added for user profile photo crop --}}
    <style>
        .blink_me {
            animation: blinker 1500ms linear infinite;
        }

        @keyframes blinker {
            50% {
                opacity: .65;
            }
        }
        .theme{
            background: #fa8231; 
            color: #fff;"
        }

    </style>
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

                <div class="col-lg-8">
                    @include('include.messages')

                    <div class="candidate-profile">
                        <div class="profile-thumb">
                            <span data-bs-toggle="modal" data-bs-target="#user_profile_photo_modal{{ auth()->user()->id }}"
                                title="Upload Photo" style="cursor:pointer">
                                <img src="{{ auth()->user()->photo_url != null ? url('storage/' . auth()->user()->photo_url) : asset('/assets/img/null/avatar.jpg') }}"
                                    class="rounded-circle img-fluid" width="150" alt="User-Profile-Image">
                            </span><br>

                            <button type="button" class="btn theme m-2" data-bs-toggle="modal" data-bs-target="#user_profile_photo_modal{{ auth()->user()->id }}"> <i class="fas fa-camera"></i> Update Photo</button>

                            {{-- <h2><i class="bx bxs-camera" data-bs-toggle="modal"
                                    data-bs-target="#user_profile_photo_modal{{ auth()->user()->id }}" title="Upload Photo"
                                    style="cursor:pointer"></i><span class="" style="font-size:14px">Update
                                    Photo</span></h2> --}}
                            <h3>{{ Auth::user()->name }}</h3>
                            @if ($student_data)
                                <p>Student ID: {{ $student_data->sid }}</p>
                            @endif
                            <p>Scholarship Candidate</p>

                        </div>
                        <ul>
                            <li>
                                <a href="">
                                    <i class='bx bxs-phone'></i>
                                    {{ Auth::user()->phone }}
                                </a>
                            </li>
                            <li>
                                <a href="email:{{ Auth::user()->email }}">
                                    <i class='bx bxs-envelope'></i>
                                    <span class="">{{ Auth::user()->email }}</span>
                                </a>
                            </li>
                        </ul>
                        @cannot('student-can')
                            <div class="candidate-social blink_me">
                                <a href="{{ route('student_profile_create') }}" target=""><button type="button"
                                        class="btn btn-warning">Please Compleye Your
                                        Profile</button></a>
                            </div>
                        @endcannot

                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="subscribe-section">
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
    </section> --}}
    {{-- ------------------------Create account Modal------------------------- --}}

    <div class="modal fade" id="user_profile_photo_modal{{ auth()->user()->id }}" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="owner_id" value="{{ auth()->user()->id }}">
                    <div class="form-group row">

                        <label for="formFile" class="col-md-3">Profile Photo</label>
                        <div class="col-md-9 custom-file">
                            <input type="file" class="form-control custom-file-input" id="upload{{ auth()->user()->id }}"
                                name="profile_photo" accept="image/x-png,image/gif,image/jpeg">
                            <label class="custom-file-label" for="profile_photo"></label>
                        </div>

                    </div>
                    <center>
                        <div id="upload-demo{{ auth()->user()->id }}" style="max-width:300px"></div>
                    </center>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-success" id="upload-result{{ auth()->user()->id }}">Upload</button>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $uploadCrop{{ auth()->user()->id }} = $('#upload-demo{{ auth()->user()->id }}').croppie({
            enableExif: true,
            viewport: {
                width: 200,
                height: 200,
                type: 'square' //circle,square
            },
            boundary: {
                width: 280,
                height: 280
            }
        });



        $('#upload{{ auth()->user()->id }}').on('change', function() {
            // window.alert('#upload{{ auth()->user()->id }}');
            var reader = new FileReader();
            // window.alert(reader{{ auth()->user()->id }});
            reader.onload = function(e) {
                $uploadCrop{{ auth()->user()->id }}.croppie('bind', {
                    url: e.target.result
                }).then(function() {
                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
        });


        $('#upload-result{{ auth()->user()->id }}').on('click', function(ev) {
            $uploadCrop{{ auth()->user()->id }}.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(resp) {
                $.ajax({
                    url: "/profile_photo_upload",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "image": resp,
                        "user_id": {{ auth()->user()->id }}
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            });
        });
    </script>

@endsection

@section('custom_js')

@endsection
