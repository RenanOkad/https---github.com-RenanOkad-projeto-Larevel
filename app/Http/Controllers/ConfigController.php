<?php

namespace App\Http\Controllers;

use App\Models\config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = config::all();

        return view('config.index')->with('config', $config);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('config.create');
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
            'previsao_tempo' => 'required',
            'taxa_entrega' => 'required',
            'abertura' => 'required',
            'fechamento' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('config/create')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $config = new config;
            $config->previsao_tempo       = $request->get('previsao_tempo');
            $config->taxa_entrega      = $request->get('taxa_entrega');
            $config->abertura = $request->get('abertura');
            $config->fechamento = $request->get('fechamento');
            $config->save();

            // redirect
            session()->flash('message', 'Config criado com sucesso!');
            return Redirect::to('config');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\config
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the config
        $config = config::find($id);

        // show the view and pass the config to it
        return view('config.show')->with('config', $config);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\config
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the config
        $config = config::find($id);

        // show the view and pass the config to it
        return view('config.edit')->with('config', $config);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\config
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'previsao_tempo'       => 'required',
            'taxa_entrega'      => 'required',
            'abertura' => 'required',
            'fechamento' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('config/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $config = config::find($id);
            $config->previsao_tempo       = $request->get('previsao_tempo');
            $config->taxa_entrega      = $request->get('taxa_entrega');
            $config->abertura = $request->get('abertura');
            $config->fechamento = $request->get('fechamento');
            $config->update();

            // redirect
            session()->flash('message', 'Config editado com sucesso!');
            return Redirect::to('config');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\config
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $config = config::find($id);
        $config->delete();
        // redirect
        session()->flash('message', 'Config deletado com sucesso!');
        return Redirect::to('config');
    }
}
