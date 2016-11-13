<?php
namespace App\Transformers;

use App\Task;
use App\Transformers\UserTransformer;
use App\User;
use League\Fractal\TransformerAbstract;

class TaskTransformer extends TransformerAbstract {

    protected $defaultIncludes = [ 'user' ];

    public function transform(Task $task)
    {
        return [
            'id'     => (int) $task->id,
            'title'     => $task->title,
            'completed'   => (boolean)$task->completed,
            'created_at'   => $task->created_at,
        ];
    }

    public function includeUser(Task $task){
        $user = $task->user;
        return $this->item($user, new UserTransformer());
    }
}