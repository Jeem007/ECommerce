<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next) : Response
    {
       if(Auth :: user()->is_admin ==1 ){
        return $next($request);
       }else{
        
        $notification = array(
            'message' =>'You do not have access to visit this page',
            'alert-type' => 'error'
        );
        return redirect()->route('homepage')->with($notification);
       }
    }
}
