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

  public function showSubject()
  {
    return $this->studentDao->showSubject();
  }

  public function store(Request $request) 
  {
    return $this->studentDao->store($request);
  }

  public function create()
  {
    return $this->studentDao->create();
  }

  public function show($id) 
  {
    return $this->studentDao->show($id);
  }

  public function update(Request $request) 
  {
    return $this->studentDao->update($request);
  }

  public function destroy(Request $request) 
  {
    return $this->studentDao->destroy($request);
  }

  public function import(Request $request)
  {
    return $this->studentDao->import($request);
  }

  public function exportUsers(Request $request)
  {
    return $this->studentDao->exportUsers($request);
  }

  public function search(Request $request) 
  {
    return $this->studentDao->search($request);
  }

}
