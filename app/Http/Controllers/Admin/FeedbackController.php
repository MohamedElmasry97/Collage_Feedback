<?php

namespace App\Http\Controllers\Admin;

use App\Imports\FeedbacksImport;
use App\Models\FeedBack;
use App\Models\FeedbackModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;

class FeedbackController extends MainController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedback = FeedBack::all();
        return view('dashboard.feedback.index', compact('feedback'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $models = FeedbackModel::all();
        return view('dashboard.feedback.form', compact('models'));
    }

    public function allFeedbacks()
    {
        $feedbacks = FeedBack::all();
        return view('dashboard.feedback.table', compact('feedbacks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $feedback = FeedBack::create($request->all());
        return redirect()->back();
    }

    public function uploadExcel()
    {
        return view('dashboard.feedback.excel');
    }

    public function FeedbackExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimetypes:text/csv,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.openxmlformats-officedocument.spreadsheetml.template',
        ]);

        if (Auth::guard('admin')) {
            try {
                Excel::import(new FeedbacksImport, request()->file('file')->getRealPath());
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feedbacks = FeedBack::findOrfail($id);
        $models = FeedbackModel::all();
        return view('dashboard.feedback.edit', compact('feedbacks', 'models'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $feedbacks = FeedBack::findOrfail($id);
        ($request->has('is_active')) ? $feedbacks->update($request->all()) : $feedbacks->update($request->all() + ['is_active' => false]);
        return redirect()->route('feedback.all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feedbacks = FeedBack::find($id);
        $feedbacks->delete();
        return redirect()->route('feedback.all');
    }
}
