<?php

namespace App\Http\Controllers;

use App\Models\cidade;
use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filtro = request()-> input('filtro');
        $cidade = Cidade::where('descricao', 'LIKE', $filtro.'%')
                        ->orderBy('descricao')
                        ->paginate(10);

        return view('cidade.index')->with('cidade', $cidade)->with('filtro', $filtro);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estado = Estado::pluck('nome', 'id');
        return view('cidade.create')->with('estado', $estado);
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
            'descricao'       => 'required',
            'estado_id'       => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('cidade/create')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $cidade = new cidade;
            $cidade->descricao       = $request->get('descricao');
            $cidade->estado_id       = $request->get('estado_id');
            $cidade->save();

            // redirect
            session()->flash('message', 'Cidade criada com sucesso!');
            return Redirect::to('cidade');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cidade
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the cidade
        $cidade = cidade::find($id);

        // show the view and pass the cidade to it
        return view('cidade.show')->with('cidade', $cidade);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cidade
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the cidade
        $cidade = cidade::find($id);
        // show the view and pass the cidade to it
        return view('cidade.edit')->with('cidade', $cidade);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'descricao'       => 'required',
            'estado_id'       => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('cidade/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $cidade = cidade::find($id);
            $cidade->descricao       = $request->get('descricao');
            $cidade->estado_id       = $request->get('estado_id');
            $cidade->update();

            // redirect
            session()->flash('message', 'Cidade editado com sucesso!');
            return Redirect::to('cidade');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cidade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $cidade = cidade::find($id);
        $cidade->delete();
        // redirect
        session()->flash('message', 'Cidade deletado com sucesso!');
        return Redirect::to('cidade');
    }
}
