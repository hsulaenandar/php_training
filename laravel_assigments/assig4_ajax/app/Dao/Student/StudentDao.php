<?php

namespace App\Dao\Student;

use App\Models\Student\Student;
use App\Models\Subject\Subject;
use App\Contracts\Dao\Student\StudentDaoInterface;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUser;
use App\Exports\ExportUser;

/**
 * Data accessing object for student
 */
class StudentDao implements StudentDaoInterface
{
  public function getStudentList()
  {
    $students = Student::orderBy('id', 'asc')->get();
    return $students;
  }

  public function showSubject()
  {
    $subject = Subject::all();
    return $subject;
  }

  public function create(){

}


  public function store($request) {
    $student = Student::create([
        'name'=>$request->input('name'),
        'email'=>$request->input('email'),
        'phone_no'=>$request->input('phone_no'),
        'address'=>$request->input('address'),
        'subject_id'=>$request->input('subject')
    ]);

    return $student;

  }

  public function show($id) {
    $student = Student::find($id);
    $subjects = Subject::all();
    
    return $student;
    return $subjects;
  }

  public function update(Request $request) {
  $students = Student::where('id',$request->id)->first();
    return $students;

  }

  public function destroy(Request $request) {
    $students = Student::where('id',$request->id)->delete();
    return $students;
  }

  public function import(Request $request) {
    return Excel::import(new ImportUser, $request->file('file')->store('files'));
  }

  public function exportUsers(Request $request) {
    return Excel::download(new ExportUser, 'students.xlsx');
  }

public function search(Request $request)
{
    if($request->isMethod('post'))
    {
        $name = $request->get('name');
        $address = $request->get('address');
        $startdate = $request->get('start-date');
        $enddate = $request->get('end-date');
        if($name){
            $students = Student::where('name','LIKE','%'.$name.'%')->get();
        }
        if($address)
        {
            $students = Student::where('address','LIKE','%'.$address.'%')->get();
        }
        if($startdate)
        {
            $students = Student::where('created_at','>=',$startdate)->get();
        }
        if($enddate)
        {
            $students = Student::where('created_at','<=',$enddate)->get();
        }
    } 
    return $students;
}

}
