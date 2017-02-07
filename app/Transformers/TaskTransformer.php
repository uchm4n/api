<?php
namespace App\Transformers;

use App\Task;
use League\Fractal\TransformerAbstract;

class TaskTransformer extends TransformerAbstract {

    //Temp disable user includes
    //protected $defaultIncludes = ['user'];

    public function transform(Task $task)
    {
        return [
            'id'     => (int) $task->id,
            'title'     => $task->title,
            'completed'   => (boolean)$task->completed,
            'created_at'   => $task->created_at,
        ];
    }

    /**
     * @param Task $task
     * @return \League\Fractal\Resource\Item
     */
    public function includeUser(Task $task)
    {
        $user = $task->user();
        return $this->item($user, new UserTransformer);
    }
}