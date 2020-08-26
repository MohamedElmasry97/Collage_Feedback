<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Instructor\Store;
use App\Http\Requests\Instructor\Update;
use App\Imports\InstructorsImport;
use App\Models\Course;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;

class InstructorController extends MainController
{
    public function index()
    {
        $inst = Instructor::count();
        return view('dashboard.instructor.index', compact('inst'));
    }

    public function create()
    {
        return view('dashboard.instructor.form');
    }

    public function store(Store $request)
    {
        $inst = new Instructor;
        $inst->name = $request->name;
        $inst->email = $request->email;
        $inst->password = Hash::make($request->password);
        $inst->phone = $request->phone;
        $inst->save();
        return redirect()->route('instructor.create')->with('message', 'added successfully');
    }

    /**
     * instructor upload excel sheet view
     */
    public function uploadExcel()
    {
        return view('dashboard.instructor.excel');
    }

    /**
     * register instructor by excel sheet
     */
    public function InstructorExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimetypes:text/csv,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.openxmlformats-officedocument.spreadsheetml.template',
        ]);

        if (Auth::guard('web')) {
            try {
                Excel::import(new InstructorsImport, request()->file('file')->getRealPath());
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

    public function show(Request $request, $id)
    {
        $courses = Course::whereHas('instructors', function ($q) use ($id) {
            $q->where('instructor_id', $id);
        })->get();
        $a = $courses->pluck('id')->toArray();

        $co = Course::with('instructors')->whereNotIn('id', $a)->get();
        $profiles = Instructor::find($id);
        return view('dashboard.instructor.profile', compact(['profiles', 'co', 'a', 'courses']));
    }

    public function allInstructor()
    {
        // $inst = Instructor::with('courses')->get();
        $inst = Instructor::paginate(10);

        return view('dashboard.instructor.table', compact('inst'));
    }

    public function addCourse(Request $request, $instructorId, $courseId)
    {
        $course = Course::find($courseId);
        $course->instructors()->attach($instructorId);
        return redirect()->back();
    }

    public function detachCourse($id)
    {
        $courses = Course::find($id);
        $courses->instructors()->detach();
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inst = Instructor::findOrfail($id);
        return view('dashboard.instructor.edit', compact('inst'));
    }

    public function update(Update $request, $id)
    {
        $inst = instructor::findOrfail($id);
        $inst->update($request->all());
        return redirect()->route('all.instructor');
    }

    public function destroy($id)
    {
        $inst = Instructor::findOrfail($id);
        $inst->delete();
        return redirect()->route('all.instructor');
    }
}
