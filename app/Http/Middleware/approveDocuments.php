<?php

namespace App\Http\Middleware;

use App\Permission;
use Closure;
use Illuminate\Support\Facades\Auth;

class approveDocuments
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $permission = Permission::select('approveDocuments')->where('user_id', Auth::id())->first();

        if(!$permission->approveDocuments){
            return redirect()->back()->with('notAuthorized', ['true']);
        }

        return $next($request);
    }
}
