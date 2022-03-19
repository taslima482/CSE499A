<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;



use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Helper
{

    // if true then the button will be visible
    public static function is_applied_for_scholarship(int $scholarship_id)
    {
        if(Auth::check())
        {
            $user = User::find(auth()->user()->id);
            if($user->hasPermissionTo('apply-scholarship'))
            {
                $student = $user->student_information;
                if($student){
                    $applied_scholarships = $student->scholarships->where('id',$scholarship_id)->count();
                    if(!$applied_scholarships)
                    return true;
                else
                    return false;
                }else {
                    return true;
                }
                

            }else if($user->hasRole('TENANT'))
                return false;
            else {
                return true;
            }

        }else
            return true;
    }

    public static function sendSMS($contracts,$message)
    {
        $url = "https://msg.elitbuzz-bd.com/smsapi";
        $data = [
          "api_key" => "C2008095618587fd616629.30891805",
          "type" => "text",
          "contacts" => $contracts,
          "senderid" => "8809612436577",
          "msg" => $message,
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
}
