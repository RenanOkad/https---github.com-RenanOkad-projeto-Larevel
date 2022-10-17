<?php

namespace App\Http\Controllers;

use App\Models\pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


class pedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedido = pedido::all();

        return view('pedido.index')->with('pedido', $pedido);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pedido.create');
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
            'tipoPedido'      => 'required',
            'valorTotal' => 'required',
            'descricao_longa' => 'required',
            'config_id' => 'required',
            'usuario_id' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('pedido/create')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $pedido = new pedido;
            $pedido->nome       = $request->get('nome');
            $pedido->tipoPedido      = $request->get('tipoPedido');
            $pedido->valorTotal = $request->get('valorTotal');
            $pedido->descricao_longa = $request->get('descricao_longa');
            $pedido->config_id = $request->get('config_id');
            $pedido->usuario_id = $request->get('usuario_id');
            $pedido->save();

            // redirect
            session()->flash('message', 'Pedido criado com sucesso!');
            return Redirect::to('pedido');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pedido
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the pedido
        $pedido = pedido::find($id);

        // show the view and pass the pedido to it
        return view('pedido.show')->with('pedido', $pedido);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pedido
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the pedido
        $pedido = pedido::find($id);

        // show the view and pass the pedido to it
        return view('pedido.edit')->with('pedido', $pedido);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'nome'       => 'required',
            'tipoPedido'      => 'required',
            'valorTotal' => 'required',
            'descricao_longa' => 'required',
            'config_id' => 'required',
            'usuario_id' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('pedido/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $pedido = pedido::find($id);
            $pedido->nome       = $request->get('nome');
            $pedido->tipoPedido      = $request->get('tipoPedido');
            $pedido->valorTotal = $request->get('valorTotal');
            $pedido->descricao_longa = $request->get('descricao_longa');
            $pedido->config_id = $request->get('config_id');
            $pedido->usuario_id = $request->get('usuario_id');
            $pedido->update();

            // redirect
            session()->flash('message', 'Peidido editado com sucesso!');
            return Redirect::to('pedido');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $pedido = pedido::find($id);
        $pedido->delete();
        // redirect
        session()->flash('message', 'Pedido deletado com sucesso!');
        return Redirect::to('pedido');
    }
}
