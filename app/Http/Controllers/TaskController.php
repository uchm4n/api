<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Task;
use App\Transformers\TaskTransformer;
use Dingo\Api\Exception\DeleteResourceFailedException;
use Dingo\Api\Exception\StoreResourceFailedException;
use Dingo\Api\Exception\UpdateResourceFailedException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::all();
        return $this->response->collection($tasks, new TaskTransformer);
    }

    public function show($id)
    {
        try{
            $task = Task::findOrFail($id);
            return $this->response->item($task,new TaskTransformer());
        }catch (ModelNotFoundException $e){
            return $this->response->error('Model Not Found',500);
        }
    }

    public function store(TaskRequest $request)
    {
        try{
            $task = Task::create($request->all());
            return $this->response->item($task,new TaskTransformer());
        }catch (StoreResourceFailedException $e){
            return $this->response->error('Cannot Store Record',422 );
        }
    }

    public function update($id,Request $request)
    {
        try{
            $task = Task::findOrFail($id);
            $task->update($request->all());
            return $this->response->item($task,new TaskTransformer());
        }catch (UpdateResourceFailedException $e){
            return $this->response->error('Cannot Update Record',422 );
        }

    }

    public function destroy($id)
    {
        try{
            $task = Task::findOrFail($id);
            $task->delete();
            return $this->response->array(['Record was deleted']);
        }catch (DeleteResourceFailedException $e){
            return $this->response->error('Cannot Delete Record',422 );
        }
    }


}
