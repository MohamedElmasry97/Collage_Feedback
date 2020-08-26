<?php

namespace App\Http\Controllers\API;

use App\Models\Course;
use App\Models\Student;
use App\Models\FeedBack;
use Illuminate\Support\Str;
use App\Models\FillFeedBack;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    /**
     * this is only API for student
     * function login
     * funciton register
     * function list course
     * function show feedback
     * funciton submit feedback
     * function show  reset the password
     * function send reset password with pin_code
     */
    public function studentLogin(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'email' => 'required',
            'password' => 'required|min:6|max:20',
        ]);

        if ($validator->fails()) {
            return JsonResponse(0, $validator->errors()->first(), $validator->errors());
        }

        //return Auth::guard('api')->validate($request->all());
        $student = Student::where('email', $request->email)->first();

        if ($student) {
            if (Hash::check($request->password, $student->password)) {
                $student->api_token = Str::random(60);
                $student->update();
                return JsonResponse(1, 'sccussfully login', [
                    'api_token' => $student->api_token,
                    'student' => $student,
                ]);
            } else {
                return JsonResponse(0, 'invalid input');
            }
        } else {
            return JsonResponse(0, 'invalid input');
        }
    }

    public function ResetPassword(Request $request)
    {
        $validator = validator($request->all(), [
            'phone' => 'required|exists:students,phone|digits_between:10,11',
            'email' => 'required|exists:students,email'
        ], ['invalid email or phone']);

        if ($validator->fails()) {
            return JsonResponse(0, $validator->errors()->first(), $validator->errors());
        }

        $student = Student::where('phone', $request->phone)->first();

        $code = Str::random(8);
        $update = $student->update(['pin_code' => $code]);
        if ($update) {
            // SMS_Verification($request->phone, 'Your reset Password Code is :' . $code);

            //  Mail::to($student->email)->send(new Reset_Password($code));

            return JsonResponse(1, 'check your mail', ['test_code' => $code]);
        } else {
            return JsonResponse(0, 'invalid data try again!');
        }
    }

    public function newPasswordSet(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'phone' => 'required|exists:students,phone',
            'password' => 'required|confirmed',
            'pin_code' => 'required',
        ]);

        if ($validator->fails()) {
            return JsonResponse(0, $validator->errors()->first(), $validator->errors());
        }

        $student = Student::where('phone', $request->phone)->first();
        if ($student->pin_code == $request->pin_code) {
            $request->merge(['password' => bcrypt($request->password)]);
            $update = $student->update([
                'password' => $request->password,
                'pin_code' => $request->NULL,
            ]);
            if ($update) {
                return JsonResponse(1, 'password changed');
            } else {
                return JsonResponse(0, 'password not changed');
            }
        } else {
            return JsonResponse(0, 'pin_code not correct');
        }
    }

    public function listCourses(Request $request)
    {
        $courses = FillFeedBack::whereHas('student', function ($q) use ($request) {
            $q->where('student_id', $request->user('api')->id);
        })->pluck('course_id')->toArray();

        $records = Course::whereHas('student', function ($q) use ($courses) {
            $q->whereNotIn('courses.id', $courses);
        })->get();
        return JsonResponse(1, 'list courses', $records);
    }

    public function feedbackForm(Request $request)
    {
        $user = $request->user('api');

        $user->feedbacks()->sync(FeedBack::where('is_active', true)->pluck('id'));
        $records = $user->feedbacks()->with('feedbackModel')->get();

        // $records->add(['course_id' => $request->course_id, 'instructor_id' => Course::find($request->course_id)->instructors()->pluck('instructor_id')->toArray()]);
        $response = [
            'status' => 1,
            'message' => 'feedback questions',
            'course_id' => $request->course_id,
            'instructor_id' => Course::find($request->course_id)->instructors()->pluck('instructor_id')->toArray(),
            'data' => $records,
        ];

        return response()->json($response);
    }

    public function submitFeedbackForm(Request $request)
    {
        $data1 = $request->except('records');
        $records = json_decode($request->records, true);

        $keys = [];
        foreach ($records as $listItem) {
            $keys[] = (int)$listItem[0] ;
        }
        $val = [];
        foreach ($records as $listItem) {
            $val[] = $listItem[1];
        }

        $dataAfter = array_combine($keys, $val);
        $user = $request->user('api');
        foreach ($dataAfter as $k => $value) {
            $user->fillFeedbacks()->create($data1 + ['feedback_model_id' => $k, 'mean' => $value]);
        }
        return JsonResponse(1, 'successfully add');
    }
}
