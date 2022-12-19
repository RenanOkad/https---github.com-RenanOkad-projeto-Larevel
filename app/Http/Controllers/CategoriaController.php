<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $filtro = request()-> input('filtro');

        $categoria = categoria::where('nome', 'LIKE', $filtro.'%')
                        ->orderBy('nome')
                        ->paginate(5);

        return view('categoria.index')->with('categoria', $categoria)->with('filtro', $filtro);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoria.create');
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
            'descricao'   => 'required',
            'imagem' => 'required',
            'nome_url' => 'required',
            'produtos' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('categoria/create')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $categoria = new categoria;
            $categoria->nome       = $request->get('nome');
            $categoria->descricao      = $request->get('descricao');
            $categoria->imagem = $request->get('imagem');
            $categoria->nome_url = $request->get('nome_url');
            $categoria->produtos = $request->get('produtos');
            $categoria->save();

            // redirect
            session()->flash('message', 'Categoria criado com sucesso!');
            return Redirect::to('categoria');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categoria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the categoria
        $categoria = categoria::find($id);

        // show the view and pass the categoria to it
        return view('categoria.show')->with('categoria', $categoria);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the categoria
        $categoria = categoria::find($id);

        // show the view and pass the categoria to it
        return view('categoria.edit')->with('categoria', $categoria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'nome'       => 'required',
            'descricao'   => 'required',
            'imagem' => 'required',
            'nome_url' => 'required',
            'produtos' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('categoria/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $categoria = categoria::find($id);
            $categoria->nome       = $request->get('nome');
            $categoria->descricao      = $request->get('descricao');
            $categoria->imagem = $request->get('imagem');
            $categoria->nome_url = $request->get('nome_url');
            $categoria->produtos = $request->get('produtos');
            $categoria->update();

            // redirect
            session()->flash('message', 'Categoria editado com sucesso!');
            return Redirect::to('categoria');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $categoria = categoria::find($id);
        $categoria->delete();
        // redirect
        session()->flash('message', 'Categoria deletado com sucesso!');
        return Redirect::to('categoria');
    }
}
