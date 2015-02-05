<?php namespace TagProNews\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use TagProNews\Http\Controllers\Controller;
use TagProNews\Http\Requests\Auth\LoginRequest;
use TagProNews\Http\Requests\Auth\RegistrationRequest;
use TagProNews\Models\Token;
use TagProNews\Models\User;

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

        Token::create(['user_id' => Auth::id(), 'token' => $token]);

        return response()->json(['data' => ['token' => $token]]);
    }

    public function logout(Request $request)
    {
        Token::where(['user_id' => Auth::id(), 'token' => $request->header('Authorization')])->delete();

        return $this->code(204);
    }

    public function register(RegistrationRequest $request)
    {
        $factory = new \RandomLib\Factory;
        $generator = $factory->getLowStrengthGenerator();
        $confirmationCode = $generator->generateString(64);

        $user = new User;
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user->email = $request->input('email');
        $user->confirmation_code = $confirmationCode;
        $user->save();

        return $this->code(204);
    }

    public function resetPassword()
    {

    }
}