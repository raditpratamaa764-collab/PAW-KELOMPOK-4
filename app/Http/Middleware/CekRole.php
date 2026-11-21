<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CekRole
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = $request->user();

        //kalau belum login, masuk halaman login
        if(! $user){
            return redirect()->route('login');
        }

        //sudah login dan peran tidak ada = ditolak
        if(! $user->hasRole(...$roles)){
            abort(403, 'Akses ditolak. Anda tidak diizinkan mengakses halaman ini');
        }

        //jika benar maka lanjut ke controllerr
        return $next($request);
    }
}
