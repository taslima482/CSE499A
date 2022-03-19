<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\ApprovedApplication;
use App\Models\Scholarship;
use App\Models\MonthlyStatement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageMonthlyStatementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scholarships = Scholarship::all()->where('is_delete', 0);
        return view('tenant.manage_statements.manage_statement_index', [
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
        $scholarships = Scholarship::all();
        return view('tenant.manage_statements.manage_statement_create', [
            'scholarships' => $scholarships,
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
            'scholarship_id' => 'required',
            'month_year' => 'required',
        ]);

        $approved_applications = ApprovedApplication::where('scholarship_id', $request->scholarship_id)->get();

        if ($approved_applications) {
            foreach ($approved_applications as $approved_application) {
                try {
                    $statement = new MonthlyStatement();
                    $statement->student_id = $approved_application->student_id;
                    $statement->scholarship_id = $approved_application->scholarship_id;
                    $statement->approved_amount = $approved_application->approved_amount;
                    $statement->month_year = $request->month_year;
                    $statement->account_id = $approved_application->account_id;
                    $statement->save();
                } catch (\Exception $exception) {
                    // return "not SUCCESS";
                }
            }
        }

        return redirect()->back()->with('success', 'Statement generated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($scholarship_id)
    {
        $statements = MonthlyStatement::where('scholarship_id', $scholarship_id)->orderBy('month_year', 'desc')->get();

        // dd($statements);
        return view('tenant.manage_statements.manage_statement_show', [
            'statements' => $statements,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($statement_id)
    {
        $statement = MonthlyStatement::find($statement_id);
        $payment_status = MonthlyStatement::payment_status;

        return view('tenant.manage_statements.manage_statement_edit', [
            'statement' => $statement,
            'payment_status' => $payment_status,
        ]);
    }


    public function details($statement_id)
    {
        $statement = MonthlyStatement::find($statement_id);

        // dd($statements);
        return view('tenant.manage_statements.manage_statement_details', [
            'statement' => $statement,
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
            'approved_amount' => 'required',
            'payment_status' => 'required',
        ]);

        $statement = MonthlyStatement::find($request->statement_id);

        $statement->approved_amount = $request->approved_amount;
        $statement->status = $request->payment_status;
        $statement->note = $request->note;
        $statement->save();

        return redirect()->route('manage_statement_show', $statement->scholarship_id)->with('success', 'Statement data Update Successfully');
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


    public function search()
    {
        $scholarships = Scholarship::all()->where('is_delete', 0);
        return view('tenant.manage_statements.manage_statement_month_search', [
            'scholarships' => $scholarships,
        ]);
    }

    public function search_show(Request $request)
    {

        // dd($request->all());
        $this->validate($request, [
            'scholarship_id' => 'required',
            'month_year' => 'required',
        ]);

        $statements = MonthlyStatement::where('scholarship_id', $request->scholarship_id)->where('month_year', $request->month_year)->orderBy('month_year', 'desc')->get();

        return view('tenant.manage_statements.manage_statement_month_show', [
            'statements' => $statements,
            'month_year' => $request->month_year,
        ]);
    }

    public function payment_status_change(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'scholarship_id_u' => 'required',
            'month_year_u' => 'required',
        ]);

        $statements = MonthlyStatement::where('scholarship_id', $request->scholarship_id_u)->where('month_year', $request->month_year_u)->orderBy('month_year', 'desc')->get();

        if ($statements) {
            foreach ($statements as $statement) {
                try {
                    $statement = MonthlyStatement::find($statement->id);
                    $statement->status = "PAID";
                    $statement->save();
                } catch (\Exception $exception) {
                    // return "not SUCCESS";
                }
            }
        }

        return view('tenant.manage_statements.manage_statement_month_show', [
            'statements' => $statements,
            'month_year' => $request->month_year,
        ])->with('success', 'Payment Status updated successfully');
    }
}
