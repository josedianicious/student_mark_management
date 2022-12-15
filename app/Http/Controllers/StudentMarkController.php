<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentMark;
use App\Models\Term;
use Illuminate\Http\Request;

class StudentMarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student_marks = StudentMark::get();
        return view('marks.index',compact('student_marks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::get();
        $terms = Term::get();
        return view('marks.create',compact('students','terms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'student_id' => 'required',
                'term_id' => 'required',
                'maths_mark' => 'required|min:0|max:50',
                'science_mark' => 'required|min:0|max:50',
                'history_mark' => 'required|min:0|max:50',
            ]
        );
        $total_mark = $request->maths_mark+$request->science_mark+$request->history_mark;
        StudentMark::updateOrCreate(
            [
                'student_id' => $request->student_id,
                'term_id' => $request->term_id,
            ], [
                'maths_mark' => $request->maths_mark,
                'science_mark' => $request->science_mark,
                'history_mark' => $request->history_mark,
                'total_mark' => $total_mark
            ]

        );
        return redirect()->route('student-mark.index')->with('success','Student mark has been successfully inserted.');
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
        $mark = StudentMark::find(decrypt($id));
        $students = Student::get();
        $terms = Term::get();
        return view('marks.edit',compact('students','terms','mark'));
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
        $request->validate(
            [
                'student_id' => 'required',
                'term_id' => 'required',
                'maths_mark' => 'required|min:0|max:50',
                'science_mark' => 'required|min:0|max:50',
                'history_mark' => 'required|min:0|max:50',
            ]
        );
        $checkStudentMark = StudentMark::where('term_id',$request->term_id)
                            ->where('student_id',$request->student_id)
                            ->where('mark_id','!=',decrypt($id))
                            ->count();
        if ($checkStudentMark) {
            return redirect()->back()->with('failure','This student\'s term marks are already updated.');
        }
        $total_mark = $request->maths_mark+$request->science_mark+$request->history_mark;
        $student_mark = StudentMark::find(decrypt($id));
        $student_mark->update(
            [
                'student_id' => $request->student_id,
                'term_id' => $request->term_id,
                'maths_mark' => $request->maths_mark,
                'science_mark' => $request->science_mark,
                'history_mark' => $request->history_mark,
                'total_mark' => $total_mark
            ]

        );
        return redirect()->route('student-mark.index')->with('success','Student mark has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studentMarkDel = StudentMark::find(decrypt($id));
        $studentMarkDel->delete();
        return redirect()->route('student-mark.index')->with('success','You have successfully deleted the student mark.');
    }

     /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'email' => 'email address',
        ];
    }
}
