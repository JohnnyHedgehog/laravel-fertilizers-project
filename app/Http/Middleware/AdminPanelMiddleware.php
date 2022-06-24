<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminPanelMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next) {

        // проверяем, авторизован ли пользователь, если нет, то редиректим на главную
        if (auth()->user() === null) {
            return redirect()->route('main.index');
        }

        // если пользователь авторизован, то проверяем, что он админ, иначе редиректим на главную
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('main.index');
        }

        // если все ок, то пропускаем
        return $next($request);
    }
}
