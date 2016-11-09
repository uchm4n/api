<?php

namespace App\Http\Controllers;

use App\Transformers\UserTransformer;
use App\User;

class Test extends Controller
{
    public function test()
    {
        $user = new User();
        return $this->response->item($user,new UserTransformer);
    }
}
