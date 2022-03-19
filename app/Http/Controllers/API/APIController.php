<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Student;
use Illuminate\Http\Request;
use app\models\Test;
use App\Models\TestStudent;
use App\Models\User;
use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Validator;

class APIController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ShowTestStudents($id = null)
    {
        if ($id == '') {
            $testUser = TestStudent::get();
            return response()->json(['testUser' => $testUser]);
        } else {
            $testUser = TestStudent::find($id);
            return response()->json(['testUser' => $testUser]);
        }
    }

    public function addTestStudent(Request $request)
    {
        if ($request->ismethod('POST')) {
            $data = $request->all();

            $rules = [
                'name' => 'required|unique:test_students',
                'profession' => 'required',
                'age' => 'required',
            ];
            $customMessage = [
                'name.required' => 'Name field is required',
            ];
            $validator = Validator::make($data, $rules, $customMessage);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            $testUser = new TestStudent();
            $testUser->name = $request->name;
            $testUser->profession = $request->profession;
            $testUser->age = $request->age;

            $testUser->save();

            return response()->json([
                'message' => 'Test Student Successfully Added'
            ], 201);
        }
    }


    //post API for adding multiple users
    public function addStudentMultiple(Request $request)
    {
        if ($request->ismethod('POST')) {
            $data = $request->all();

            $rules = [
                'students.*.name' => 'required|unique:test_students',
                'students.*.profession' => 'required',
                'students.*.age' => 'required',
            ];
            $customMessage = [
                'students.*.name.required' => 'Name is required',
            ];
            $validator = Validator::make($data, $rules, $customMessage);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            foreach ($data['students'] as $add_student) {

                $student = new TestStudent();
                $student->name = $add_student['name'];
                $student->profession = $add_student['profession'];
                $student->age = $add_student['age'];

                $student->save();
            }
            return response()->json([
                'message' => 'Test Student Successfully Added'
            ], 201);
        }
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
    public function updateTestStudent(Request $request, $id)
    {
        if ($request->ismethod('PUT')) {
            $data = $request->all();

            $rules = [
                'name' => 'required|unique:test_students',
                'profession' => 'required',
                'age' => 'required',
            ];
            $customMessage = [
                'name.required' => 'Name field is required',
            ];
            $validator = Validator::make($data, $rules, $customMessage);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            $testUser = TestStudent::findOrFail($id);
            $testUser->name = $request->name;
            $testUser->profession = $request->profession;
            $testUser->age = $request->age;

            $testUser->save();

            return response()->json([
                'message' => 'Test Student Successfully UPDATED'
            ], 202);
        }
    }


    public function updateSingleTestStudent(Request $request, $id)
    {
        if ($request->ismethod('PATCH')) {
            $data = $request->all();

            $rules = [
                'name' => 'required|unique:test_students',
            ];
            $customMessage = [
                'name.required' => 'Name field is required',
            ];
            $validator = Validator::make($data, $rules, $customMessage);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            $testUser = TestStudent::findOrFail($id);
            $testUser->name = $request->name;

            $testUser->save();

            return response()->json([
                'message' => 'Test Student Successfully UPDATED'
            ], 202);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteTestStudent($id = null)
    {
        TestStudent::findOrFail($id)->delete();
        $messages = "Student Successfully Deleted";
        return response()->json(['message' => $messages], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteTestStudentjson(Request $request)
    {
        if ($request->ismethod('DELETE')) {
            $data = $request->all();
            TestStudent::where('id', $data['id'])->delete();
            $messages = "Student Successfully Deleted";
            return response()->json(['message' => $messages], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteTestStudentMultiple($ids)
    {
        $ids = explode(',', $ids);
        TestStudent::whereIn('id', $ids)->delete();
        $messages = "Student Successfully Deleted";
        return response()->json(['message' => $messages], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteTestStudentMultipleJSON(Request $request)
    {
        if ($request->ismethod('DELETE')) {
            $data = $request->all();
            TestStudent::whereIn('id', $data['ids'])->delete();
            $messages = "Student Successfully Deleted";
            return response()->json(['message' => $messages], 200);
        }
    }

    public function deleteMultipleJSON_jwt_token(Request $request)
    {
        $header = $request->header('Authorization');
        if ($header == '') {
            $messages = "Permission Denied";
            return response()->json(['message' => $messages], 422);
        } else {
            if ($header == 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IlNhemlkdXIgUmFobWFuIiwiaWF0IjoxNTE2MjM5MDIyfQ.3-VImiqLMvdTg86_9odSadK07QXkATt0jSYqJFjibP0') {
                if ($request->ismethod('DELETE')) {
                    $data = $request->all();
                    TestStudent::whereIn('id', $data['ids'])->delete();
                    $messages = "Student Successfully Deleted";
                    return response()->json(['message' => $messages], 200);
                }
            } else {
                $messages = "Something wrong";
                return response()->json(['message' => $messages], 422);
            }
        }
    }
}
