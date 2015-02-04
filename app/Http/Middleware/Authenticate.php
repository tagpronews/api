<?php namespace TagProNews\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use TagProNews\Models\Token;

class Authenticate
{

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->header('Authorization', null);
        if (empty($token)) {
            return response()->json(['errors' => ['You must be logged in to access this page']], 401);
        }

        $token = Token::where('token', $token)->first();
        if (is_null($token)) {
            return response()->json(['errors' => ['You must be logged in to access this page']], 401);
        }

        Auth::onceUsingId($token->user_id);

        return $next($request);
    }

}
