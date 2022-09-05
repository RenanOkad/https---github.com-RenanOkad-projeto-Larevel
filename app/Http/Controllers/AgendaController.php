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
        session_start();
        echo var_dump($_SESSION['users']);

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
        echo view("agenda.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        session_start();

        $usuario = array(
            'id' => 1,
            'name' => $request->input('name'),
            'telefone' => $request->input('telefone'),
            'email' => $request->input('email')
        );

        $_SESSION['users'] = $usuario;

        echo view("agenda.index");
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

        $agenda = $_SESSION['users'];

        if (array_search($id, $agenda)) {
            foreach ($agenda  as $element) {
                if ($agenda['id'] == $id) {

                    return view('agenda.edit', compact('agenda'));
                }
            }
        } else {
            echo "Id não existe!";
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
        session_start();

        $agenda = $_SESSION['users'];

        if (array_search($id, $agenda)) {
            foreach ($agenda  as $element) {
                if ($agenda['id'] == $id) {

                    return view('edit.show', compact('agenda'));
                }
            }
        } else {
            echo "Id não existe!";
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
        session_start();

        $usuario = array(
            'id' => 1,
            'name' => $request->input('name'),
            'telefone' => $request->input('telefone'),
            'email' => $request->input('email')
        );

        $_SESSION['users'] = $usuario;

       return redirect('agenda');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo "Destruido";
    }
}
