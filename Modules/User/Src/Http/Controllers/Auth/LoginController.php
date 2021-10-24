<?php


namespace Modules\User\Src\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Imanghafoori\HeyMan\HeyMan;
use Imanghafoori\HeyMan\StartGuarding;
use Modules\User\Src\Http\Requests\LoginRequest;
use Modules\User\Src\Facades\Response;


class LoginController
{

    public function __construct()
    {
        LoginRequest::onCheckPoint("user.login");

        resolve(StartGuarding::class)->start();
    }

    /**
     * Login api
     *
     * @return Response
     */
    public function login()
    {
        HeyMan::checkPoint("user.login");

        $inputs = request()->only(["email","password"]);
        if(Auth::attempt(['email' => $inputs["email"], 'password' => $inputs["password"]])){

            $token = Auth::user()->createToken($inputs["email"])->accessToken;

            return Response::singleUserResource(Auth::user(), $token);

        } else{
            return 'sd';
        }

    }
}
