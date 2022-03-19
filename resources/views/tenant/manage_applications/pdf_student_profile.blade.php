<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>{{ $student_data->name }}</title>

    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font: 16px Helvetica, Sans-Serif;
            line-height: 24px;
            background: url(images/noise.jpg);
            margin-right:5px;
        }

        .clear {
            clear: both;
        }

        .page-wrap {
            width: 800px;
            margin: 40px auto 60px;
        }

        .pic {
            float: right;
            margin: -30px 0 0 0;
        }

        h1 {
            margin: 0 0 16px 0;
            padding: 0 0 16px 0;
            font-size: 42px;
            font-weight: bold;
            letter-spacing: -2px;
            /* border-bottom: 1px solid #999; */
        }

        h2 {
            font-size: 20px;
            margin: 0 0 6px 0;
            position: relative;
        }

        h2 span {
            position: absolute;
            bottom: 0;
            right: 0;
            font-style: italic;
            font-family: Georgia, Serif;
            font-size: 16px;
            color: #999;
            font-weight: normal;
        }

        p {
            font-size: 13px;
            margin: 0 0 2px 0;
        }

        a {
            color: #999;
            text-decoration: none;
            border-bottom: 1px dotted #999;
        }

        a:hover {
            border-bottom-style: solid;
            color: black;
        }

        ul {
            margin: 0 0 32px 17px;
        }

        .objective {
            width: 500px;
            float: left;
        }

        .objective p {
            font-family: Georgia, Serif;
            font-style: italic;
            color: #666;
        }

        dt {
            font-style: italic;
            font-weight: bold;
            font-size: 18px;
            text-align: right;
            padding: 0 26px 0 0;
            width: 150px;
            float: left;
            height: 100px;
            border-right: 1px solid #999;
        }

        dd {
            width: 600px;
            float: right;
        }

        dd.clear {
            float: none;
            margin: 0;
            height: 15px;
        }

        .fn {
            /* margin-left: 50px; */
            padding-left: 60px;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;

            /** Extra personal styles **/
            background-color: #03a9f4;
            color: white;
            text-align: center;
            line-height: 1.5cm;
        }

    </style>
</head>

<body>

    <div style="margin:40px auto 10px; ">

        {{-- <img src="{{$user_data->photo_url != null ? url('storage' . $user_data->photo_url) : asset('/assets/img/null/avatar.jpg') }}" alt="" class="pic" /> --}}

        <div class="contact-info" class="vcard">

            <!-- Microformats! -->

            <h2 class="fn">{{ $student_data->name }}</h2>

            <p class="fn">
                <b>Student ID:</b> <span> {{ $student_data->sid }}</span><br>
                <b>Phone:</b> <span> {{ $student_data->phone }}</span><br>
                <b>Email:</b> <span> {{ $student_data->email }}</span><br>
                <b>Gender:</b> <span> {{ $student_data->gender }}</span><br>
                <b>Date of Birth:</b> <span> {{ (new DateTime($student_data->dob))->format('d-M-Y') }}</span><br>

            </p>
        </div>
        <p style="border-bottom: 1px solid #999; margin-top:20px"></p>

        <div class="clear"></div>

        <dl>
            <dd class="clear"></dd>

            <dt>Education</dt>
            <dd>
                {{-- <h2>Withering Madness University - Planet Vhoorl</h2> --}}
                <p><strong>Level:</strong> {{ $academic_data->level }}</p>
                <p><strong>Class/Degree:</strong> {{ $academic_data->class_degree }}</p>
                <p><strong>Semester:</strong> {{ $academic_data->semester }}</p>
                <p><strong>Marks/GPA/CGPA:</strong> {{ $academic_data->marks_cgpa }}</p>
                <p><strong>Class Position/ID:</strong> {{ $academic_data->position }}</p>
                <p><strong>Institution Name:</strong> {{ $academic_data->institution }}</p><br>

                @if ($academic_data->ssc_gpa || $academic_data->ssc_year || $academic_data->hsc_gpa || $academic_data->hsc_year || $academic_data->bachelor_year || $academic_data->bachelor_cgpa)

                    @if ($academic_data->bachelor_year || $academic_data->bachelor_cgpa)
                        <p><strong>Bachelors Passing Year:</strong> {{ $academic_data->bachelor_year }}</p>
                        <p><strong>Institution Name:</strong> {{ $academic_data->bachelor_institution }}</p>
                        <p><strong>Subject:</strong> {{ $academic_data->bachelor_subject }}</p>
                        <p><strong>CGPA:</strong> {{ $academic_data->bachelor_cgpa }}</p><br>
                    @endif
                    @if ($academic_data->hsc_gpa || $academic_data->hsc_year)
                        <p><strong>HSC Passing Year:</strong> {{ $academic_data->hsc_year }}</p>
                        <p><strong>Institution Name:</strong> {{ $academic_data->hsc_institution }}</p>
                        <p><strong>GPA:</strong> {{ $academic_data->hsc_gpa }}</p><br>
                    @endif
                    <p><strong>SSC Passing Year:</strong> {{ $academic_data->ssc_year }}</p>
                    <p><strong>Institution Name:</strong> {{ $academic_data->ssc_institution }}</p>
                    <p><strong>GPA:</strong> {{ $academic_data->ssc_gpa }}</p><br>
                @endif
                @forelse ($achievements as $achievement)
                    @if ($achievement->achievement != null)
                        <p><strong>Achievement {{ $loop->index + 1 }}:</strong> {{ $achievement->achievement }}
                        </p>
                    @endif
                @empty
                @endforelse
                <br>
                <p><strong>Aim in Life:</strong> {{ $student_data->aim_in_life }}</p>

            </dd>

            <dd class="clear"></dd>

            <dt>Personal Information</dt>
            <dd>

                <p><strong>Father's Name:</strong> {{ $student_data->father_name }}</p>
                <p><strong>Father's Profession:</strong> {{ $student_data->father_profession }}</p>
                <p><strong>Mother's Name:</strong> {{ $student_data->mother_name }}</p>
                <p><strong>Mother's Profession:</strong> {{ $student_data->mother_profession }}</p>
                <p><strong>Siblings and their status:</strong> {{ $student_data->siblings }}</p>
            </dd>

            <dd class="clear"></dd>

            <dt>Reference</dt>
            <dd>
                <p><strong>Reference Name:</strong> {{ $student_data->reference_name }}</p>
                <p><strong>Reference Profession:</strong> {{ $student_data->reference_profession }}</p>
                <p><strong>Reference Contact No.:</strong> {{ $student_data->reference_phone }}</p>
            </dd>

            <dd class="clear"></dd>

            <dt>Financial Information</dt>
            <dd>

                <p><strong>Family Income (Tk. Monthly):</strong> {{ $student_data->family_income }}</p>
                <p><strong>Income Source:</strong> {{ $student_data->income_source }}</p>
                <p><strong>Other Scholarship:</strong> {{ $student_data->other_scholarship }}</p>
                <p><strong>Reason:</strong> {{ $student_data->reason }}</p>

            </dd>

            <dd class="clear"></dd>

            <dt> Present Addresss</dt>
            <dd>
                <p><strong>Division:</strong> {{ $addresses_present->division }}</p>
                <p><strong>District:</strong> {{ $addresses_present->district }}</p>
                <p><strong>Upazila:</strong> {{ $addresses_present->upazila }}</p>
                <p><strong>Area:</strong> {{ $addresses_present->area }}</p>

            </dd>

            <dd class="clear"></dd>

            <dt> Permanent Address</dt>

            <dd>
                @if ($addresses_present->same_as_present == 1)
                    <p><strong>Same as Present Address</strong></p>
                @else
                    <p><strong>Division:</strong> {{ $addresses_permanent->division }}</p>
                    <p><strong>District:</strong> {{ $addresses_permanent->district }}</p>
                    <p><strong>Upazila:</strong> {{ $addresses_permanent->upazila }}</p>
                    <p><strong>Area:</strong> {{ $addresses_permanent->area }}</p>
                @endif
            </dd>

            <dd class="clear"></dd>
        </dl>

    </div>
    <footer>
        Copyright &copy; <?php echo date('Y'); ?> | Shikkha Britti
    </footer>

</body>

</html>
