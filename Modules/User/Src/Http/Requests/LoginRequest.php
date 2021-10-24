<?php

namespace Modules\User\Src\Http\Requests;

use Imanghafoori\HeyMan\Facades\HeyMan;

class LoginRequest
{

    public static function onCheckPoint($checkPoint)
    {
        HeyMan::onCheckPoint($checkPoint)
            ->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

    }
}
