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

    /**Get All Data
     * @return \Dingo\Api\Http\Response
     */
    public function index()
    {
        $tasks = Task::paginate();
        return $this->response->paginator($tasks, new TaskTransformer);
    }

    /**Show Data by id
     * @param $id
     * @return \Dingo\Api\Http\Response|void
     */
    public function show($id)
    {
        try{
            $task = Task::findOrFail($id);
            return $this->response->item($task,new TaskTransformer());
        }catch (ModelNotFoundException $e){
            return $this->response->error('Model Not Found',500);
        }
    }

    /**Store DAta
     * @param TaskRequest $request
     * @return \Dingo\Api\Http\Response|void
     */
    public function store(TaskRequest $request)
    {
        try{
            $task = Task::create($request->all());
            return $this->response->item($task,new TaskTransformer());
        }catch (StoreResourceFailedException $e){
            return $this->response->error('Cannot Store Record',422 );
        }
    }

    /**Update Data
     * @param $id
     * @param Request $request
     * @return \Dingo\Api\Http\Response|void
     */
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

    /**Delete Data
     * @param $id
     */
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
