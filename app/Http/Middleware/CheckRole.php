<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
Use App\Services\UserService;
class CheckRole
{
    protected $usersService; 
    public function __construct(UserService $usersService)
    {
        $this->usersService = $usersService; // Asegúrate de que el nombre sea consistente
    }
    
    public function handle($request, Closure $next, $privilegeId)
    {
        $UserId = Auth::id();
        if (!$UserId) {
            return redirect()->route('login');
        }
        
        if (!$this->usersService->hasPrivilege($UserId, $privilegeId)) {
            return redirect()->route('error403');
        }

        return $next($request);
    }
}
