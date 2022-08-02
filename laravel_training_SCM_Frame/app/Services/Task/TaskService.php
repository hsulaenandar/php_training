<?php

namespace App\Services\Task;

use App\Contracts\Dao\Task\TaskDaoInterface;
use App\Contracts\Services\Task\TaskServiceInterface;
use Illuminate\Http\Request;

/**
 * Service class for task.
 */
class TaskService implements TaskServiceInterface
{
  /**
   * task dao
   */
  private $taskDao;
  /**
   * Class Constructor
   * @param TaskDaoInterface
   * @return
   */
  public function __construct(TaskDaoInterface $taskDao)
  {
    $this->taskDao = $taskDao;
  }

  /**
   * To save task
   * @param Request $request request with inputs
   * @return Object $post saved post
   */
  public function saveTask($request)
  {
    return $this->taskDao->saveTask($request);
  }

  /**
   * To get task list
   * @return array $taskList Task list
   */
  public function getTaskList()
  {
    return $this->taskDao->getTaskList();
  }

  /**
   * To delete task by id
   * @param string $id task id
   * @param string $deletedUserId deleted user id
   * @return string $message message success or not
   */
  public function deleteTaskById($id)
  {
    return $this->taskDao->deleteTaskById($id);
  }

  /**
   * To get task by id
   * @param string $id task id
   * @return Object $task task object
   */
  public function getTaskById($id)
  {
    return $this->taskDao->getTaskById($id);
  }

  /**
   * To update task by id
   * @param Request $request request with inputs
   * @param string $id Task id
   * @return Object $task Task Object
   */
  public function updateTask(Request $request, $id)
  {
    return $this->taskDao->updateTask($request, $id);
  }
  
  
}
