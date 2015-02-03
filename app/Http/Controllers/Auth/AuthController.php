<?php namespace TagProNews\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use TagProNews\Http\Controllers\Controller;
use TagProNews\Http\Requests\Auth\LoginRequest;
use TagProNews\Models\Token;

/**
 * Created by PhpStorm.
 * User: steve
 * Date: 03.02.15
 * Time: 20:37
 */
class AuthController extends Controller
{

    public function login(LoginRequest $request)
    {
        if (!Auth::once($request->all())) {
            return response()->json(['errors' => ['Invalid login credentials']], 401);
        }

        $factory = new \RandomLib\Factory;
        $generator = $factory->getMediumStrengthGenerator();
        $token = $generator->generateString(64);

        Token::create(['user_id' => 1, 'token' => $token]);

        return response()->json(['data' => ['token' => $token]]);
    }

    public function logout()
    {

    }

    public function register()
    {

    }

    public function resetPassword()
    {

    }
}