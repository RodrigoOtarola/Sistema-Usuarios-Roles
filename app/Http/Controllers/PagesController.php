<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMessageRequest;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //Este middleware se hasta aplicando a todo el controlador.
    public function __construct()
    {
        $this->middleware('example')->except('home');
    }

    public function home()
    {
        return view('home');
    }

//    public function saludo()
//    {
//        return view('saludo');
//    }
//
//    public function contacto()
//    {
//        return view('contacto');
//    }

    //Se crea request para validación de formulario
    public function mensaje(CreateMessageRequest $request)
    {

        $data = $request->all();

        /*Cambia status de 200 a 202
        return response()->json(['data'=>$data],202)->header('TOKEN','secret');*/

        //Respuesta enviada el formulario, cambia a status 302 de re-direccion
        //return redirect()->route('contacto')->with('info','Mensaje enviado correctamente :)');

        return back()->with('info', 'Mensaje enviado correctamente :)');

    }
}
