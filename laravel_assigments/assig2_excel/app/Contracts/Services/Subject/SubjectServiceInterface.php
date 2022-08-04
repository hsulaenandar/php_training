<?php

namespace App\Contracts\Services\Subject;

use Illuminate\Http\Request;

/**
 * Interface for subject service
 */
interface SubjectServiceInterface
{

  public function getSubjectList();

  public function create();

  public function store(Request $request);

  public function show($id);

  public function update(Request $request, $id);

  public function destroy($id);
  
}
