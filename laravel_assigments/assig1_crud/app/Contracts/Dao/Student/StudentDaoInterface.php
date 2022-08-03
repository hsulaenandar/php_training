<?php

namespace App\Contracts\Dao\Student;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Student
 */
interface StudentDaoInterface
{
  
  public function getStudentList();

  public function create();

  public function store(Request $request);

  public function show($id);

  public function update(Request $request, $id);

  public function destroy($id);
}
