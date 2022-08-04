<?php

namespace App\Services\Student;

use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Contracts\Services\Student\StudentServiceInterface;
use Illuminate\Http\Request;

/**
 * Service class for student.
 */
class StudentService implements StudentServiceInterface
{
  /**
   * studentDao
   */
  private $studentDao;
  /**
   * Class Constructor
   * @param StudentDaoInterface
   * @return
   */
  public function __construct(StudentDaoInterface $studentDao)
  {
    $this->studentDao = $studentDao;
  }
 
  public function getStudentList()
  {
    return $this->studentDao->getStudentList();
  }

  public function create() 
  {
    return $this->studentDao->create();
  }

  public function store(Request $request) 
  {
    return $this->studentDao->store($request);
  }

  public function show($id) 
  {
    return $this->studentDao->show($id);
  }

  public function update(Request $request, $id) 
  {
    return $this->studentDao->update($request, $id);
  }

  public function destroy($id) 
  {
    return $this->studentDao->destroy($id);
  }

  public function import(Request $request)
  {
    return $this->studentDao->import($request);
  }

  public function exportUsers(Request $request)
  {
    return $this->studentDao->exportUsers($request);
  }

}
