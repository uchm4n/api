<?php
namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract {

    public function transform(User $user)
    {
        return [
            'id'     => (int) $user->id,
            'name'     => $user->name,
            'email'     => $user->email,
            'phone'   => $user->phone,
            'bio'   => $user->bio,
            'image'   => $user->image,
            'createdAt'   => $user->created_at,
        ];
    }
}