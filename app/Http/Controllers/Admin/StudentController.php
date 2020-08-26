<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Student\Store;
use App\Http\Requests\Student\Update;
use App\Imports\StudentsImport;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;

class StudentController extends MainController
{
    public function index()
    {
        $count = Student::count();
        return view('dashboard.student.index', compact('count'));
    }

    public function create()
    {
        return view('dashboard.student.form');
    }

    public function store(Store $request)
    {
        $students = new Student;
        $students->name = $request->name;
        $students->email = $request->email;
        $students->phone = $request->phone;
        $students->department_name = $request->department_name;
        $students->password = Hash::make($request->password);
        $students->save();

        return redirect()->route('student.index');
    }

    /**
     * upload Excel sheet
     */
    public function uploadExcel()
    {
        return view('dashboard.student.excel');
    }

    /**
     * register Students by excel sheet
     */
    public function StudentExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimetypes:text/csv,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.openxmlformats-officedocument.spreadsheetml.template',
        ]);

        if (Auth::guard('web')) {
            try {
                Excel::import(new StudentsImport, request()->file('file')->getRealPath());
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

    /**
     * list all student in order by name
     */
    public function allStudent()
    {
        $count = Student::count();
        $students = Student::paginate(10);
        return view('dashboard.student.table', compact('students', 'count'));
    }

    /**
     * show the Student information
     */
    public function show(Request $request, $id)
    {
        $courses = Course::whereHas('student', function ($q) use ($id) {
            $q->where('student_id', $id);
        })->get();
        $a = $courses->pluck('id')->toArray();

        $co = Course::with('student')->whereNotIn('id', $a)->get();
        $profiles = Student::find($id);
        return view('dashboard.student.profile', compact(['profiles', 'co', 'a', 'courses']));
    }

    public function addCourse(Request $request, $studentId)
    {
        $student = Student::find($studentId);
        $student->courses()->sync($request->course);
        $request->session()->flash('addCourse', 'Task was successful!');
        return back();
    }

    public function detachCourse($id)
    {
        $courses = Course::find($id);
        $courses->student()->detach();
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
        $students = Student::find($id);
        return view('dashboard.student.edit', compact('students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, $id)
    {
        $students = Student::findOrfail($id);
        $students->update($request->all());
        return redirect()->route('all.student');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $students = Student::findOrFail($id);
        $students->delete();
        return redirect()->route('all.student');
    }
}
