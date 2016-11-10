<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUser;
use App\Transformers\UserTransformer;
use App\User;
use Dingo\Api\Contract\Http\Request;
use Psy\Exception\ErrorException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;

class UserController extends Controller
{
    public function all()
    {
        $user = User::all();
        return $this->response->collection($user,new UserTransformer);
    }

    public function user()
    {
        return JWTAuth::parseToken()->toUser();
    }

    /**
     * Authenticate users by Email and Password
     * @param Request $request
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only(['email','password']);
        $token = JWTAuth::attempt($credentials);

        try{
            if(!$token){
                $this->response->errorUnauthorized();
            }
        }catch (JWTException $e){
            return $this->response->errorInternal();
        }

        return $this->response->array(compact('token'));

    }

    public function register(RegisterUser $request)
    {
        try{
            return User::create($request->all());
        }catch (ErrorException $e){
            return $this->response->errorInternal('Something went wrong',$e);
        }

    }

}
