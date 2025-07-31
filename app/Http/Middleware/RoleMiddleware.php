<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();
        if (!$user || !$this->verifyAllRoles($user->roles, $roles)) {
            abort(403, 'Acesso não autorizado.');
        }
        return $next($request);
    }

    private function verifyAllRoles(Collection $userRoles, array $requiredRoles): bool
    {
        $requiredRoles = Arr::flatten($requiredRoles);
        if ($userRoles instanceof \Illuminate\Support\Collection) {
            $userRoles = $userRoles->pluck('name')->toArray();
        }
        return empty(array_diff($requiredRoles, $userRoles));
    }
}
