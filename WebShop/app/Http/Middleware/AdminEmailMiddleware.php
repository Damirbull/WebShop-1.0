<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AdminEmailMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Получите текущего аутентифицированного пользователя
        $user = $request->user();

        // Проверьте, является ли пользователь администратором
        if ($user && $user->admin === '1') {
            return $next($request);
        }

        // Если пользователь не администратор, перенаправьте его или верните ошибку
        return abort(403, 'Unauthorized');
    }
}
