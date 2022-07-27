<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(){
        //Para que vista usuarios no sea visible sin estar autenticados, role se pasa como parametro del middleware
        //para reconocer que sean admin.
        //Estudiante es para pasar otro perfil al middleware, para que pueda ver a los usuarios.
        $this->middleware('auth',['except'=>['show']]);
        $this->middleware('roles:admin',['except'=>['edit','update','show']]);//Para que ignore el metodo edit

    }

    public function index()
    {
        //Para pedir todos los usuarios de la base de datos.
        //$users = User::paginate(8);

        $users = User::with(['roles','note','tags'])->get();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('display_name','id');

        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateUserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        //Para inserta nueva usuario, parametros por el request
        $user = User::create($request->all());

        //Para insertar roles, como es usuario nuevo, no se necesita ver duplicidad.
        $user->roles()->attach($request->roles);

        return redirect()->route('usuarios.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        //Para editar algo especifico
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        //Pasamos politica
        //$this->authorize($user);
        $this->authorize('edit',$user);

        //Para mostrar roles en editar usuario
        $roles = Role::pluck('display_name','id');

        return view('users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $this->authorize('update',$user);

        $user->update($request->only('name','email'));//Para que solo actualice estos dos campos

        //Para actualizar roles, sync para evitar duplicaciones
        $user->roles()->sync($request->roles);

        return back()->with('info','Usuario actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $this->authorize('destroy',$user);

        $user->delete();

        return back();
    }
}
