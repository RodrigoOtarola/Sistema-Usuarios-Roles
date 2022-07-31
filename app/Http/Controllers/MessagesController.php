<?php

namespace App\Http\Controllers;

use App\Event\MessageWasReceived;
use App\Http\Requests\CreateMessageRequest;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        //En caso de ingresar directo a una ruta, la direcciona al login, exceptos los pasados por el parametro except.
        $this->middleware('auth',['except'=>['create','store']]);
    }


    public function index()
    {
        //$messages = DB::table('messages')->get();

        //Con eloquent $messages = Message::all();

        //with para optimizar consulta relación con usuario y get para traer consulta
        $messages= Message::with(['user','note','tags'])->get();

        return view('messages.saludo', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMessageRequest $request)
    {
        //return $request->all();

        //Guardar mensaje
        //$messages = new Messages($request->validated());

//        DB::table('messages')->insert([
//        'nombre'=> $request->nombre,
//        'email' => $request->email,
//        'phone' => $request->phone,
//        'comentario' => $request->comentario,
//        'created_at'=>Carbon::now(),
//        'updated_at'=>Carbon::now()
//        ]);


        //Con eloquent
//        $message = new Message;
//        $message->nombre = $request->nombre;
//        $message->email = $request->email;
//        $message->comentario = $request->comentario;
//        $message->save();

        //con metodo create, se debe crea $fillable en el modelo
        $message = Message::create($request->all());
//
//        if(auth()->check()){
//            auth()->user()->messages()->save($message);
//        }

//        Para ejecucion solo con usuarios autenticados.

        //auth()->user()->messages()->create($request->all());

//        $message->user_id = auth()->id();
//        $message->save();

        //Event
        event(new MessageWasReceived($message));

        //Para responder correo en entorno local
        //Recibe 3 parametro vista, arreglo con la info a pasar y funcion anonima que recibre $message
//        Mail::send('emails.contact',['msg'=>$message], function($m) use ($message){
//
//            $m->to($message->email, $message->name)->subject('Mensaje recibido con exito');
//        });

        //Rediccionar
        return redirect()->route('mensaje.create')->with('info','Hemos recibido tu mensaje');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Con Query Builder
        //$message = DB::table('messages')->where('id',$id)->first();

        //Con eloquent
        $message = Message::findOrFail($id);//En caso si no existe id, devuelve error 404.

        return view('messages.show',compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Query Builder
        //$message = DB::table('messages')->where('id',$id)->first();

        //eloquent
        $message = Message::findOrFail($id);

        return view('messages.edit',compact('message'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Actualizar con query builder
//        DB::table('messages')->where('id',$id)->update([
//            'nombre'=> $request->input('nombre'),
//            'email' => $request->input('email'),
//            'phone' => $request->input('phone'),
//            'comentario' => $request->input('comentario'),
//            'updated_at'=>Carbon::now()
//        ]);

        //con Eloquent
        $message = Message::findOrFail($id);

        //Para actualizar valor
        $message->update($request->all());

        return redirect()->route('mensaje.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //consulta mensaje con query builder
        //DB::table('messages')->where('id',$id)->delete();

        //Eloquent
        $message = Message::findOrFail($id)->delete();


        //retorna
        return redirect()->route('mensaje.index');
    }
}
