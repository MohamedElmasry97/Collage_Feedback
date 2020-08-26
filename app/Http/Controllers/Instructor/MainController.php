<?php

namespace App\Http\Controllers\Instructor;

use App\Models\Course;
use App\Models\FillFeedBack;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function listCourses(Request $request)
    {
        $records = $request->user('instructor')->courses()->get();
        return view('instructor.listcourse', compact(['records']));
    }

    public function show($id)
    {
        /**
         * all modal mean for each course
         */
        $year = Carbon::now()->format('Y');

        $rate = FillFeedBack::select(DB::raw('mean ,course_id,feedback_models.head, feedback_model_id, YEAR(fill_feedbacks.created_at) as year'))
            ->whereYear('fill_feedbacks.created_at', $year)
            ->where('course_id', $id)
            ->OrderBy('year')
            ->join('feedback_models', 'feedback_models.id', '=', 'fill_feedbacks.feedback_model_id')->get()->groupBy('feedback_model_id');

        $mean = $rate->map(function ($row) {
            return $row->avg('mean');
        });

        $chart = $rate->flatten()->pluck('head', 'feedback_model_id')->unique();

        $course = Course::find($id);

        $count = count($course->student);
        $fill_count = count($course->fills->unique('student_id'));

        return view('instructor.report', compact('count', 'fill_count', 'mean', 'chart'));
    }
}
