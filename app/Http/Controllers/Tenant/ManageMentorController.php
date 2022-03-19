<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Mentor;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;


class ManageMentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mentors = Mentor::all();

        // dd($mentors->user->name);

        return view('tenant.manage_mentors.manage_mentors_index', [
            'mentors' => $mentors,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tenant.manage_mentors.manage_mentors_create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|numeric|unique:users,phone',
            'address' => 'required',
            'profession' => 'required',
            'password' => 'required',
        ]);

        $input = $request->all();
        $user = User::create($input);
        $role = Role::findOrCreate('MENTOR');
        $input += ['user_id' => $user->id];

        $mentor = Mentor::create($input);

        $permission = Permission::findOrCreate('mentor-can');
        $role->givePermissionTo($permission);
        $user->assignRole($role);

        // return redirect()->route('manage_mentors.index')->with('success','Mentor created successfully');
        return redirect()->route('manage_mentor_accounts_create',$mentor->id)->with('success','Mentor created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('tenant.manage_mentors.manage_mentors_show',[
            'mentor' => Mentor::find($id),
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
        return view('tenant.manage_mentors.manage_mentors_edit',[
            'mentor' => Mentor::find($id),
        ]);
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
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
            'profession' => 'required',
        ]);
        $input = $request->all();

        $user = User::find($request->user_id);
        $user->update($input);
        $mentor = Mentor::find($id);
        $mentor->update($input);

        return redirect()->route('manage_mentors.show',$id)
        ->with('success','Mentor data updated successfully');
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
