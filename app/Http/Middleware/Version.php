<?php namespace TagProNews\Http\Middleware;

use Closure;

abstract class Version
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $version
     * @return mixed
     */
    public function handle($request, Closure $next, $version)
    {
        if ($request->header('version', null) !== $version) {
            return response()->json(['errors' => ['Invalid Version']], 400);
        }

        return $next($request);
    }

}
