<?php namespace TagProNews\Http\Middleware;

use Closure;

class Version1 extends Version
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  null $version
     * @return mixed
     */
    public function handle($request, Closure $next, $version = null)
    {
        return parent::handle($request, $next, '1');
    }

}
