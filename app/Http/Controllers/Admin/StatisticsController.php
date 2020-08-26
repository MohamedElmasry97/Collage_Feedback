<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Student;
use App\Models\Statistic;
use App\Models\FillFeedBack;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class StatisticsController extends MainController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.Statistics.index');
    }

    public function allCourses()
    {
        $year = Carbon::now()->format('Y');
        $sum = DB::table('fill_feedbacks')
            ->select(DB::raw('AVG(mean) as rate , course_id, instructor_id,created_at'))
            ->orderBy('course_id')
            ->groupBy(DB::raw('course_id'))
            ->groupBy(DB::raw('instructor_id'))
            ->groupBy(DB::raw('created_at'))
            ->get(['rate', 'course_id', 'instructor_id', 'created_at']);

        for ($i = 0; $i < count($sum); $i++) {
            DB::table('statistics')->updateOrInsert(['course_id' => $sum[$i]->course_id,  'created_at' => date('Y', strtotime(str_replace('-', '/', $sum[$i]->created_at)))], ['instructor_id' => $sum[$i]->instructor_id, 'mean' => $sum[$i]->rate]);
        }
        $records = Statistic::with('course')->get();
        return view('dashboard.Statistics.table', compact('records'));
    }

    public function ShowChart()
    {
        return view('dashboard.Statistics.chart');
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

        return view('dashboard.Statistics.report', compact('count', 'fill_count', 'mean', 'chart'));
    }

    public function missFeedback($id)
    {
        $students = Student::whereHas('courses', function ($q) use ($id) {
            $q->where('courses.id', $id);
        })->whereDoesntHave('fillFeedbacks', function ($q1) use ($id) {
            $q1->where('fill_feedbacks.course_id', $id);
        })->get();
        return view('dashboard.Statistics.miss_feedback', compact('students'));
    }
}
