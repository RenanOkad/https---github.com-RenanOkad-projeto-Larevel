<?php

namespace App\Http\Controllers;

use App\Models\endereco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


class enderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $filtro = request()-> input('filtro');
        $endereco = endereco::where('nome', 'LIKE', $filtro.'%')
                        ->orderBy('nome')
                        ->paginate(3);


        return view('endereco.index')->with('endereco', $endereco)->with('filtro', $filtro);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('endereco.create');
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
            'rua'      => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade_id' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('endereco/create')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $endereco = new endereco;
            $endereco->nome       = $request->get('nome');
            $endereco->rua      = $request->get('rua');
            $endereco->numero = $request->get('numero');
            $endereco->bairro = $request->get('bairro');
            $endereco->cidade_id = $request->get('cidade_id');
            $endereco->save();

            // redirect
            session()->flash('message', 'Endereço criado com sucesso!');
            return Redirect::to('endereco');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\endereco
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the endereco
        $endereco = endereco::find($id);

        // show the view and pass the endereco to it
        return view('endereco.show')->with('endereco', $endereco);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\endereco
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the endereco
        $endereco = endereco::find($id);

        // show the view and pass the endereco to it
        return view('endereco.edit')->with('endereco', $endereco);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\endereco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'nome'       => 'required',
            'rua'      => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade_id' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('endereco/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $endereco = endereco::find($id);
            $endereco->nome       = $request->get('nome');
            $endereco->rua      = $request->get('rua');
            $endereco->numero = $request->get('numero');
            $endereco->bairro = $request->get('bairro');
            $endereco->cidade_id = $request->get('cidade_id');
            $endereco->update();

            // redirect
            session()->flash('message', 'Endereço editado com sucesso!');
            return Redirect::to('endereco');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\endereco
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $endereco = endereco::find($id);
        $endereco->delete();
        // redirect
        session()->flash('message', 'Endereço deletado com sucesso!');
        return Redirect::to('endereco');
    }
}
