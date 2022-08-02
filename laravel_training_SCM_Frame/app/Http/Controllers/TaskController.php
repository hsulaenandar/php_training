<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Services\Task\TaskServiceInterface;

class TaskController extends Controller
{

    /**
   * task interface
   */
  private $taskInterface;
  /**
   * Create a new controller instance.
   * @param TaskServiceInterface $taskServiceInterface
   * @return void
   */
  public function __construct(TaskServiceInterface $taskServiceInterface)
  {
    
    $this->taskInterface = $taskServiceInterface;
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tasks = Task::orderBy('created_at', 'asc')->get();

        $tasks = $this->taskInterface->getTaskList();
 
        return view('tasks', [
            'tasks' => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|max:255',
    //     ]);
    //  
    //     if ($validator->fails()) {
    //         return redirect('/')
    //             ->withInput()
    //             ->withErrors($validator);
    //     }
    //  
    //     $task = new Task;
    //     $task->name = $request->name;
    //     $task->save();

        $tasks = $this->taskInterface->saveTask($request);
     
        return redirect('task')->with('message',$tasks);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $tasks = Task::orderBy('created_at', 'asc')->get();
        // $task = Task::findOrFail($id);

        $tasks = $this->taskInterface->getTaskById($id);
        
        return view('tasks', [
            'tasks' => $tasks['tasks'],
            'task' => $tasks['task']
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    //     echo "Hey";
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|max:255',
    //     ]);
    //  
    //     if ($validator->fails()) {
    //         return redirect('/')
    //             ->withInput()
    //             ->withErrors($validator);
    //     }
    //  
    //     $task = Task::findOrFail($id);
    //     $task->name = $request->name;
    //     $task->save();

        $tasks = $this->taskInterface->updateTask( $request, $id);
        return redirect('task')->with('message',$tasks);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Task::findOrFail($id)->delete();
        $tasks = $this->taskInterface->deleteTaskById($id); 
        return redirect('task')->with('message',$tasks);
    }
}
