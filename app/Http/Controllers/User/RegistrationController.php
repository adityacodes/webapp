<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RegistrationController extends Controller
{
    public function __construct()
    {
        // $this->middleware('ajax', ['only' => ['captcha']]);
    }

    public function postRegister(Request $request)
    {

        $validator = Validator::make($request->all(), array(
            'name' => 'bail|required',
            'email' => 'bail|required|email|max:255|unique:users',
            'mobile' => 'bail|required',
            'password' => 'required|confirmed|min:6',
            'referal' => 'sometimes|integer',
            'captcha_code' => 'required|valid_captcha',
            'toa' => 'required',
            ), $messages = [
                'name.required' => '**The user name field is required.',
                'email.required' => '**The user email field is required.',
                'password.required' => '**The password field is required.',
                'unique' => '*Your email id already exists. Please login to continue.',
                'mobile.required' => '**The mobile number field is required.',
                'captcha_code.required' => '**The Captcha field is required.',
                'captcha_code.valid_captcha' => '**Wrong Captcha! Please reenter the captcha!.',
                'toa.required' => '**You must agree to the terms of service before use..',
        ]);

        if ($validator->fails()) {
            
            return redirect('register')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        //Referal-id of the person referred to is a string and not a number
        $confirmation_code = substr(md5(($request->name).'aditya') , 0, 10);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            're_id' => $request->referal,
            'confirmation_code' => $confirmation_code,
            'password' => bcrypt($request->password),
        ]);
        
        Mail::send('email.verify', [
            'name' => $request->name,
            'confirmation_code' => $confirmation_code
        ], function($message) use ($request) {
            $message->from('admin@mmm-union.org', 'MMM UNION');
            $message->to($request->email, $request->name)->subject('Verification Link');
        });
        Session::flash('success', 'A verification link has been sent to your email. Please verify to login.');
        
        return redirect('/');   
    }

    public function confirm($confirmation_code)
    {
        if(!$confirmation_code)
        {
            return redirect()->route('user.dashboard');
        }

        $user = User::where('confirmation_code', $confirmation_code)->first();

        if (!$user)
        {
            Session::flash('warning', 'Confirmation token seems to be invalid. Please check the !');
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();

        Session::flash('success', 'You have been successfully verified! Please login to continue');

        return Redirect::to('/');
    }
}
