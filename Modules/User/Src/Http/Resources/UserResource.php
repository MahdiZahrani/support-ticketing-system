<?php

namespace Modules\User\Src\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    protected $token = "";
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name_family" => $this->name_family,
            "email" => $this->email,
            "phone_number" => $this->phone_number,
            "std_number" => $this->std_number,
            "token" => $this->token
        ];
    }

    public function setToken($token): UserResource
    {
        $this->token = $token;
        return $this;
    }
}
