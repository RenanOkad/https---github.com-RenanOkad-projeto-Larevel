<?php

namespace App\Http\Controllers;

use App\Models\produtos_pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class ProdutosPedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos_pedido = produtos_pedido::all();

        return view('produtos_pedido.index')->with('produtos_pedido', $produtos_pedido);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produtos_pedido.create');
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
            'produto_id'       => 'required',
            'pedido_id'      => 'required',
            'valor' => 'required',
            'qtd' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('produtos_pedido/create')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $produtos_pedido = new produtos_pedido;
            $produtos_pedido->produto_id       = $request->get('produto_id');
            $produtos_pedido->pedido_id      = $request->get('pedido_id');
            $produtos_pedido->valor = $request->get('valor');
            $produtos_pedido->qtd = $request->get('qtd');
            $produtos_pedido->save();

            // redirect
            session()->flash('message', 'produtos_pedido criado com sucesso!');
            return Redirect::to('produtos_pedido');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\produtos_pedido
     * @return \Illuminate\Http\Response
     */
    public function show($value)
    {

        $produto_id = $value[14];
        $pedido_id = $value[28];

        // get the produtos_pedido
        $produtos_pedido = produtos_pedido::where('produto_id', '=', $produto_id)
        ->where('pedido_id', '=', $pedido_id)
        ->orderBy('pedido_id','asc')
        ->first();


        // show the view and pass the produtos_pedido to it
        return view('produtos_pedido.show')->with('produtos_pedido', $produtos_pedido);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\produtos_pedido
     * @return \Illuminate\Http\Response
     */
    public function edit($value)
    {
        // get the produtos_pedido
        $produto_id = $value[14];
        $pedido_id = $value[28];

        // get the produtos_pedido
        $produtos_pedido = produtos_pedido::where('produto_id', '=', $produto_id)
        ->where('pedido_id', '=', $pedido_id)
        ->orderBy('pedido_id','asc')
        ->first();

        // show the view and pass the produtos_pedido to it
        return view('produtos_pedido.edit')->with('produtos_pedido', $produtos_pedido);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\produtos_pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $value)
    {

        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'produto_id'       => 'required',
            'pedido_id'      => 'required',
            'valor' => 'required',
            'qtd' => 'required'
        );
        $produto_id = $value;
      //  $pedido_id = $value[28];

        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('produtos_pedido/' . $request . '/edit')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // get the produtos_pedido

            //$produtos_pedido = produtos_pedido::where('produto_id', '=', $produto_id)
            // ->where('pedido_id', '=',  $pedido_id)
            //->orderBy('produto_id','asc')
            //->first();
            //$produtos_pedido->produto_id       = $request->get('produto_id');
            //$produtos_pedido->pedido_id      = $request->get('pedido_id');
            //$produtos_pedido->valor = $request->get('valor');
            //$produtos_pedido->qtd = $request->get('qtd');
            //$produtos_pedido->update();


            $q = 'UPDATE delivery_laravel.produtos__pedidos SET produto_id = ?, pedido_id = ?, qtd = ?, valor = ?
             WHERE (produto_id = ?)';

            DB::update($q, [$request->get('produto_id'),$request->get('pedido_id'), $request->get('qtd') ,$request->get('valor') ,
            $produto_id]);

            // redirect
            session()->flash('message', 'produtos_pedido editado com sucesso!');
            return Redirect::to('produtos_pedido');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\produtos_pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy($value)
    {
        // delete
        $produto_id = $value[14];
        $pedido_id = $value[28];

        $q = 'DELETE FROM produtos__pedidos where produto_id = ? and pedido_id = ?';
        DB::delete($q, [$produto_id, $pedido_id]);
  
        // redirect
        session()->flash('message', 'produtos_pedido deletado com sucesso!');
        return Redirect::to('produtos_pedido');

    }
}
