<?php

namespace Cemleme\Cmauth\middleware;

use \Closure;

class Acl
{
    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if (! $request->user()->hasPermissionString($permission)) {
            return redirect('/');
        }

        return $next($request);
    }

}