<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->ip();
        $userAgent = substr($request->userAgent(), 0, 250); // hindari terlalu panjang
        $url = $request->fullUrl();

        // Cek apakah sudah ada kunjungan dari IP + user agent dalam 15 menit terakhir
        $alreadyVisited = Visitor::where('ip_address', $ip)
            ->where('user_agent', $userAgent)
            ->where('visited_at', '>', Carbon::now()->subMinutes(15))
            ->exists();

        if (!$alreadyVisited) {
            Visitor::create([
                'ip_address' => $ip,
                'user_agent' => $userAgent,
                'url' => $url,
                'visited_at' => Carbon::now(),
            ]);
        }

        return $next($request);
    }
}
