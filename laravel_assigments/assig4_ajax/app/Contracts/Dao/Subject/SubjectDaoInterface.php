<?php

namespace App\Contracts\Dao\Subject;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Subject
 */
interface SubjectDaoInterface
{
  
  public function getSubjectList();

  public function create();

  public function store(Request $request);

  public function show($id);

  public function update(Request $request, $id);

  public function destroy($id);
}
