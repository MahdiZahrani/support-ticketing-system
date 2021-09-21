<?php

namespace Modules\Auth\Http\Controllers\Rest;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Auth\Http\Requests\RestLoginRequest;
use Illuminate\Support\Facades\Auth;
use Modules\Response\Facades\ApiResponse;

class AuthController extends Controller
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;

        return $this->sendResponse($success, 'User register successfully.');
    }


    /**
     * Login api
     *
     * @param RestLoginRequest $request
     * @return \Illuminate\Http\Response
     */
    public function login(RestLoginRequest $request)
    {

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $success['token'] =  $user->createToken($user->email)->accessToken;
            $success['name'] =  $user->name;

            return ApiResponse::sendResponse($success, 'User login successfully.');

        } else{
            return ApiResponse::sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }

    }
}
