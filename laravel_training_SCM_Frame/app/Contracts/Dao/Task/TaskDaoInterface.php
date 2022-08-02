<?php

namespace App\Contracts\Dao\Task;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Task
 */
interface TaskDaoInterface
{
  /**
   * To save task
   * @param Request $request request with inputs
   * @return Object $task saved task
   */
  public function saveTask($request);

  /**
   * To get task list
   * @return $taskList
   */
  public function getTaskList();

  /**
   * To delete task by id
   * @param string $id task id
   * @param string $deletedUserId deleted task id
   * @return string $message message success or not
   */
  public function deleteTaskById($id);

  /**
   * To get task by id
   * @param string $id task id
   * @return Object $task task object
   */
  public function getTaskById($id);

  /**
   * To update task by id
   * @param Request $request request with inputs
   * @param string $id Task id
   * @return Object $task Task Object
   */
  public function updateTask(Request $request, $id);

  
}
