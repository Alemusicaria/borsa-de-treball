<?php

namespace App\Http\Controllers;

use App\Models\OfertaEstudis;
use Illuminate\Http\Request;

class OfertaEstudisController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->only(['oferta_id', 'estudi_id']);
        $ofertaEstudis = OfertaEstudis::create($data);
        return response()->json($ofertaEstudis, 201);
    }

    public function index()
    {
        $ofertaEstudis = OfertaEstudis::all();
        return response()->json($ofertaEstudis, 200);
    }

    public function get($oferta_id, $estudi_id)
    {
        $ofertaEstudis = OfertaEstudis::where('oferta_id', $oferta_id)
            ->where('estudi_id', $estudi_id)
            ->firstOrFail();
        return response()->json($ofertaEstudis, 200);
    }

    public function update(Request $request, $oferta_id, $estudi_id)
    {

    
        $data = $request->only(['oferta_id', 'estudi_id']);
        $ofertaEstudis = OfertaEstudis::where('oferta_id', $oferta_id)
            ->where('estudi_id', $estudi_id)
            ->firstOrFail();
            
            
        
        $ofertaEstudis->update($data);
        
        
        return response()->json($ofertaEstudis, 200);
    }

    public function destroy($oferta_id, $estudi_id)
    {
        $ofertaEstudis = OfertaEstudis::where('oferta_id', $oferta_id)
            ->where('estudi_id', $estudi_id)
            ->firstOrFail();
            
        $ofertaEstudis->delete();
        return response()->json(null, 204);
    }
}
