<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Statistic;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ChartController extends MainController
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function chartLine(Request $request)
    {
        if ($request->has('year')) {
            $year = $request->year;
        } elseif ($request->has('course_year') && $request->has('course_term')) {
            $course_year = Course::where('symbolic', 'like', $request->input('course_year') . '%')->where('symbolic', 'like', '_' . $request->input('course_term') . '%')->get();
        } elseif ($request->has('course_year')) {
            $course_year = Course::where('symbolic', 'like', $request->input('course_year') . '%')->get();
        } else {
            $year = Carbon::now()->format('Y');
        }
        $list = Statistic::select(DB::raw('statistics.created_at as year'))
        ->OrderBy('year', 'desc')
        ->distinct()
        ->pluck('year')->toArray();
        $var = Statistic::select(DB::raw('mean ,course_id, courses.name as course_name, courses.symbolic as symbolic , YEAR(statistics.created_at) as year'))
            ->where('statistics.created_at', $year)
            ->whereHas('course', function ($q) use ($request) {
                if ($request->has('course_year') && $request->has('course_term')) {
                    $q->where('courses.symbolic', 'like', $request->input('course_year') . '%')->where('courses.symbolic', 'like', '_' . $request->input('course_term') . '%');
                }
                if ($request->has('course_year')) {
                    $q->where('courses.symbolic', 'like', $request->input('course_year') . '%');
                }
            })
            ->join('courses', 'courses.id', '=', 'statistics.course_id')
            ->OrderBy('mean', 'desc')
            ->pluck('mean', 'course_name');

        $rate = Statistic::select(DB::raw('mean ,course_id,courses.symbolic, courses.name as course_name, YEAR(statistics.created_at) as year'))
            ->whereHas('course', function ($q) use ($request) {
                if ($request->has('course_year') && $request->has('course_term')) {
                    $q->where('courses.symbolic', 'like', $request->input('course_year') . '%')->where('courses.symbolic', 'like', '_' . $request->input('course_term') . '%');
                }
                if ($request->has('course_year')) {
                    $q->where('courses.symbolic', 'like', $request->input('course_year') . '%');
                }
            })
            ->where('statistics.created_at', 2020)
            ->OrderBy('year')
            ->join('courses', 'courses.id', '=', 'statistics.course_id')->get()->toArray();

        $mean = array_column($rate, 'mean');

        $chart = array_column($rate, 'course_name');

        return view('dashboard.Statistics.chart', compact('year', 'var', 'chart', 'mean', 'list'));
    }
}
