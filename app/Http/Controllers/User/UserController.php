<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Course, App\Message, App\Notification, App\Exam, App\User, App\Module;
use Auth, Hash, Session;

class UserController extends Controller
{
    public function index()
    {
        $courseCount= Course::where('published', 1)->count();
        $messageCount= Message::where('user_id', Auth::user()->id)->count();
        $notificationsCount= Notification::count();
        $examCount= Exam::count();
        $count = array('courses'=>$courseCount, 'messages' => $messageCount, 'notifications'=> $notificationsCount, 'exams' => $examCount);
    	return view('user.index')->with('count', $count);
    }


    public function courses()
    {
        $courses= Course::orderBy('id', 'desc')->paginate(5);
    	return view('user.courses')->withCourses($courses);
    }

    public function messages()
    {
    	//Messages where Auth::user()->id
        //Get list of all experts chatted with and remove duplicates in the array.
        // $expertids = Message::where('user_id', Auth::user()->id)->pluck('expert_id');
        // $experts = array_unique((array)$expertids);
        // $userexpert = array();
        // foreach($experts as $expert)
        // {

        // }


    	return view('user.messages');

    }

    public function messagesById($id)
    {
    	return view('user.messagesbyid');
    }

    public function settings()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('user.settings')->withUser($user);
    }

    public function notifications()
    {
        $notifications = Notification::orderBy('id', 'desc')->paginate(5);
        return view('user.notifications')->withNotifications($notifications);
    }

    public function feedback()
    {
        return view('user.feedback');
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function updateProfile()
    {
        // Validate date
        // Enter into database.
    }

    public function changepassword()
    {
        return view('user.changepwd');
    }

    public function updatepassword()
    {
        $this->validate($request, array(
                'oldpassword' => 'required',
                'password' => 'required|confirmed|min:6'
        ), $messages = [
                'oldpassword.required' => 'Old Password field is required',
                'password.required' => 'New Password is a required field',
                'min' => 'Password must be atleast 6 characters long',
        ]);

        if(Hash::check($request->oldpassword, Auth::user()->password ))
        {
            $userid = Auth::user()->id;
            $user = User::find($userid);

            $user->password = bcrypt($request->password);
            $user->save();

            Session::flash('success', 'Your password has been changed successfully.');
            return redirect()->route('user.profile');
        }

        Session::flash('warning', 'Old Password didnot match with the one in our record.');
        return redirect()->route('user.changepassword');
    }

    public function modules($coursename)
    {
        $courseid = Course::where('slug', $coursename)->pluck('id');
        $modules = Module::where('course_id', $courseid);
        return view('user.modules')->withModules($modules);
    }
}
