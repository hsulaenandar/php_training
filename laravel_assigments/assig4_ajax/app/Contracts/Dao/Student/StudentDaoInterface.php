<?php

namespace App\Contracts\Dao\Student;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Student
 */
interface StudentDaoInterface
{
  
  public function getStudentList();

  public function showSubject();
  
  public function create();

  public function store(Request $request);

  public function show($id);

  public function update(Request $request);

  public function destroy(Request $request);

  public function import(Request $request);

  public function exportUsers(Request $request);

  public function search(Request $request);
}
