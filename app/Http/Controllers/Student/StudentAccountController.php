<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student_data = User::find(Auth::user()->id)->student_information;
        $account_details = $student_data->student_accounts;
        $account_types = Account::account_types;

        // $account_details = Student::find($student_data->id)->student_accounts;

        return view('web.student.student-account', [
            'student_data' => $student_data,
            'account_details' => $account_details,
            'account_types' => $account_types,
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'account_title' => 'required',
            'account_type' => 'required',
            'account_number' => 'required',
            'student_id' => 'required',
        ]);

        $student = Student::find($request->student_id);

        $account_type = $request->account_type;
        if ($account_type == "BANK") {
            $bank_name = $request->bank_name;
            $branch_name = $request->branch_name;
        } else {
            $bank_name = NULL;
            $branch_name = NULL;
        }

        $account = new Account();
        $account->account_title = $request->account_title;
        $account->account_type = $account_type;
        $account->account_number = $request->account_number;
        $account->bank_name = $bank_name;
        $account->branch_name = $branch_name;
        $account->note = $request->note;
        $account->account_status = "ACTIVE";
        // dd($account)   ;

        $student->student_accounts()->save($account);

        return redirect()->route('student_account')->with('success', 'Account created successfully');
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
    public function edit($account_id)
    {        
        $student_data = User::find(Auth::user()->id)->student_information;
        $account_details = Account::find($account_id);


        return view('web.student.student-account-edit', [
            'student_data' => $student_data,
            'account_details' => $account_details,
            'account_types' => Account::account_types,
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
            'account_title' => 'required',
            'account_type' => 'required',
            'account_number' => 'required',
        ]);

        $account_type = $request->account_type;
        if ($account_type == "BANK") {
            $bank_name = $request->bank_name;
            $branch_name = $request->branch_name;
        } else {
            $bank_name = NULL;
            $branch_name = NULL;
        }

        $account = Account::find($request->account_id);

        $account->account_title = $request->account_title;
        $account->account_type = $request->account_type;
        $account->account_number = $request->account_number;
        $account->bank_name = $bank_name;
        $account->branch_name = $branch_name;
        $account->note = $request->note;
        $account->save();


        return redirect()->route('student_account')->with('success', 'Account updated successfully');
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
