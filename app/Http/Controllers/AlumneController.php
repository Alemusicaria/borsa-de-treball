<?php

namespace App\Http\Controllers;

use App\Models\Alumne;
use Illuminate\Http\Request;

class AlumneController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->only(['nom', 'primer_cognom', 'segon_cognom', 'dni', 'adreca', 'codi_postal', 'municipi', 'provincia', 'data_naixement', 'primer_telefon', 'segon_telefon', 'carnet_conduir', 'idioma1', 'idioma2', 'idioma3', 'idioma4', 'observacions','usuari_id']);
        $alumne = Alumne::create($data);
        return response()->json($alumne, 201);
    }

    public function index()
    {
        $alumnes = Alumne::all();
        return response()->json($alumnes, 200);
    }

    public function get($id)
    {
        $alumne = Alumne::findOrFail($id);
        return response()->json($alumne, 200);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only(['nom', 'primer_cognom', 'segon_cognom', 'dni', 'adreca', 'codi_postal', 'municipi', 'provincia', 'data_naixement', 'primer_telefon', 'segon_telefon', 'carnet_conduir', 'idioma1', 'idioma2', 'idioma3', 'idioma4', 'observacions','usuari_id']);
        $alumne = Alumne::findOrFail($id);
        $alumne->update($data);
        return response()->json($alumne, 200);
    }

    public function destroy($id)
    {
        $alumne = Alumne::findOrFail($id);
        $alumne->delete();
        return response()->json(null, 204);
    }
    
        public function updateAlumne(Request $request)
    {
           // Obtener el alumno con el ID de la sesión
        $alumno = Alumne::find(session('userData')->alumne_id);

        // Actualizar los datos del alumno
        $alumno->nom = $request->input('nom');
        $alumno->primer_cognom = $request->input('cognom');
        $alumno->segon_cognom = $request->input('segon_cognom');
        $alumno->adreca = $request->input('adreca');
        $alumno->codi_postal = $request->input('codi_postal');
        $alumno->municipi = $request->input('municipi');
        $alumno->provincia = $request->input('provincia');
        $alumno->primer_telefon = $request->input('telefon');
        $alumno->segon_telefon = $request->input('segon_telefon');
        $alumno->idioma1 = $request->input('idioma');
        $alumno->idioma2 = $request->input('segon_idioma');
        $alumno->idioma3 = $request->input('tercer_idioma');
        $alumno->idioma4 = $request->input('quart_idioma');
        $alumno->carnet_conduir = $request->input('carnet_conduir') === 'Sí' ? 1 : 0;
        $alumno->observacions = $request->input('experiencia');

        // Guardar los cambios en la base de datos
        $alumno->save();
        
        
        session(['userData' => $alumno]);

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Perfil actualitzat correctament.');
    }
}
