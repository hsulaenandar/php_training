<?php

namespace App\Dao\Subject;

use App\Models\Subject\Subject;
use App\Models\Student\Student;
use App\Contracts\Dao\Subject\SubjectDaoInterface;
use Illuminate\Http\Request;

/**
 * Data accessing object for subject
 */
class SubjectDao implements SubjectDaoInterface
{
  public function getSubjectList()
  {
    $subjects = Subject::all();
    return $subjects;
  }


  public function create() {

  }

  public function store($request) {
    $request->validate([
      'subject_name'=>'required',
      'subject_id'=>'required'

    ]);
    Subject::create([
        'subject_name'=>$request->input('subject_name'),
        'subject_id'=>$request->input('subject_id')
    ]);
  }

  public function show($id) {
    $subject = Subject::find($id);
    return $subject;
  }

  public function update(Request $request, $id) {
    $request->validate([
      'subject_name'=>'required',
      'subject_id'=>'required'
  ]);

  Subject::find($id)->update([
      'subject_name'=>$request->input('subject_name'),
      'subject_id'=>$request->input('subject_id')
  ]);
  }

  public function destroy($id) {
    $students = Subject::destroy($id);
    return $students;
  }

}
