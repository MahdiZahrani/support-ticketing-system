<?php


namespace Modules\User\Src\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    protected $token = "";

    public function toArray($request): array
    {

        return [
            'success' => true,
            'data' => $this->collection,
            'meta' => [
                'token' => $this->token
            ],
        ];
    }

    public function setToken($token): UserCollection
    {
        $this->token = $token;
        return $this;
    }
}
