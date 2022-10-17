<?php

namespace App\Http\Controllers;

use App\Models\carrinho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


class carrinhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carrinho = carrinho::all();

        return view('carrinho.index')->with('carrinho', $carrinho);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carrinho.create');
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
            'qtd'       => 'required',
            'venda'      => 'required',
            'status' => 'required',
            'pedido_id' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('carrinho/create')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $carrinho = new carrinho;
            $carrinho->qtd       = $request->get('qtd');
            $carrinho->venda      = $request->get('venda');
            $carrinho->status = $request->get('status');
            $carrinho->pedido_id = $request->get('pedido_id');
            $carrinho->save();

            // redirect
            session()->flash('message', 'Carrinho criado com sucesso!');
            return Redirect::to('carrinho');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\carrinho
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the carrinho
        $carrinho = carrinho::where('pedido_id', '=', $id)
        ->orderBy('pedido_id','asc')
        ->first();

        // show the view and pass the carrinho to it
        return view('carrinho.show')->with('carrinho', $carrinho);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\carrinho
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the carrinho
        $carrinho = carrinho::where('pedido_id', '=', $id)
        ->orderBy('pedido_id','asc')
        ->first();

        // show the view and pass the carrinho to it
        return view('carrinho.edit')->with('carrinho', $carrinho);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\carrinho
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'qtd'       => 'required',
            'venda'      => 'required',
            'status' => 'required',
            'pedido_id' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('carrinho/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $carrinho = carrinho::find($id);
            $carrinho->qtd       = $request->get('qtd');
            $carrinho->venda      = $request->get('venda');
            $carrinho->status = $request->get('status');
            $carrinho->pedido_id = $request->get('pedido_id');
            $carrinho->update();

            // redirect
            session()->flash('message', 'Carrinho editado com sucesso!');
            return Redirect::to('carrinho');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\carrinho
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $carrinho = carrinho::where('pedido_id', '=', $id)
        ->orderBy('pedido_id','asc')
        ->first();
        $carrinho->delete();
        // redirect
        session()->flash('message', 'Carrinho deletado com sucesso!');
        return Redirect::to('carrinho');
    }
}
