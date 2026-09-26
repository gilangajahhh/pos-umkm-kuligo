<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Contoh pemakaian di routes: ->middleware('role:admin') atau ->middleware('role:admin,kasir')
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $staff = $request->user();

        if (! $staff || ! in_array($staff->role, $roles, true)) {
            abort(403, 'Anda tidak punya akses ke halaman ini.');
        }

        return $next($request);
    }
}
