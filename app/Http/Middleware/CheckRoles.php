<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRoles
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //Array_slice corta el arreglo, ene ste caso corta los dos primeros.
        $roles = array_slice(func_get_args(), 2);

        //Para recorrer todos los roles ingresados y si tiene u no que tenga los parametros
        //foreach ($roles as $role) {

            //Solo si tiene rol admin, permite ingresar a usuarios, se debe configurar el kernel, codigo sigue
            //en el model user pasando parametros.
            if (auth()->user()->hasRoles($roles)){
                return $next($request);
            }
        //}
        return redirect('/');
    }
}
