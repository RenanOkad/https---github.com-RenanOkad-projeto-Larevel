<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Usuario::all();

        return view('usuario.index')->with('usuario', $usuario);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'nome'       => 'required',
            'email'      => 'required|email',
            'senha' => 'required',
            'cpf' => 'required',
            'nivel' => 'required',
            'informacao' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('usuario/create')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $usuario = new Usuario;
            $usuario->nome       = $request->get('nome');
            $usuario->email      = $request->get('email');
            $usuario->senha = $request->get('senha');
            $usuario->cpf = $request->get('cpf');
            $usuario->nivel = $request->get('nivel');
            $usuario->informacao = $request->get('informacao');
            $usuario->save();

            // redirect
            session()->flash('message', 'Usuario criado com sucesso!');
            return Redirect::to('usuario');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\usuario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the usuario
        $usuario = Usuario::find($id);

        // show the view and pass the usuario to it
        return view('usuario.show')->with('usuario', $usuario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the usuario
        $usuario = Usuario::find($id);

        // show the view and pass the usuario to it
        return view('usuario.edit')->with('usuario', $usuario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'nome'       => 'required',
            'email'      => 'required|email',
            'senha' => 'required',
            'cpf' => 'required',
            'nivel' => 'required',
            'informacao' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('usuario/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $usuario = Usuario::find($id);
            $usuario->nome       = $request->get('nome');
            $usuario->email      = $request->get('email');
            $usuario->senha = $request->get('senha');
            $usuario->cpf = $request->get('cpf');
            $usuario->nivel = $request->get('nivel');
            $usuario->informacao = $request->get('informacao');
            $usuario->update();

            // redirect
            session()->flash('message', 'Usuario editado com sucesso!');
            return Redirect::to('usuario');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $usuario = Usuario::find($id);
        $usuario->delete();
        // redirect
        session()->flash('message', 'usuario deletado com sucesso!');
        return Redirect::to('usuario');
    }
}
