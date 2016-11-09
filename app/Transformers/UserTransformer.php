<?php
namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract {

    public function transform(User $user)
    {
        return [
            'id'     => (int) $user->id,
            'username'     => (int) $user->username,
            'email'     => (int) $user->email,
            'token'   => '$user->token'
        ];
    }
}