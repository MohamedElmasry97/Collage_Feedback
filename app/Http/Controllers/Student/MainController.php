<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\FeedBack;
use App\Models\FillFeedBack;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function listCourses(Request $request)
    {
        $courses = FillFeedBack::whereHas('student', function ($q) use ($request) {
            $q->where('student_id', $request->user('student')->id);
        })->pluck('course_id')->toArray();

        $records = Course::whereHas('student', function ($q) use ($courses) {
            $q->whereNotIn('courses.id', $courses);
        })->get();
        return view('student.listcourse', compact(['records']));
    }

    public function feedbackForm(Request $request, $studentId, $courseId)
    {
        $request->user('student')->feedbacks()->sync(FeedBack::where('is_active', true)->pluck('id'));
        $records = $request->user('student')->feedbacks()->with('feedbackModel')->paginate(20);
        $records->attributes['course_id'] = $courseId;
        $records->attributes['instructor_id'] = Course::find($courseId)->instructors()->pluck('instructor_id');
        return view('feedback.feedform', compact(['records', 'courseId']));
    }

    public function submitFeedbackForm(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'instructor_id' => 'required',
            'course_id' => 'required',
            'student_id' => 'required',
            'record' => 'required|array',
            'record.[].*' => 'in:1,2,3,4',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $records = $request->record;

        foreach ($records as $k => $value) {
            $request->user('student')->fillFeedbacks()->create($request->all() + ['feedback_model_id' => $k, 'mean' => array_sum($value) / count($value)]);
        }

        return redirect()->action('Student\MainController@listCourses');
    }
}
