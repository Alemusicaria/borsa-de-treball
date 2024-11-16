<?php

namespace App\Http\Controllers;

use App\Models\Estudis;
use Illuminate\Http\Request;

class EstudisController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->only(['nom', 'descripcio']);
        $estudi = Estudis::create($data);
        return response()->json($estudi, 201);
    }

    public function index()
    {
        $estudis = Estudis::all();
        return response()->json($estudis, 200);
    }

    public function get($id)
    {
        $estudi = Estudis::findOrFail($id);
        return response()->json($estudi, 200);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only(['nom', 'descripcio']);
        $estudi = Estudis::findOrFail($id);
        $estudi->update($data);
        return response()->json($estudi, 200);
    }

    public function destroy($id)
    {
        $estudi = Estudis::findOrFail($id);
        $estudi->delete();
        return response()->json(null, 204);
    }
}
