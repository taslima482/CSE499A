<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Scholarship;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ScholarshipApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $scholarships = Scholarship::where('status', "ACTIVE")->where('is_delete', 0)->orderBy('id', 'DESC')->get();

        return view('web.scholarship.scholarship-list', [
            'scholarships' => $scholarships,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $scholarship_id = $request->scholarship_id;
        $user = User::find(auth()->user()->id);
        $student = $user->student_information;

        // dd($student->id);


        if (!$student)
            return redirect()->route('student_profile_create')->with('warning', 'Complete your profile to apply for scholarships.');

        elseif (Document::where('documentable_id', $student->id)->exists()) {
            $student->scholarships()->attach($request->scholarship_id);

            return redirect()->route('student_applications_index')->with('success', 'Scholarship Application submitted successfully. We will contact you soon.');
        }
        else {
            return redirect()->route('student_document')->with('warning', 'Please upload your necessary documents.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($scholarship_id)
    {
        $scholarship = Scholarship::find($scholarship_id);

        return view('web.scholarship.scholarship-details', [
            'scholarship' => $scholarship,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // dd($request->all());
        $user = User::find(auth()->user()->id);
        $student = $user->student_information;

        $student->scholarships()->detach($request->scholarship_id);

            return redirect()->route('student_applications_index')->with('success', 'Scholarship Application withdrawn successfully');
    }
}
