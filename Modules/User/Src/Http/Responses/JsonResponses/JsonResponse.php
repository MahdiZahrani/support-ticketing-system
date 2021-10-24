<?php


namespace Modules\User\Src\Http\Responses\JsonResponses;


use Modules\Response\Facades\ApiResponse;
use Modules\User\Src\Http\Resources\UserCollection;
use Modules\User\Src\Http\Resources\UserResource;


class JsonResponse
{
    public function registerFailed()
    {
        return ApiResponse::sendError("cant create user",422);
    }

    public function singleUserResource($user ,$token)
    {
        return (new UserResource($user))->setToken($token);
    }

    public function registerForm($errors)
    {
        return ApiResponse::sendError($errors,422);
    }

}
