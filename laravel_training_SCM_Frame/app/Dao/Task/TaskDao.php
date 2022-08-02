<?php

namespace App\Dao\Task;

use App\Models\Task;
use App\Contracts\Dao\Task\TaskDaoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Data accessing object for task
 */
class TaskDao implements TaskDaoInterface
{
  /**
   * To save task
   * @param Request $request request with inputs
   * @return Object $task saved task
   */
  public function saveTask($request)
  {
      $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return "Save Successful.";

  }

  /**
   * To get task list
   * @return array $taskList Task list
   */
  public function getTaskList()
  {
    $tasks = Task::orderBy('created_at', 'asc')->get();
    return $tasks;
  }

  /**
   * To delete task by id
   * @param string $id task id
   * @param string $deletedUserId deleted user id
   * @return string $message message success or not
   */
  public function deleteTaskById($id)
  {
    Task::findOrFail($id)->delete();

    return "Delete task successful";
  }

  /**
   * To get post by id
   * @param string $id task id
   * @return Object $task task object
   */
  public function getTaskById($id)
  {
    $tasks = Task::orderBy('created_at', 'asc')->get();
    $task = Task::findOrFail($id);

    $taskInfo = array(
      'tasks' => $tasks,
      'task' => $task
    );
    return $taskInfo;
  }

  /**
   * To update task by id
   * @param Request $request request with inputs
   * @param string $id Task id
   * @return Object $task Task Object
   */
  public function updateTask(Request $request, $id)
  {
    echo "Hey";
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);
     
        if ($validator->fails()) {
            // return redirect('task')
            //     ->withInput()
            //     ->withErrors($validator);
            //     ->withErrors('Update Fail');

            return "Update Fail!";
                
        }
     
        $task = Task::findOrFail($id);
        $task->name = $request->name;
        $task->save();

        return "Update Successful!";
  }

  
}
