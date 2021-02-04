<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\MySession;

class CheckAuth {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $my_session = new MySession();
        if (!$my_session->checkSession()) {
            return redirect()->route('admin.login');
        }
        return $next($request);
    }   
}
