<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    protected $model;
    public function __construct(Cliente $cliente)
    {
        $this->model = $cliente;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //returns everything from clients
    public function index()
    {
        return response($this->model->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //create a new client
    public function store(Request $request)
    {
        try {
            $this->model->create($request->all());
            return response('Criado com sucesso!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //find client by id
    public function edit($id)
    {
        $cliente = $this->model->find($id);
        if (!$cliente) {
            return response('Cliente não localizado');
        }
        return response($cliente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //update client by id
    public function update(Request $request, $id)
    {
        $cliente = $this->model->find($id);
        if (!$cliente) {
            return response('Cliente não localizado');
        }
        try {
            // $this->model->create($request->all());

            $cliente->update($request->all());
            $cliente->save();
            // $dados = $request->all();
            // $cliente->fill($dados);
            // $cliente->save();
            return response('Cliente atualizado');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //delete client
    public function destroy($id)
    {
        $cliente = $this->model->find($id);
        if (!$cliente) {
            return response('client não encontrado!');
        }
        try {
            $cliente->delete();
            return response('Cliente excluido');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}