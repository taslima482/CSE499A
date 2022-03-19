<div class="col-md-4" style="padding-bottom: 15px">
    <div class="account-information">
        <div class="profile-thumb">
            
            <a href="{{ route('student_dashboard') }}">
            <img src="{{ auth()->user()->photo_url != null ? url('storage/' . auth()->user()->photo_url) : asset('/assets/img/null/avatar.jpg') }}" class="rounded-circle img-fluid" width="150" title="Update Photo" alt="Shikkha Britti"></a>

            {{-- <h2><i class="bx bxs-camera" data-bs-toggle="modal" data-bs-target="#user_profile_photo_modal{{auth()->user()->id}}" title="Upload Photo" style="cursor:pointer"></i></h2> --}}
            <h3>{{ auth()->user()->name }}</h3>
            @if ($student_data)
                <p class="fw-bold">Student ID: {{ $student_data->sid }}</p>
            @endif
            <p class="pt-2">Scholarship Candidate</p>

        </div>
        <ul>
            <li>
                <a href="{{ route('student_dashboard') }}"
                    class="{{ \Request::route()->getName() == 'student_dashboard' ? 'active' : '' }}">
                    <i class='bx bxs-dashboard'></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('student_profile', auth()->user()->id) }}"
                    class="{{ \Request::route()->getName() == 'student_profile' ? 'active' : '' }}">
                    <i class='bx bx-user'></i>
                    My Profile
                </a>
            </li>
            @role('STUDENT')
                {{-- @if ($student_data) --}}
                <li>
                    <a href="{{ route('student_edit', ['student_id' => $student_data->id]) }}"
                        class="{{ \Request::route()->getName() == 'student_edit' ? 'active' : '' }}">
                        <i class='bx bxs-edit'></i>
                        Edit Profile
                    </a>
                </li>
                <li>
                    <a href="{{ route('student_document') }}"
                        class="{{ \Request::route()->getName() == 'student_document' ? 'active' : '' }}">
                        <i class='bx bx-file'></i>
                        Documents
                    </a>
                </li>

                <li>
                    <a href="{{ route('student_applications_index') }}"
                        class="{{ \Request::route()->getName() == 'student_applications_index' ? 'active' : '' }}">
                        <i class='bx bx-briefcase'></i>
                        Applied Scholarships
                    </a>
                </li>

                <li>
                    <a href="{{ route('student_account') }}"
                        class="{{ \Request::route()->getName() == 'student_account' ? 'active' : '' }}">

                        <i class='bx bx-money'></i>
                        Accounts
                    </a>
                </li>
                {{-- @endif --}}
            @endrole


            <li>
                <a href="{{ route('edit_user_info') }}"
                    class="{{ \Request::route()->getName() == 'edit_user_info' ? 'active' : '' }}">
                    <i class='bx bx-cog'></i>
                    Settings
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class='bx bx-log-out'></i>
                    Logout
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </a>
            </li>

        </ul>
    </div>
</div>
