<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Student;
use App\Models\Degree;
use App\Models\Achievement;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Spatie\Permission\Traits\HasRoles;



class RegisterStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student_data = User::FindOrFail(Auth::user()->id)->student_information;

        return view('web.student.student-dashboard', [
            'student_data' => $student_data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student_data = User::find(Auth::user()->id)->student_information;

        return view('web.student.student-profile-create', [
            'student_data' => $student_data,
            'degree_levels' => Degree::degree_levels,
            'class_school' => Degree::class_school,
            'class_college' => Degree::class_college,
            'class_uni' => Degree::class_uni,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());


        $this->validate($request, [
            'user_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'aim_in_life' => 'required',
            'gender' => 'required',
            // 'same_as_parmanent'=>'required',
        ]);

        // Generating Student Unique ID
        $ldate = date('ym');
        $user_id = Auth()->user()->id;
        $last_digit = sprintf("%03d", $user_id);
        $sid = $ldate . $last_digit;


        $student = new Student();
        $student->user_id = $request->user_id;
        $student->sid = $sid;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->dob = $request->dob;

        $student->father_name = $request->father_name;
        $student->father_profession = $request->father_profession;
        $student->mother_name = $request->mother_name;
        $student->mother_profession = $request->mother_profession;
        $student->siblings = $request->siblings;
        $student->aim_in_life = $request->aim_in_life;

        $student->gender = $request->gender;

        $student->reference_name = $request->reference_name;
        $student->reference_profession = $request->reference_profession;
        $student->reference_phone = $request->reference_phone;

        $student->family_income = $request->family_income;
        $student->income_source = $request->income_source;
        $student->other_scholarship = $request->other_scholarship;
        $student->reason = $request->reason;
        $student->save();



        $achievement_input = request('achievement');
        if ($achievement_input) {
            $student_achievement = collect();
            for ($i = 0; $i < count($achievement_input); $i++) {
                $achievement = new Achievement();
                $achievement->achievement = $achievement_input[$i];

                $student_achievement->push($achievement);
            }
            $student->achievements()->saveMany($student_achievement);
        }


        $this->validate($request, [
            'division_present' => 'required',
            'district_present' => 'required',
            'upazila_present' => 'required',
            'area_present' => 'required',
        ]);

        $address = new Address();
        $address->division = $request->division_present;
        $address->district = $request->district_present;
        $address->upazila = $request->upazila_present;
        $address->area = $request->area_present;
        $address->address_type = "PRESENT";
        $address->same_as_present = $request->has('same_as_present');
        $address->status = "ACTIVE";
        $student->address()->save($address);

        $same_as_present = $request->same_as_present;
        if ($same_as_present == 0) {
            $address = new Address();
            $address->division = $request->division_permanent;
            $address->district = $request->district_permanent;
            $address->upazila = $request->upazila_permanent;
            $address->area = $request->area_permanent;
            $address->address_type = "PERMANENT";
            $address->same_as_present = $request->has('same_as_present');
            $address->status = "ACTIVE";
            $student->address()->save($address);
        }

        $this->validate($request, [
            'level' => 'required',
            'institution' => 'required',
            'year' => 'required',
            'position' => 'required',
        ]);

        $level = $request->level;

        if ($level == "School") {
            $degree_level = $request->class_degree_sch;
        } else if ($level == "College") {
            $degree_level = $request->class_degree_col;
        } else if ($level == "Diploma") {
            $degree_level = NULL;
        } else {
            $degree_level = $request->class_degree_uni;
        }

        $degree = new Degree();
        $degree->student_id = $student->id;
        $degree->level = $request->level;

        $degree->class_degree = $degree_level;

        $degree->institution = $request->institution;
        $degree->position = $request->position;
        $degree->marks_cgpa = $request->marks_cgpa;
        $degree->semester = $request->semester;
        $degree->year = $request->year;

        $degree->ssc_year = $request->ssc_year;
        $degree->ssc_institution = $request->ssc_institution;
        $degree->ssc_gpa = $request->ssc_gpa;
        $degree->hsc_year = $request->hsc_year;
        $degree->hsc_institution = $request->hsc_institution;
        $degree->hsc_gpa = $request->hsc_gpa;
        $degree->bachelor_year = $request->bachelor_year;
        $degree->bachelor_institution = $request->bachelor_institution;
        $degree->bachelor_subject = $request->bachelor_subject;
        $degree->bachelor_cgpa = $request->bachelor_cgpa;

        $degree->save();

        $user = User::find($request->user_id);
        $role = Role::findOrCreate('STUDENT');
        $permission = Permission::findOrCreate('student-can');

        $role->givePermissionTo($permission);
        $role->givePermissionTo('apply-scholarship');
        $user->assignRole($role);


        return redirect()->route('student_profile', Auth::user()->id)->with('success', 'Congratulations! Profile created succesfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student_data = User::find(Auth::user()->id)->student_information;

        if (!$student_data)
            return redirect()->route('student_profile_create');
        else
            $addresses_present = $student_data->address->where("address_type", "PRESENT");
        $addresses_permanent = $student_data->address->where("address_type", "PERMANENT");
        // dd( $addresses);

        $academic_data = Student::find($student_data->id)->degree_information;
        $achievements = Student::find($student_data->id)->achievements;

        // dd($student_data);

        return view('web.student.student-profile', [
            'student_data' => $student_data,
            'academic_data' => $academic_data,
            'addresses_present' => $addresses_present,
            'addresses_permanent' => $addresses_permanent,
            'achievements' => $achievements,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($student_id)
    {
        $student_data = Student::findOrFail($student_id);
        $addresses_present = $student_data->address->where("address_type", "PRESENT");
        $addresses_permanent = $student_data->address->where("address_type", "PERMANENT");


        $academic_data = Student::find($student_data->id)->degree_information;
        $achievements = Student::find($student_data->id)->achievements;

        // dd($degree_levels);

        return view('web.student.student-profile-edit', [
            'student_data' => $student_data,
            'academic_data' => $academic_data,
            'addresses_present' => $addresses_present,
            'addresses_permanent' => $addresses_permanent,
            'achievements' => $achievements,
            'degree_levels' => Degree::degree_levels,
            'class_school' => Degree::class_school,
            'class_college' => Degree::class_college,
            'class_uni' => Degree::class_uni,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        // dd($request->all());

        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'gender' => 'required',
            'aim_in_life' => 'required',
        ]);

        $student_id = $request->input('student_id');
        $student =  Student::find($student_id);

        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->dob = $request->dob;

        $student->father_name = $request->father_name;
        $student->father_profession = $request->father_profession;
        $student->mother_name = $request->mother_name;
        $student->mother_profession = $request->mother_profession;
        $student->siblings = $request->siblings;
        $student->aim_in_life = $request->aim_in_life;

        $student->gender = $request->gender;

        $student->reference_name = $request->reference_name;
        $student->reference_profession = $request->reference_profession;
        $student->reference_phone = $request->reference_phone;

        $student->family_income = $request->family_income;
        $student->income_source = $request->income_source;
        $student->other_scholarship = $request->other_scholarship;
        $student->reason = $request->reason;
        $student->save();

        $this->validate($request, [
            'level' => 'required',
            'institution' => 'required',
            'year' => 'required',
            'position' => 'required',
        ]);


        $level = $request->level;
        if ($level == "School" || $level == "College" || $level == "Diploma" || $level == "Bachelors") {
            $bachelor_year = NULL; $bachelor_institution = NULL; $bachelor_subject = NULL; $bachelor_cgpa = NULL;
            
            if ($level == "School") {
                $this->validate($request, [
                    'class_degree_sch' => 'required'
                ],[
                    'class_degree_sch.required' => 'The "Class" field is mandatory!',
                ]);
                $degree_level = $request->class_degree_sch;
                $ssc_year = NULL; $ssc_institution = NULL; $ssc_gpa = NULL; $hsc_year = NULL; $hsc_institution = NULL; $hsc_gpa = NULL;
            } else if ($level == "College") {
                $this->validate($request, [
                    'class_degree_col' => 'required'
                ],[
                    'class_degree_col.required' => 'The "Class" field is mandatory!',
                ]);
                $degree_level = $request->class_degree_col;
                $ssc_year = $request->ssc_year; $ssc_institution = $request->ssc_institution; $ssc_gpa = $request->ssc_gpa; $hsc_year = NULL; $hsc_institution = NULL; $hsc_gpa = NULL;
            } else if ($level == "Diploma") {
                $degree_level = NULL;
                $ssc_year = $request->ssc_year; $ssc_institution = $request->ssc_institution; $ssc_gpa = $request->ssc_gpa; $hsc_year = NULL; $hsc_institution = NULL; $hsc_gpa = NULL;
            } else if ($level == "Bachelors") {
                $this->validate($request, [
                    'class_degree_uni' => 'required'
                ],[
                    'class_degree_uni.required' => 'The "Degree Year" field is mandatory!',
                ]);
                $degree_level = $request->class_degree_uni;
                $ssc_year = $request->ssc_year; $ssc_institution = $request->ssc_institution; $ssc_gpa = $request->ssc_gpa; 
                $hsc_year = $request->hsc_year; $hsc_institution = $request->hsc_institution; $hsc_gpa = $request->hsc_gpa;
            }

        } else {
            $this->validate($request, [
                'class_degree_uni' => 'required'
            ],[
                'class_degree_uni.required' => 'The "Degree Year" field is mandatory!',
            ]);
            $degree_level = $request->class_degree_uni;
            $ssc_year = $request->ssc_year; $ssc_institution = $request->ssc_institution; $ssc_gpa = $request->ssc_gpa; 
            $hsc_year = $request->hsc_year; $hsc_institution = $request->hsc_institution; $hsc_gpa = $request->hsc_gpa;

            $bachelor_year = $request->bachelor_year;
            $bachelor_institution = $request->bachelor_institution;
            $bachelor_subject = $request->bachelor_subject;
            $bachelor_cgpa = $request->bachelor_cgpa;
        }


        $degrees_id = $request->degrees_id;

        $degree =  Degree::find($degrees_id);
        // $degree->student_id = $student->id;
        $degree->level = $request->level;
        $degree->class_degree = $degree_level;
        $degree->institution = $request->institution;
        $degree->position = $request->position;
        $degree->marks_cgpa = $request->marks_cgpa;
        $degree->semester = $request->semester;
        $degree->year = $request->year;

        $degree->ssc_year = $ssc_year;
        $degree->ssc_institution = $ssc_institution;
        $degree->ssc_gpa = $ssc_gpa;
        $degree->hsc_year = $hsc_year;
        $degree->hsc_institution = $hsc_institution;
        $degree->hsc_gpa = $hsc_gpa;
        $degree->bachelor_year = $bachelor_year;
        $degree->bachelor_institution = $bachelor_institution;
        $degree->bachelor_subject = $bachelor_subject;
        $degree->bachelor_cgpa = $bachelor_cgpa;

        $degree->save();



        $achievements = Achievement::where("student_id", $student_id)->get();
        foreach ($achievements as $achievement) {
            $achievement->delete();
        }
        $achievement_input = request('achievement');
        if ($achievement_input) {
            $student_achievement = collect();
            for ($i = 0; $i < count($achievement_input); $i++) {
                $achievement = new Achievement();
                $achievement->achievement = $achievement_input[$i];

                $student_achievement->push($achievement);
            }
            $student->achievements()->saveMany($student_achievement);
        }


        $this->validate($request, [
            'division_present' => 'required',
            'district_present' => 'required',
            'upazila_present' => 'required',
            'area_present' => 'required',
        ]);

        $present_address_id = $request->present_address_id;
        $address =  Address::find($present_address_id);

        $address->division = $request->division_present;
        $address->district = $request->district_present;
        $address->upazila = $request->upazila_present;
        $address->area = $request->area_present;
        // $address->address_type = "PRESENT";
        $address->same_as_present = $request->has('same_as_present');
        $address->status = "ACTIVE";
        $address->save();


        $permanent_address_id = $request->permanent_address_id;
        $same_as_present = $request->has('same_as_present');
        if ($same_as_present == 1) {
            $student->address()->where("id", $permanent_address_id)->delete();
        } else if ($same_as_present == NULL) {
            if ($permanent_address_id) {
                $permanent_address = Address::find($permanent_address_id);
                $permanent_address->division = $request->division_permanent;
                $permanent_address->district = $request->district_permanent;
                $permanent_address->upazila = $request->upazila_permanent;
                $permanent_address->area = $request->area_permanent;
                $permanent_address->address_type = "PERMANENT";
                $permanent_address->same_as_present = $request->has('same_as_present');
                $permanent_address->status = "ACTIVE";
                $student->address()->save($permanent_address);
            } else {
                $permanent_address = new Address();
                $permanent_address->division = $request->division_permanent;
                $permanent_address->district = $request->district_permanent;
                $permanent_address->upazila = $request->upazila_permanent;
                $permanent_address->area = $request->area_permanent;
                $permanent_address->address_type = "PERMANENT";
                $permanent_address->same_as_present = $request->has('same_as_present');
                $permanent_address->status = "ACTIVE";
                $student->address()->save($permanent_address);
            }
        }


        return redirect()->route('student_profile', ['student_id' => $student_id])->with('success', 'Profile updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
