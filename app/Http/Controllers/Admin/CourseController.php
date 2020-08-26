<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Student\Update;
use App\Imports\CoursesImport;
use App\Models\Course;
use App\Models\Department;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;

class CourseController extends MainController
{
    public function index()
    {
        $count = Course::count();
        return view('dashboard.course.index', compact('count'));
    }

    public function create()
    {
        $courses = Course::all();
        $departs = Department::all();
        $instructors = Instructor::all();
        return view('dashboard.course.form', compact(['instructors', 'departs', 'courses']));
    }

    public function store(Request $request)
    {
        $course = Course::create($request->all());
        $course->instructors()->attach($request->instructor_id);
        return redirect()->route('all.course');
    }

    public function allCourse()
    {
        $courses = Course::with('instructors')->orderBy('symbolic', 'ASC')->get();
        return view('dashboard.course.table', compact('courses'));
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $courses = Course::findOrfail($id);
        $departs = Department::all();
        $instructors = Instructor::all();
        return view('dashboard.course.edit', compact(['instructors', 'courses', 'departs']));
    }

    public function update(Request $request, $id)
    {
        $courses = Course::findOrfail($id);
        $courses->update($request->all());
        $courses->instructors()->sync($request->instructor_id);
        return redirect()->route('all.course');
    }

    public function uploadExcel()
    {
        return view('dashboard.course.excel');
    }

    public function CourseExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimetypes:text/csv,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.openxmlformats-officedocument.spreadsheetml.template',
        ]);

        if (Auth::guard('admin')) {
            try {
                Excel::import(new CoursesImport, request()->file('file')->getRealPath());
            } catch (ValidationException $e) {
                $failures = $e->failures();
                $errormessage = '';
                foreach ($failures as $failure) {
                    $failure->row(); // row that went wrong
                    $failure->attribute(); // either heading key (if using heading row concern) or column index
                    $failure->errors(); // Actual error messages from Laravel validator
                    $failure->values(); // The values of the row that has failed.
                }
                $errormessage = $errormessage . " ,\n At Row " . $failure->row() . ', ' . $failure->errors() . '<br>';
                return redirect()->back()->with('error', $errormessage);
            }
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $courses = Course::find($id);
        $courses->delete();
        return redirect()->route('all.course');
    }
}
