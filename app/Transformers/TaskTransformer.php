<?php
namespace App\Transformers;

use App\Task;
use App\User;
use League\Fractal\TransformerAbstract;

class TaskTransformer extends TransformerAbstract {

    public function transform(Task $task)
    {
        return [
            'id'     => (int) $task->id,
            'title'     => $task->title,
            'user_id'     => (int)$task->user_id,
            'completed'   => (boolean)$task->completed,
            'created_at'   => $task->created_at,
        ];
    }
}