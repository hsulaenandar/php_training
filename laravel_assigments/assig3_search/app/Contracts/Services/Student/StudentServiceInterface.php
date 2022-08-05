<?php

namespace App\Contracts\Services\Student;

use Illuminate\Http\Request;

/**
 * Interface for student service
 */
interface StudentServiceInterface
{

  public function getStudentList();

  public function create();

  public function store(Request $request);

  public function show($id);

  public function update(Request $request, $id);

  public function destroy($id);

  public function import(Request $request);

  public function exportUsers(Request $request);

  public function search(Request $request);
  
}
