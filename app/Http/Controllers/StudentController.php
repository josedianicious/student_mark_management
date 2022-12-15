<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::latest()->paginate(10);
        return view('students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::get();
        return view('students.create',compact('teachers'));
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
                'student_name' => 'required|regex:/[a-zA-Z .\s]+/',
                'student_email' => 'required|unique:students,student_email|email',
                'student_phone_number' => 'required|regex:/[0-9 -+]{9,15}/',
                'gender' =>'required',
                'teacher_id' => 'required'
            ],
            [
                'student_phone_number.required' => "The Student Phone Number field is required."
            ]
        );
        $inputs = [
            'student_name' => $request->student_name,
            'student_email' => $request->student_email,
            'mobile_number' => $request->student_phone_number,
            'gender' => $request->gender,
            'teacher_id' => $request->teacher_id
        ];
        Student::create(
            $inputs
        );
        return redirect()->route('student.index')->with('success','You have successfully created the student.');
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
        $student = Student::find(decrypt($id));
        $teachers = Teacher::get();
        return view('students.edit',compact('student','teachers'));
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
                'student_name' => 'required|regex:/[a-zA-Z .\s]+/',
                'student_email' => 'required|email|unique:students,student_email,'.decrypt($id).',student_id',
                'student_phone_number' => 'required|regex:/[0-9 -+]{9,15}/',
                'gender' =>'required',
                'teacher_id' => 'required'
            ],[
            'student_phone_number.required' => "The Student Phone Number field is required."
            ]
        );
        $inputs = [
            'student_name' => $request->student_name,
            'student_email' => $request->student_email,
            'mobile_number' => $request->student_phone_number,
            'gender' => $request->gender,
            'teacher_id' => $request->teacher_id
        ];

        $student_update = Student::find(decrypt($id));
        $student_update->update($inputs);

        return redirect()->route('student.index')->with('success','You have successfully update the student details.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student_del = Student::find(decrypt($id));
        $student_del->delete();
        return redirect()->route('student.index')->with('success','You have successfully deleted the student.');
    }
}
