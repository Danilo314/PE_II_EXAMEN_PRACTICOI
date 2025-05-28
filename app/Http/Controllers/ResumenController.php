<?php

namespace App\Http\Controllers;

use App\Models\PlanEstrategico;
use App\Models\ResumenEjecutivo;
use Illuminate\Http\Request;

class ResumenController extends Controller
{
    // Mostrar todos los resúmenes ejecutivos
        public function index()
    {
        $planId = session('plan_id');
        $resumenes = ResumenEjecutivo::where('plan_id', $planId)->with('plan')->get();
        return view('resumen.index', compact('resumenes'));
    }

    // Mostrar formulario para crear nuevo resumen ejecutivo
    public function create()
    {
        $planes = PlanEstrategico::where('user_id', auth()->id())->get();
        return view('resumen.create', compact('planes'));
    }

    // Guardar nuevo resumen ejecutivo en BD
    public function store(Request $request)
    {
        $validated = $request->validate([
            'plan_id' => 'required|exists:plan_estrategicos,id',
            'nombre_proyecto' => 'required|string|max:255',
            'fecha_elaboracion' => 'required|date',
            'promotores' => 'required|string',
            'mision' => 'required|string',
            'vision' => 'required|string',
            'valores' => 'required|string',
            'debilidades' => 'nullable|string',
            'fortalezas' => 'nullable|string',
            'oportunidades' => 'nullable|string',
            'amenazas' => 'nullable|string',
            'estrategia_identificada' => 'nullable|string',
            'acciones_competitivas' => 'nullable|array',
            'objetivos_estrategicos' => 'nullable|array',
            'conclusiones' => 'nullable|string',
        ]);

        // Convertir arrays a JSON si es necesario
        $validated['acciones_competitivas'] = $request->has('acciones_competitivas') 
            ? json_encode($request->acciones_competitivas) 
            : null;
            
        $validated['objetivos_estrategicos'] = $request->has('objetivos_estrategicos') 
            ? json_encode($request->objetivos_estrategicos) 
            : null;

        try {
            ResumenEjecutivo::create($validated);
            return redirect()->route('resumen.index')->with('success', 'Resumen ejecutivo guardado correctamente.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Error al guardar: '.$e->getMessage());
        }
    }

    // Mostrar un resumen ejecutivo para editar
    public function edit($id)
    {
        $resumen = ResumenEjecutivo::findOrFail($id);
        $planes = PlanEstrategico::where('user_id', auth()->id())->get();

        return view('resumen.edit', compact('resumen', 'planes'));
    }

    // Actualizar un resumen ejecutivo en la base de datos
    public function update(Request $request, $id)
    {
        $resumen = ResumenEjecutivo::findOrFail($id);

        $validated = $request->validate([
            'plan_id' => 'required|exists:plan_estrategicos,id',
            'nombre_proyecto' => 'required|string|max:255',
            'fecha_elaboracion' => 'required|date',
            'promotores' => 'required|string',
            'mision' => 'required|string',
            'vision' => 'required|string',
            'valores' => 'required|string',
            'debilidades' => 'nullable|string',
            'fortalezas' => 'nullable|string',
            'oportunidades' => 'nullable|string',
            'amenazas' => 'nullable|string',
            'estrategia_identificada' => 'nullable|string',
            'acciones_competitivas' => 'nullable|array',
            'objetivos_estrategicos' => 'nullable|array',
            'conclusiones' => 'nullable|string',
        ]);

        // Actualizar arrays si es necesario
        if ($request->has('acciones_competitivas')) {
            $validated['acciones_competitivas'] = json_encode($request->acciones_competitivas);
        }
        
        if ($request->has('objetivos_estrategicos')) {
            $validated['objetivos_estrategicos'] = json_encode($request->objetivos_estrategicos);
        }

        $resumen->update($validated);

        return redirect()->route('resumen.index')->with('success', 'Resumen ejecutivo actualizado correctamente.');
    }

    // Eliminar un resumen ejecutivo de la base de datos
    public function destroy($id)
    {
        $resumen = ResumenEjecutivo::findOrFail($id);
        $resumen->delete();

        return redirect()->route('resumen.index')->with('success', 'Resumen ejecutivo eliminado.');
    }

    // Mostrar el resumen ejecutivo completo
        public function show($id)
    {
        $resumen = ResumenEjecutivo::findOrFail($id);
        return view('resumen.show', compact('resumen'));
    }
}