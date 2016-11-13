<?php

namespace App\Http\Controllers;

use App\Task;
use App\Transformers\TaskTransformer;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function all()
    {
        $tasks = Task::all();
        return $this->response->collection($tasks, new TaskTransformer);
    }


}
