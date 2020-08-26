<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\FeedBack;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        $students = Student::count();
        $instructors = Instructor::count();
        $courses = Course::count();
        $feedbacks = FeedBack::count();
        return view('dashboard.admin.index', compact('students', 'instructors', 'courses', 'feedbacks'));
    }

    public function adminLogin()
    {
        return view('dashboard.admin.form');
    }

    public function authenticate(Request $request)
    {
        $validator = validator($request->all(), [
            'email' => 'required|exists:admins,email',
            'password' => 'required|min:8|exists:admins,password',
        ], ['invalid email or password']);

        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            return redirect()->route('admin.index');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    public function logout(Request $request)
    {
        auth('admin')->logout();
        return redirect()->route('admin.login');
    }
}
