<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::all();
        return response()->json($empleados);
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
    public function store(Request $request)
    {
        $empleado = new Empleado();
    $empleado->nombre = $request->nombre;
    $empleado->apellido = $request->apellido;
    $empleado->edad = $request->edad;
    $empleado->salario = $request->salario;
    $empleado->save();
    return response()->json($cliente, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = Empleado::find($id);
    if (!$empleado) {
        return response()->json(['message' => 'Empleado no encontrado'], 404);
    }
    return response()->json($empleado);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $empleado = Empleado::find($id);
        if (!$empleado) {
        return response()->json(['message' => 'Empleado no encontrado'], 404);
    }
    $empleado->nombre = $request->nombre;
    $empleado->apellido = $request->apellido;
    $empleado->edad = $request->edad;
    $empleado->salario = $request->salario;
    $empleado->save();
    return response()->json($empleado);
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleado::find($id);
        if (!$empleado) {
        return response()->json(['message' => 'Empleado no encontrado'], 404);
        }
        $empleado->delete();
        return response()->json(['message' => 'Empleado eliminado']);
        }
}
