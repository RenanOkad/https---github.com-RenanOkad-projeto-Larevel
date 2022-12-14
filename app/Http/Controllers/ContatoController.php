<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contato = Contato::all();

        return view('contato.index')->with('contato', $contato);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contato.create');
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
            'telefone' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('contato/create')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $contato = new contato;
            $contato->nome       = $request->get('nome');
            $contato->email      = $request->get('email');
            $contato->telefone = $request->get('telefone');
            $contato->save();

            // redirect
            session()->flash('message', 'Contato criado com sucesso!');
            return Redirect::to('contato');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the contato
        $contato = Contato::find($id);

        // show the view and pass the contato to it
        return view('contato.show')->with('contato', $contato);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the contato
        $contato = Contato::find($id);

        // show the view and pass the contato to it
        return view('contato.edit')->with('contato', $contato);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'nome'       => 'required',
            'email'      => 'required|email',
            'telefone' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('contato/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $contato = contato::find($id);
            $contato->nome       = $request->get('nome');
            $contato->email      = $request->get('email');
            $contato->telefone = $request->get('telefone');
            $contato->update();

            // redirect
            session()->flash('message', 'Contato editado com sucesso!');
            return Redirect::to('contato');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // delete
         $contato = contato::find($id);
         $contato->delete();
         // redirect
         session()->flash('message', 'Contato deletado com sucesso!');
         return Redirect::to('contato');
    }
}
