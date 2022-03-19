<?php

namespace App\Http\Controllers;
use App\Models\Scholarship;
use App\Models\contactus;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $scholarships = Scholarship::where('status', "ACTIVE")->where('is_delete', 0)->orderBy('id', 'DESC')->paginate(100);

        return view('home', [
            'scholarships' => $scholarships,
        ]);
    }

    public function contact_us()
    {
        return view('contact_us');
    }

    

    public function sendMessage(Request $request)
    {
            

        $contactus = new contactus();
            $contactus->name = $request->name;
            $contactus->email = $request->email;
            $contactus->phone = $request->phone;
            $contactus->message = $request->message;
            $contactus->save();
            
            // print_r($request->all());
        
     
            // if($sendMessage){
            //     return back()->with('success','Message successfuly added to database');
            //  }else{
            //      return back()->with('fail','Something went wrong, try again later');
            //  }
        

    }
}
