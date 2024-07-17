<?php

namespace App\Http\Controllers;

use App\Models\Seguimientos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;


class SeguimientosController extends Controller
{
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seguimientos = Seguimientos::paginate(5);
        return view('seguimiento.index')
        ->with('nombres', $seguimientos);
    }

    /**
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seguimiento.form');
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|max:40',
            'apellidos' => 'required|max:40',
            'asunto' => 'required|max:250',
            'correo' => 'required|email',
            'telefono' => 'required|max:30',
            'fecha_seguim_actual' => 'required|date',
            'num_dias' => 'required|integer|max:999',
        ]);

        $nombres = $request->input('nombres');
        $apellidos = $request->input('apellidos');
        $asunto = $request->input('asunto');
        $correo = $request->input('correo');
        $telefono = $request->input('telefono');
        $fechaSeguimientoActual = $request->input('fecha_seguim_actual');
        $numDias = $request->input('num_dias');

        $fechaProximoSeguimiento = $this->calcularFechaProximoSeguimiento($fechaSeguimientoActual, $numDias);

        $seguimiento = Seguimientos::create([
            'nombres' => $nombres,
            'apellidos' => $apellidos,
            'asunto' => $asunto,
            'correo' => $correo,
            'telefono' => $telefono,
            'fecha_seguim_actual' => $fechaSeguimientoActual,
            'num_dias' => $numDias,
            'fecha_prox_seguim' => $fechaProximoSeguimiento,
        ]);

        Session::flash('mensaje', 'Registro creado con éxito');

        return redirect()->route('seguimiento.index');
    }

    /**
     * 
     *
     * @param string 
     * @param int 
     * @return string 
     */
    private function calcularFechaProximoSeguimiento($fechaActual, $numDias)
    {
        $fechaActual = new Carbon($fechaActual);
        $diasHabiles = $numDias;

        while ($diasHabiles > 0) {
            $fechaActual->addDay();
            if ($fechaActual->dayOfWeek !== 0 && $fechaActual->dayOfWeek !== 6) {
                $diasHabiles--;
            }
        }

        return $fechaActual->toDateString();
    }
    

    /**
     * 
     *
     * @param  \App\Models\Seguimientos  $seguimientos
     * @return \Illuminate\Http\Response
     */
    public function show(Seguimientos $seguimientos)
    {
        //
    }

    /**
     * 
     *
     * @param  \App\Models\Seguimientos  $seguimientos
     * @return \Illuminate\Http\Response
     */
    public function edit(Seguimientos $seguimientos)
    {
        return view('seguimiento.form')
        ->with('seguimientos', $seguimientos);
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seguimientos  $seguimientos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seguimientos $seguimientos)
    {
        $request->validate([
            'nombres' => 'required|max:40',
            'apellidos' => 'required|max:40',
            'asunto' => 'required|max:250',
            'correo' => 'required|email',
            'telefono' => 'required|max:30',
            'fecha_seguim_actual' => 'required|date',
            'num_dias' => 'required|integer|max:999',
            'fecha_prox_seguim' => 'required|date'
        ]);

        $seguimientos->nombres = $request['nombres'];
        $seguimientos->apellidos = $request['apellidos'];
        $seguimientos->asunto = $request['asunto'];
        $seguimientos->correo = $request['correo'];
        $seguimientos->telefono = $request['telefono'];
        $seguimientos->fecha_seguim_actual = $request['fecha_seguim_actual'];
        $seguimientos->num_dias = $request['num_dias'];
        $seguimientos->fecha_prox_seguim = $request['fecha_prox_seguim'];
        $seguimientos->save();


    Session::flash('mensaje', 'Registro editado con exito');
    
    
    return redirect()->route('seguimiento.index');
    }

    /**
     * 
     *
     * @param  \App\Models\Seguimientos  $seguimientos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seguimientos $seguimientos)
    {
        $seguimientos->delete();

        Session::flash('mensaje', 'Registro eliminado con exito');
    
    
        return redirect()->route('seguimiento.index');
    }
}
