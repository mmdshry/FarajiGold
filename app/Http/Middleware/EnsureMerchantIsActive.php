<?php

namespace App\Http\Middleware;

use App\Enums\MerchantStatus;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureMerchantIsActive
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() && $request->user()->status !== MerchantStatus::ACTIVE) {
            abort(403, 'حساب کاربری شما فعال نیست و اجازه دسترسی ندارید.');
        }

        return $next($request);
    }
}
