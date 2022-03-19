<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Mentor;
use Illuminate\Http\Request;

class ManageMentorAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($mentor_id)
    {
        $account_types = Account::account_types;
        $mentor = Mentor::find($mentor_id)->user->name;
        return view('tenant.manage_mentors.manage_mentor_accounts_create', [
            'account_types' => $account_types,
            'mentor_id' => $mentor_id,
            'mentor' => $mentor,
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
            'account_title' => 'required',
            'account_type' => 'required',
            'account_number' => 'required',
            'mentor_id' => 'required',
        ]);

        $mentor = Mentor::find($request->mentor_id);

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

        $mentor->mentor_accounts()->save($account);

        return redirect()->route('manage_mentor_accounts_details', $request->mentor_id)->with('success', 'Account created succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($mentor_id)
    {
        $account_details = Mentor::find($mentor_id)->mentor_accounts;
        return view('tenant.manage_mentors.manage_mentor_accounts_details', [
            'account_details' => $account_details,
            'mentor_id' => $mentor_id,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($account_id)
    {
        $account_types = Account::account_types;
        $account_details = Account::find($account_id);
        return view('tenant.manage_mentors.manage_mentor_accounts_edit', [
            'account_details' => $account_details,
            'account_types' => $account_types,
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

        return redirect()->route('manage_mentor_accounts_details', $request->mentor_id)->with('success', 'Account created succesfully');
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
