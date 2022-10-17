<?php

namespace App\Http\Controllers;

use App\Models\produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


class produtoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produto = produto::all();

        return view('produto.index')->with('produto', $produto);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produto.create');
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
            'preco'      => 'required',
            'imagem' => 'required',
            'nome_url' => 'required',
            'vendas' => 'required',
            'descricao_longa' => 'required',
            'categoria_id' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('produto/create')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $produto = new produto;
            $produto->nome       = $request->get('nome');
            $produto->preco      = $request->get('preco');
            $produto->imagem = $request->get('imagem');
            $produto->nome_url = $request->get('nome_url');
            $produto->vendas = $request->get('vendas');
            $produto->descricao_longa = $request->get('descricao_longa');
            $produto->categoria_id = $request->get('categoria_id');
            $produto->save();

            // redirect
            session()->flash('message', 'Produto criado com sucesso!');
            return Redirect::to('produto');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\produto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the produto
        $produto = produto::find($id);

        // show the view and pass the produto to it
        return view('produto.show')->with('produto', $produto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\produto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the produto
        $produto = produto::find($id);

        // show the view and pass the produto to it
        return view('produto.edit')->with('produto', $produto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'nome'       => 'required',
            'preco'      => 'required',
            'imagem' => 'required',
            'nome_url' => 'required',
            'vendas' => 'required',
            'descricao_longa' => 'required',
            'categoria_id' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('produto/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $produto = produto::find($id);
            $produto->nome       = $request->get('nome');
            $produto->preco      = $request->get('preco');
            $produto->imagem = $request->get('imagem');
            $produto->nome_url = $request->get('nome_url');
            $produto->vendas = $request->get('vendas');
            $produto->descricao_longa = $request->get('descricao_longa');
            $produto->categoria_id = $request->get('categoria_id');
            $produto->update();

            // redirect
            session()->flash('message', 'Produto editado com sucesso!');
            return Redirect::to('produto');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\produto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $produto = produto::find($id);
        $produto->delete();
        // redirect
        session()->flash('message', 'Produto deletado com sucesso!');
        return Redirect::to('produto');
    }
}
