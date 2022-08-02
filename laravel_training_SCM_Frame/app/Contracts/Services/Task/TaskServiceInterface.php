<?php

namespace App\Contracts\Services\Task;

use Illuminate\Http\Request;

/**
 * Interface for task service
 */
interface TaskServiceInterface
{
  /**
   * To get task by id
   * @param string $id task id
   * @return Object $task task object
   */
  public function getTaskById($id);

  /**
   * To get task list
   * @return array $taskList list of tasks
   */
  public function getTaskList();

  /**
   * To Update Task with values from request
   * @param Request $request request including inputs
   * @return Object updated task object
   */
  public function updateTask(Request $request, $id);

  /**
   * To delete task by id
   * @param string $id task id
   * @param string $deletedTaskId deleted task id
   * @return string $message message for success or not
   */
  public function deleteTaskById($id);


  /**
   * To save task that from api request
   * @param array $validated Validated values form request
   * @return Object created task object
   */
  public function saveTask($request);

  
}
