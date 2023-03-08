<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\User;
use App\Models\ExcelModel;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;
use App\Notifications\EmailNotification;

class emailController extends Controller
{
   //Just replace ExcelModel with User ani aru sab tehi ho login ko data ko lagi
    public function email(){
        $users = ExcelModel::all();
        return view('mail', ['users' => $users]);
       //return view('mail', compact('users'));
    }

    //send email
    public function emailView($id) {
        $data = ExcelModel::find($id);
        
        return view('sendEmail', compact('data'));
    }

    //email for single user
    public function storeSingleEmail(Request $request, $id)
    {

        $user = ExcelModel::find($id);
        $details = array();

        $details['topic'] = $request->topic;
        $details['body'] = $request->body;
        $details['contexttext'] = $request->contexttext;
        $details['contexturl'] = $request->contexturl;
        $details['endtext'] = $request->endtext;

        Notification::send($user, new emailNotification($details));

        // return redirect()->view('/mail');
        return view('mail', ['message' => 'Email sent successfully!','users'=>$user]);
       // return redirect()->back()->with(['success','Email Sent Succesfully','users'=>$user]);
    }

    //send email to all
    public function emailViewAll()
    {
        return view('sendEmailAll');
    }

    public function storeAllUserEmail(Request $request)
    {

        $users = ExcelModel::all();
        $details = array();
        $details['topic'] = $request->topic;
        $details['body'] = $request->body;
        $details['contexttext'] = $request->contexttext;
        $details['contexturl'] = $request->contexturl;
        $details['endtext'] = $request->endtext;

        foreach($users as $user) {
            Notification::send($user, new emailNotification($details));
        }


       // return redirect()->view('mail');
       return view('mail', ['message' => 'Email sent successfully!','users' => $users]);
    }

}
