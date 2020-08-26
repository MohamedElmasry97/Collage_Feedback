<?php

namespace App\Http\Controllers\Instructor;

use App\Mail\ResetPassword;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Instructor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function index()
    {
        return view('instructor.loginInstructor');
    }

    /**
     * login instructor and create season for them
     * EDIT: w8 for UI | return view maintain
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loginInstructor(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'email' => 'required|exists:instructors,email',
            'password' => 'required|min:6|max:20',
        ], ['invalid email or password']);

        // if ($validator->fails()) {
        //     echo  $validator->errors();
        // }

        // Auth::guard('instructor')->validate($request->all());

        if (Auth::guard('instructor')->attempt($request->only('email', 'password'))) {
            $user = Auth::guard('instructor')->user();
            return redirect()->action('Instructor\MainController@listCourses', [$user]);
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function logout(Request $request)
    {
        auth('instructor')->logout();
        return redirect('/');
    }

    public function forgetPassword()
    {
        return view('instructor.reset_password');
    }

    public function resetPassword(Request $request)
    {
        $validator = validator($request->all(), [
            'phone' => 'required|exists:instructors,phone',
            'email' => 'required|exists:instructors,email'
        ], ['invalid email or phone']);

        $instructor = Instructor::where('email', $request->email)->where('phone', $request->phone)->first();

        if ($instructor) {
            $code = str_random(8);

            if ($instructor->update(['pin_code' => $code])) {
                //SMS_Verification($request->phone, 'Your reset Password Code is :' . $code);

                Mail::to($instructor->email)->send(new ResetPassword($code));
                return view('instructor.new_password');
            }
        } else {
            return back()->withErrors($validator)->withInput();      //w8 for UI
        }
    }

    public function updateInstructorPassword(Request $request)
    {
        $validator = validator($request->all(), [
            'email' => 'required|exists:instructors,email',
            'password' => 'required',
            'pin_code' => 'required',
        ], ['invalid input']);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $instructor = Instructor::where('email', $request->email)->first();
        if ($instructor->pin_code == $request->pin_code) {
            $request->merge(['password' => bcrypt($request->password)]);
            $update = $instructor->update([
                'password' => $request->password,
                'pin_code' => $request->NULL,
            ]);
            if ($update) {
                return view('instructor.logininstructor');
            }
        }
    }
}
