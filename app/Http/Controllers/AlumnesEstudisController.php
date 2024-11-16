<?php

namespace App\Http\Controllers;

use App\Models\AlumnesEstudis;
use Illuminate\Http\Request;

class AlumnesEstudisController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->only(['empreses_id', 'alumne_id', 'estudi_id', 'any_finalitzacio']);
        $alumnesEstudis = AlumnesEstudis::create($data);
        return response()->json($alumnesEstudis, 201);
    }

    public function index()
    {
        $alumnesEstudis = AlumnesEstudis::all();
        return response()->json($alumnesEstudis, 200);
    }

    public function get($alumne_id, $estudi_id)
    {
        $alumnesEstudis = AlumnesEstudis::where('alumne_id', $alumne_id)
            ->where('estudi_id', $estudi_id)
            ->firstOrFail();
        return response()->json($alumnesEstudis, 200);
    }

    public function update(Request $request, $alumne_id, $estudi_id)
    {
        $data = $request->only(['empreses_id', 'alumne_id', 'estudi_id', 'any_finalitzacio']);
        $alumnesEstudis = AlumnesEstudis::where('alumne_id', $alumne_id)
            ->where('estudi_id', $estudi_id)
            ->firstOrFail();
        $alumnesEstudis->update($data);
        return response()->json($alumnesEstudis, 200);
    }

    public function destroy($alumne_id, $estudi_id)
    {
        $alumnesEstudis = AlumnesEstudis::where('alumne_id', $alumne_id)
            ->where('estudi_id', $estudi_id)
            ->firstOrFail();
        $alumnesEstudis->delete();
        return response()->json(null, 204);
    }
}
