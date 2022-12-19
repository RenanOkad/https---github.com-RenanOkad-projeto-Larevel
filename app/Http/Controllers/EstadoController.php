<?php

namespace App\Http\Controllers;

use App\Models\estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $filtro = request()-> input('filtro');
        $estado = estado::where('nome', 'LIKE', $filtro.'%')
                        ->orderBy('nome')
                        ->paginate(5);


        return view('estado.index')->with('estado', $estado)->with('filtro', $filtro);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estado.create');
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
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('estado/create')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $estado = new Estado;
            $estado->nome       = $request->get('nome');
            $estado->save();

            // redirect
            session()->flash('message', 'Estado criado com sucesso!');
            return Redirect::to('estado');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the Estado
        $estado = Estado::find($id);

        // show the view and pass the estado to it
        return view('estado.show')->with('estado', $estado);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the estado
        $estado = Estado::find($id);

        // show the view and pass the estado to it
        return view('estado.edit')->with('estado', $estado);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'nome'       => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('estado/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $estado = Estado::find($id);
            $estado->nome       = $request->get('nome');
            $estado->update();

            // redirect
            session()->flash('message', 'Estado editado com sucesso!');
            return Redirect::to('estado');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\estado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $estado = Estado::find($id);
        $estado->delete();
        // redirect
        session()->flash('message', 'Estado deletado com sucesso!');
        return Redirect::to('estado');
    }
}
