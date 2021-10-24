<?php


namespace Modules\User\Src\Repositories;


use Imanghafoori\Helpers\Nullable;
use Modules\User\Src\Models\User;

class UserRepo
{
    public static function store($data): Nullable
    {
        try {
            $user = User::query()->create($data);
        }catch (\Exception $e){
            return nullable();
        }

        if(! $user->exists){
            return nullable();
        }

        return nullable($user);
    }
}
