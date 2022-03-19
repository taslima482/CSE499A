<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Helper as HelpersHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'email' => ['max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'phone' => ['required', 'min:11','unique:users'],
        ]);
    }

    public function sendOtp(Request $request)
    {
        $this->validate($request, [
            'phone' => ['required', 'min:11','unique:users'],
        ]);

        $count = session('count');
        if (!$count) {
           $count = 0;
        }
        $count = $count +1;
        session(['count' => $count]);
        if ($count>2) {
            return redirect('/register');
        }

        $phone=$request->input('phone');
        $phone_code = substr($phone,0,3);
        if ($phone_code != "+88") {
            $contracts = "+88".$phone;
        }
        else{
            $contracts = $phone;
        }
        $otp = mt_rand(10000, 99999);
        $otp_hash = Hash::make($otp);
        session(['otp' => $otp_hash]);
        $message = "Your OTP is: ".$otp." - Shikkha Britti";

        $smsResponse = Helper::sendSMS($contracts,$message);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email')??NULL;
        $user->password = $request->input('password');
        $user->phone = $phone;
        $user->photo_url = null;

        session(['user' => $user]);

        return view('auth.otp-verify');
    }

    public function OtpVerify(Request $request)
    {

        if(!session('otp')){
             return redirect('/register');
        }
        return view('auth.otp-verify');
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(Request $request)
    {
        $this->validate($request, [
            'otp' => 'required|string',
        ]);

        $input_otp=$request->input('otp');
        $otp_hash = session('otp');

        if (Hash::check($input_otp,$otp_hash )) {
            $user = session('user');
            $user->save();
            $request->session()->flash('status', 'Task was successful!');
            Auth::loginUsingId($user->id);
            return redirect('/student/student-dashboard');
        }
        else{
            return back()->with('message', 'Sorry wrong OTP.');
        }

        // $role = Role::findOrCreate('STUDENT');
        // $permission = Permission::findOrCreate('student-can');
        // $role->givePermissionTo($permission);
        // $user->assignRole([$role->id]);

        // return $user;
    }
}
