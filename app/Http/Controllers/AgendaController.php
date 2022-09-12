<?php

namespace App\Http\Controllers;

use App\Http\Resources\AgendaResource;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (!isset($_SESSION))
            session_start();
        $element = $_SESSION['usuario'];

        return view("agenda.index", compact("element"));
        /*
        echo '<pre>';
        print_r($_SESSION['users']);
        echo '</pre>';

        echo "<pre>";
        var_dump($_SESSION['users']);
        echo "</pre>";

        echo "<pre>";
        var_export($_SESSION['users']);
        echo "</pre>";


        foreach ($_SESSION['users'] as $element) {
            if ($_SESSION['users']['id'] == 1) {
                echo "<pre>";
                var_export($element);
                echo "</pre>";
            }
        }
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("agenda.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!isset($_SESSION))
            session_start();

        $novoUsuario = array(
            'id' => rand(),
            'name' => $request->input('name'),
            'telefone' => $request->input('telefone'),
            'email' => $request->input('email')
        );


        if (isset($_SESSION['usuario']))
            array_push($_SESSION['usuario'], $novoUsuario);
        else
            $_SESSION['usuario'][0] = $novoUsuario;

        $element =  $_SESSION['usuario'];
        return redirect()->route("agenda.index", ['element' => $element]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        session_start();

        $usuario = $_SESSION['usuario'];

        if (!isset($_SESSION))
            session_start();



        foreach ($usuario  as $element) {
            if ($element['id'] == $id) {
                return view('agenda.show', ['element' => $element]);
                break;
            }
        }



        //echo view("agenda.show");
        // echo var_dump($_SESSION['usuario'][]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if (!isset($_SESSION))
            session_start();

        $usuario = $_SESSION['usuario'];

        foreach ($usuario  as $element) {
            if ($element['id'] == $id) {

                return view('agenda.edit', ['element' =>  $element]);
                break;
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        if (!isset($_SESSION))
            session_start();

        $keys = array_keys($_SESSION['usuario']);

        foreach ($keys as $key) {
            if ($_SESSION['usuario'][$key]['id'] == $id) {
                $_SESSION['usuario'][$key]['name'] = $request->name;
                $_SESSION['usuario'][$key]['telefone'] = $request->telefone;
                $_SESSION['usuario'][$key]['email'] = $request->email;
            }
        }


        return redirect()->route('agenda.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!isset($_SESSION))
            session_start();

        $keys = $_SESSION['usuario'];

        foreach ($keys as $key => $registro) {
            if ($registro['id'] == $id) {
                unset($_SESSION['usuario'][$key]);
            }
        }

        return redirect()->route('agenda.index');
    }
}
