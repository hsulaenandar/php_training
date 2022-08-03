<?php

namespace App\Services\Subject;

use App\Contracts\Dao\Subject\SubjectDaoInterface;
use App\Contracts\Services\Subject\SubjectServiceInterface;
use Illuminate\Http\Request;

/**
 * Service class for subject.
 */
class SubjectService implements SubjectServiceInterface
{
  /**
   * subjectDao
   */
  private $subjectDao;
  /**
   * Class Constructor
   * @param SubjectDaoInterface
   * @return
   */
  public function __construct(SubjectDaoInterface $subjectDao)
  {
    $this->subjectDao = $subjectDao;
  }
 
  public function getSubjectList()
  {
    return $this->subjectDao->getSubjectList();
  }

  public function create() 
  {
    return $this->subjectDao->create();
  }

  public function store(Request $request) 
  {
    return $this->subjectDao->store($request);
  }

  public function show($id) 
  {
    return $this->subjectDao->show($id);
  }

  public function update(Request $request, $id) 
  {
    return $this->subjectDao->update($request, $id);
  }

  public function destroy($id) 
  {
    return $this->subjectDao->destroy($id);
  }

}
