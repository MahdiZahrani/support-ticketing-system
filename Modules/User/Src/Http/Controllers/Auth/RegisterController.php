<?php

namespace Modules\User\Src\Http\Controllers\Auth;

use Imanghafoori\HeyMan\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use Modules\User\Src\Http\Requests\RegisterRequest;
use Modules\User\Src\Repositories\UserRepo;
use Modules\User\Src\Facades\Response;

class RegisterController
{

    public function __construct()
    {
        RegisterRequest::onCheckPoint('user.register');

        resolve(StartGuarding::class)->start();
    }

    public function register()
    {
        HeyMan::checkPoint("user.register");

        $input = request()->only(["name_family","std_number","email","phone_number","password"]);

        $input['password'] = bcrypt($input['password']);

        $user = UserRepo::store($input)->getOrSend([Response::class,'registerFailed']);

        $token = $user->createToken($user->email)->accessToken;

        return Response::singleUserResource($user,$token);
    }

}
