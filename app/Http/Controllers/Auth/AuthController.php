<?php namespace TagProNews\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use RandomLib\Factory;
use TagProNews\Http\Controllers\Controller;
use TagProNews\Http\Requests\Auth\LoginRequest;
use TagProNews\Http\Requests\Auth\PasswordResetCompleteRequest;
use TagProNews\Http\Requests\Auth\PasswordResetRequest;
use TagProNews\Http\Requests\Auth\RegistrationConfirmRequest;
use TagProNews\Http\Requests\Auth\RegistrationRequest;
use TagProNews\Models\PasswordReset;
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

    /**
     * Set up middleware
     */
    public function __construct()
    {
        $this->middleware('v1');

        $this->middleware('auth', [
            'only' => ['logout']
        ]);

        $this->middleware('guest', [
            'except' => ['logout']
        ]);
    }

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->all())) {
            return $this->error('Invalid login credentials', 401);
        }

        if (!Auth::user()->confirmed) {
            return $this->error('User not confirmed', 401);
        }

//        $factory = new Factory;
//        $generator = $factory->getMediumStrengthGenerator();
//        $token = $generator->generateString(64);

//        Auth::user()->token()->create(['token' => $token]);

        return response('', 204);//->json(['data' => ['token' => $token]]);
    }

    public function logout(Request $request)
    {
//        Token::where(['user_id' => Auth::id(), 'token' => $request->header('Authorization')])->delete();
        Auth::logout();

        return $this->code(204);
    }

    public function register(RegistrationRequest $request)
    {
        $factory = new Factory;
        $generator = $factory->getLowStrengthGenerator();
        $confirmationCode = $generator->generateString(64);

        $user = new User;
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user->email = $request->input('email');
        $user->confirmation_code = $confirmationCode;
        $user->save();

        Mail::send('emails.auth.register', ['user' => $user], function ($message) use ($user) {
            $message->to($user->email, $user->username)
                ->subject('Your confirmation code')
                ->from('auth@tagpronews.com', 'TagPro News');
        });

        return $this->code(204);
    }

    public function confirm(RegistrationConfirmRequest $request)
    {
        $user = User::where([
            'email' => $request->input('email'),
            'confirmation_code' => $request->input('token')
        ])->first();

        if (is_null($user)) {
            return $this->error('User not found', 404);
        }

        $user->confirmed = true;
        $user->save();

        return $this->code(204);
    }

    public function resetPassword(PasswordResetRequest $request)
    {
        $factory = new Factory;
        $generator = $factory->getMediumStrengthGenerator();
        $token = $generator->generateString(64);

        $passwordReset = PasswordReset::firstOrNew(['email' => $request->input('email')]);
        $passwordReset->token = $token;
        $passwordReset->created_at = date('Y-m-d G:i:s');
        $passwordReset->save();

        Mail::send('emails.auth.password', ['token' => $token], function ($message) use ($request) {
            $message->to($request->input('email'))
                ->subject('Password Reset Request')
                ->from('auth@tagpronews.com', 'TagPro News');
        });

        return $this->code(204);
    }

    public function resetPasswordComplete(PasswordResetCompleteRequest $request)
    {
        $password = PasswordReset::where([
            'email' => $request->input('email'),
            'token' => $request->input('token')
        ])->first();

        if (is_null($password)) {
            return $this->error('Token not found', 404);
        }

        $user = User::where(['email' => $request->input('email')])->first();
        if (is_null($user)) {
            return $this->error('User not found', 404);
        }

        $user->password = Hash::make($request->input('password'));
        $user->save();

        return $this->code(204);
    }
}