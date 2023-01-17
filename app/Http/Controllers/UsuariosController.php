<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UsuariosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $data = User::orderBy('id','DESC')->paginate(5);
        return view('usuarios.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5); */
        $user = User::all();
        return view('usuarios.index', compact('user'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        } else {
            $user = User::create([

                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password'])
            ])->assignRole($data['rol']);

            return redirect()->route('usuarios.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        $data = $request->all();

        $data['name'] = $request->name;
        $data['password'] = bcrypt($request->password);

        $usuario->update($data);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        $usuario->delete();

        return redirect()->back();
    }

    public function rol($user)
    {
        $rol  = Role::all();
        $user = User::find($user);
        return view('usuarios.rol', compact('rol', 'user'));
    }

    public function asignar($user, Request $request)
    {
        $user = User::find($user);
        $data = $request->get("roles", []);
        $user->roles()->sync($data);
        return redirect()->route('usuarios.index');
    }
}