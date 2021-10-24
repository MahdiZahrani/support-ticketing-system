<?php
namespace Modules\User\Src\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Imanghafoori\HeyMan\Facades\HeyMan;


class RegisterRequest
{

    public static function onCheckPoint($checkPoint)
    {
        HeyMan::onCheckPoint($checkPoint)
            ->validate([
                'name_family' => 'required|string',
                'std_number' => 'required|max:10',
                'email' => 'required|email|unique:users,email',
                'phone_number' => 'required|regex:/^9\d{9}$/i|max:10|unique:users,phone_number',
                'password' => ["required", "confirmed", Password::min(8)->mixedCase()->numbers()],
                'password_confirmation' => 'required'
            ]);

    }

}
