<?php

namespace App\Dao\Student;

use App\Models\Student\Student;
use App\Models\Subject\Subject;
use App\Contracts\Dao\Student\StudentDaoInterface;
use Illuminate\Http\Request;

/**
 * Data accessing object for student
 */
class StudentDao implements StudentDaoInterface
{
  public function getStudentList()
  {
    // $students = Student::all()->get();
    $students = Student::orderBy('created_at', 'asc')->get();
    return $students;
  }


  public function create() {
    $subjects = Subject::all();
    return $subjects;
  }

  public function store($request) {
    $request->validate([
      'name'=>'required',
      'email'=>'required',
      'phone_no'=>'required',
      'address'=>'required',
      'subject'=>'required'

  ]);
  Student::create([
      'name'=>$request->input('name'),
      'email'=>$request->input('email'),
      'phone_no'=>$request->input('phone_no'),
      'address'=>$request->input('address'),
      'subject_id'=>$request->input('subject')
  ]);

  }

  public function show($id) {
    $student = Student::find($id);
    $subjects = Subject::all();
    
    return $student;
    return $subjects;
  }

  public function update(Request $request, $id) {
    $request->validate([
      'name'=>'required',
      'email'=>'required',
      'phone_no'=>'required',
      'address'=>'required',
      'subject'=>'required'
  ]);

  Student::find($id)->update([
      'name'=>$request->input('name'),
      'email'=>$request->input('email'),
      'phone_no'=>$request->input('phone_no'),
      'address'=>$request->input('address'),
      'subject_id'=>$request->input('subject')
  ]);
  }

  public function destroy($id) {
    $students = Student::destroy($id);
    return $students;
  }

}
