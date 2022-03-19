<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\ApprovedApplication;
use App\Models\Mentor;
use App\Models\Scholarship;
use App\Models\Student;
use App\Scopes\TenantScope;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use PDF;

class ManageApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index($scholarship_id)
    {
        $scholarship = Scholarship::find($scholarship_id);
        $applied_students = $scholarship->students;

        return view('tenant.manage_applications.manage_applications_index', [
            'applied_students' => $applied_students,
            'scholarship_id' => $scholarship_id,

        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function scholarships_index()
    {
        $scholarships = Scholarship::where('is_delete', 0)->get();
        return view('tenant.manage_applications.manage_applications_scholarship_index', [
            'scholarships' => $scholarships,
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function approved_applicaions($scholarship_id)
    {
        // $scholarship = Scholarship::find($scholarship_id);
        // $applied_students = $scholarship->approved_students;

        // dd($applied_students);

        // return view('tenant.manage_applications.manage_applications_approved_application_index', [
        //     'applied_students' => $applied_students,
        //     'scholarship_id' => $scholarship_id,

        // ]);

        $approved_applications = ApprovedApplication::where('scholarship_id', $scholarship_id)->get();

        // dd($approved_applications);
        return view('tenant.manage_applications.manage_applications_approved_application_index', [
            'approved_applications' => $approved_applications,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show_profile(Request $request, $student_id)
    {
        $student_data = Student::find($student_id);
        $user_data = User::withoutGlobalScopes()->find($student_data->user_id);

        return view('tenant.manage_applications.manage_applications_student_profile', [
            'user_data' => $user_data,
            'student_data' => $student_data,
            'academic_data' => $student_data->degree_information,
            'addresses_present' => $student_data->present_address,
            'addresses_permanent' => $student_data->permanent_address,
            'achievements' => $student_data->achievements,
            'documents' => $student_data->student_documents,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function pdf_student_profile(Request $request, $student_id)
    {

        $student_data = Student::find($student_id);
        $user_data = User::withoutGlobalScopes()->find($student_data->user_id);


        $pdf = PDF::setPaper('a4', 'portrait')->loadView('tenant.manage_applications.pdf_student_profile', [
            'user_data' => $user_data,
            'student_data' => $student_data,
            'academic_data' => $student_data->degree_information,
            'addresses_present' => $student_data->present_address,
            'addresses_permanent' => $student_data->permanent_address,
            'achievements' => $student_data->achievements,

        ])->setOptions(['defaultFont' => 'sans-serif']);


        return $pdf->download($student_data->sid . ' Student Profile.pdf');
        // return view('tenant.manage_applications.pdf_student_profile', [
        //     'user_data' => $user_data,
        //     'student_data' => $student_data,
        //     'academic_data' => $student_data->degree_information,
        //     'addresses_present' => $student_data->present_address,
        //     'addresses_permanent' => $student_data->permanent_address,
        //     'achievements' => $student_data->achievements,
        //     'documents' => $student_data->student_documents,
        // ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($scholarship_id, $student_id)
    {
        $scholarship_data = Scholarship::find($scholarship_id);
        $student_data = Student::find($student_id);
        $student_account_details = $student_data->student_active_account;
        $payees = Account::payees;
        $mentors = Mentor::with('mentor_active_account', 'user')->get();

        return view('tenant.manage_applications.manage_applications_approve', [
            'scholarship_data' => $scholarship_data,
            'student_data' => $student_data,
            'account_details' => $student_account_details,
            'mentors' => $mentors,
            'payees' => $payees,
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
            'student_id' => 'required',
            'scholarship_id' => 'required',
            'approved_amount' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'pay_to' => 'required',
        ]);


        if (Carbon::createFromFormat('Y-m-d', $request->from_date)->gt(Carbon::createFromFormat('Y-m-d', $request->to_date))) {
            return redirect()->back()->with('error', '`To Date` can not precede `From Date');
        }

        $pay_to = $request->pay_to;
        if ($pay_to == "STUDENT") {
            $account_id = $request->account_id_student;
            if ($request->account_id_student == NULL) {
                return redirect()->back()->with('error', 'Sorry, Selected Payee does not have any active account!');
            }
        } else if ($pay_to == "MENTOR") {
            $account_id = $request->account_id_mentor;
            if ($request->account_id_mentor == NULL) {
                return redirect()->back()->with('error', 'Sorry, Selected Payee does not have any active account!');
            }
        }

        $approve = new ApprovedApplication();
        $approve->student_id = $request->student_id;
        $approve->scholarship_id = $request->scholarship_id;
        $approve->approved_amount = $request->approved_amount;
        $approve->from_date = $request->from_date;
        $approve->to_date = $request->to_date;
        $approve->approval_date = now();
        $approve->approved_by = Auth::user()->name;
        $approve->account_id = $account_id;
        $approve->save();


        $student = Student::find($request->student_id);
        $student->scholarships()->detach($request->scholarship_id);
        $student->scholarships()->attach($request->scholarship_id, [
            'is_approve' => 1
        ]);


        return redirect()->route('manage_applications_index', $request->scholarship_id)->with('success', 'Application Approved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function application_scholarship_details(Request $request, $scholarship_id, $student_id)
    {
        $approved_application_detail = ApprovedApplication::where('scholarship_id', $scholarship_id)->where('student_id', $student_id)->first();

        $student_data = Student::find($student_id)->name;
        $scholarship_data = Scholarship::find($scholarship_id)->scholarship_title;

        return view('tenant.manage_applications.manage_application_scholarship_details', [
            'approved_application_detail' => $approved_application_detail,
            'student_data' => $student_data,
            'scholarship_data' => $scholarship_data,
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($approved_app_id)
    {
        $approved_application = ApprovedApplication::find($approved_app_id);
        // $student_account  = Student::find($approved_application->student_id)->student_active_account;
        // $mentor_accounts = Mentor::with('mentor_active_account', 'user')->get();
        // $payees = Account::payees;
        // $account = Account::findOrFail($approved_application->account_id);


        return view('tenant.manage_applications.manage_applications_approved_application_edit', [
            'approved_application' => $approved_application,
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
        $this->validate($request, [
            'approved_amount' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
        ]);

        if (Carbon::createFromFormat('Y-m-d', $request->from_date)->gt(Carbon::createFromFormat('Y-m-d', $request->to_date))) {
            return redirect()->back()->with('error', '`To Date` can not precede `From Date');
        }

        // dd($request->all());
        $approved_application = ApprovedApplication::find($request->approved_app_id);

        $approved_application->approved_amount = $request->approved_amount;
        $approved_application->from_date = $request->from_date;
        $approved_application->to_date = $request->to_date;
        $approved_application->save();

        return redirect()->route('manage_applications_scholarship_details', [$approved_application->scholarship_id, $approved_application->student_id])->with('success','Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approved_applicaion_delete(Request $request)
    {
        $this->validate($request, [
            'scholarship_id_u' => 'required',
            'student_id_u' => 'required',
            'approved_app_id_u' => 'required',
        ]);

        $approved_application = ApprovedApplication::find($request->approved_app_id_u);
        $approved_application->delete();

        $student = Student::find($request->student_id_u);
        $student->scholarships()->detach($request->scholarship_id_u);
        $student->scholarships()->attach($request->scholarship_id_u, [
            'is_approve' => 0
        ]);

        return redirect()->back()->with('success', 'Deleted successfully');

    }
}
