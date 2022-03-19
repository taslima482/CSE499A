<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Document;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StudentDocumentController extends Controller
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
    public function create(Request $request)
    {
        $student_data = User::FindOrFail(Auth::user()->id)->student_information;

        if (!$student_data)
            return redirect()->route('student_profile_create');
        else
            $documents = $student_data->documents;
            
        return view('web.student.student-document', [
            'documents' => $documents,
            'student_data' => $student_data,
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

        $user_id = $request->user_id;
        $student = Student::where('user_id', $user_id)->first();

        $request->validate([
            'document' => 'mimes:pdf,jpg,png,jpeg | max:5120 | required',
        ]);


        if ($request->hasFile('document')) {
            $document =  $request->file('document');

            $document_url = $student->id . '_' . time()   . '_' . $document->getClientOriginalName();

            $document_title = pathinfo($document->getClientOriginalName(), PATHINFO_FILENAME);

            $document->move(public_path('storage/uploaded_file/student_document'), $document_url);
        } else {
            $document_url = '';
        }

        $document = new Document();
        $document->document_title = $document_title;
        $document->type = $request->type;
        $document->document_url = $document_url;
        $student->documents()->save($document);

        return redirect()->back()->with('success', 'Document uploaded succesfully');
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
        $document_id = $request->document_id;
        $document = Document::find($document_id);

        // Deleting File from Storage
        $file_path = public_path('storage/uploaded_file/student_document/' . $document->document_url);
        $response = File::delete($file_path);

        // Deleteing from DB
        $document->delete();

        return back()->with('success', 'Deleted Sucessfully!');
    }
}
