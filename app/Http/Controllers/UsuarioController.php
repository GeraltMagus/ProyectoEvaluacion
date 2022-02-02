<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\UsuarioHabilidad;
use App\Models\Habilidad;

class UsuarioController extends Controller
{
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::all();
        $habilidades = UsuarioHabilidad::all();
        return view('usuarios.usuarios',compact('usuarios','habilidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $habilidades=Habilidad::all();
        return view("usuarios.createUsuario",compact('habilidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuarios = new Usuario();
        $usuarios->nombre = $request->get('nombre');
        $usuarios->apellido_paterno = $request->get('apellido_paterno');
        $usuarios->apellido_materno = $request->get('apellido_materno');
        $usuarios->fecha_nacimiento = $request->get('fecha_nacimiento');
        $usuarios->sexo = $request->get('sexo');
        $usuarios->estado = $request->get('estado');
        $usuarios->ciudad = $request->get('ciudad');
        $usuarios->calle = $request->get('calle');
        $usuarios->numero_exterior = $request->get('numero_exterior');
        $usuarios->numero_interior = $request->get('numero_interior');
        $usuarios->colonia = $request->get('colonia');
        $usuarios->estatus = "Predeterminado";
        $usuarios->codigo_postal = "33880";
        $usuarios->save();
        return redirect('/usuarios');
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
    public function edit($id)
    {
        $usuario = Usuario::find($id);
        $habilidades = Habilidad::all();
        return view('usuarios.editUsuario',compact('usuario','habilidades'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
