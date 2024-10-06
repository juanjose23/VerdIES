<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
   
  
    
    public function handle($request, Closure $next)
    {
        $UserId = Auth::id();
        if (!$UserId) {
            return redirect()->route('login');
        }
        
      
        return $next($request);
    }
}
