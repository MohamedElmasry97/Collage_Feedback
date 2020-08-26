<?php

namespace App\Http\Controllers\Student;

use App\Models\Student;
use App\Mail\ResetPassword;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function index()
    {
        return view('student.loginstudent');
    }

    /**
     * login student and create season for them
     * EDIT: w8 for UI | return view maintain
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loginStudent(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'email' => 'required|exists:students,email',
            'password' => 'required|min:6|max:20',
        ], ['invalid email or password']);

        if (Auth::guard('student')->attempt($request->only('email', 'password'))) {
            $user = Auth::guard('student')->user();
            return redirect()->action('Student\MainController@listCourses', [$user]);
        } else {
            return back()->withErrors($validator)->withInput();
        }
    }

    public function logout(Request $request)
    {
        auth('student')->logout();
        return redirect('/');
    }

    public function forgetPassword()
    {
        return view('student.reset_password');
    }

    public function resetPassword(Request $request)
    {
        $validator = validator($request->all(), [
            'phone' => 'required|exists:students,phone|digits',
            'email' => 'required|exists:students,email'
        ], ['invalid email or phone']);

        $student = Student::where('email', $request->email)->where('phone', $request->phone)->first();
        if ($student) {
            $code = str_random(8);
            if ($student->update(['pin_code' => $code])) {
                //SMS_Verification($request->phone, 'Your reset Password Code is :' . $code);

                Mail::to($student->email)->send(new ResetPassword($code));
                return view('student.new_password');
            }
        } else {
            return back()->withErrors($validator)->withInput();
        }
    }

    public function updateStudentPassword(Request $request)
    {
        $validator = validator($request->all(), [
            'email' => 'required|exists:students,email',
            'password' => 'required',
            'pin_code' => 'required',
        ], ['invalid inputs']);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $student = Student::where('email', $request->email)->first();
        if ($student->pin_code == $request->pin_code) {
            $request->merge(['password' => bcrypt($request->password)]);
            $update = $student->update([
                'password' => $request->password,
                'pin_code' => $request->NULL,
            ]);
            if ($update) {
                return view('student.loginstudent');
            }
        }
    }
}
