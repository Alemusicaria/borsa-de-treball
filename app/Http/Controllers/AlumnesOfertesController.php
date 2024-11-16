<?php

namespace App\Http\Controllers;

use App\Models\AlumnesOfertes;
use App\Models\Empreses;
use App\Models\Usuaris;
use App\Models\Alumne;
use App\Models\Ofertes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AlumnesOfertesController extends Controller
{
    
    //Rebujar alumne

    public function rebutjar($alumne_id, $oferta_id) {
        \Illuminate\Support\Facades\DB::table('alumnesofertes')
            ->where('alumne_id', $alumne_id)
            ->where('oferta_id', $oferta_id)
            ->update(['vist_empresa' => 2]);
            
    return back()->with('error', 'El alumne ha sigut rebutjat correctament.');
    }
    
    
    //Contactar alumne
  public function contactar($alumne_id, $oferta_id) {
    $alumne = Alumne::findOrFail($alumne_id);
    $oferta = Ofertes::findOrFail($oferta_id);
    $usuari = Usuaris::where('usuari_id', $alumne->usuari_id)->firstOrFail();
    $empresa = Empreses::where('empresa_id', $oferta->empreses_id)->firstOrFail();
    $usuariEmpresa = Usuaris::where('usuari_id', $empresa->usuari_id)->firstOrFail();
    
    // Verificar si ya se ha contactado al alumno para esta oferta
    $alumnesOfertes = AlumnesOfertes::where('alumne_id', $alumne_id)
        ->where('oferta_id', $oferta_id)
        ->first();

    if ($alumnesOfertes && $alumnesOfertes->vist_empresa == 1) {
        // Si ya se ha contactado al alumno, mostrar un mensaje de error
        return back()->with('error', 'El usuari ja ha sigut contactat');
    }

    // Si no se ha contactado al alumno, enviar correo y marcar como visto por la empresa
    Mail::send('emails.sendEmailConfirm', ['alumne' => $alumne, 'oferta' => $oferta,'empresa' => $empresa,'usuariEmpresa' => $usuariEmpresa ], function ($message) use ($usuari, $empresa) {
        $message->to($usuari->email);
        $message->subject($empresa->nom . ' - Oferta disponible');
    });

    // Marcar como visto por la empresa
    \Illuminate\Support\Facades\DB::table('alumnesofertes')
        ->where('alumne_id', $alumne_id)
        ->where('oferta_id', $oferta_id)
        ->update(['vist_empresa' => 1]);

    return back()->with('success', 'El alumne ha sigut contactat correctament.');
}

    
    
    
    
    public function inscriure($oferta_id, $alumne_id) {
    $data = [
        'alumne_id' => $alumne_id,
        'oferta_id' => $oferta_id,
        'data_interes' => now(),
        'vist_empresa' => 0 
    ];
    $alumnesOfertes = AlumnesOfertes::create($data);
    
    return redirect()->back()->withInput();
    }


    public function store(Request $request)
    {
        $data = $request->only(['alumne_id', 'oferta_id', 'data_interes', 'vist_empresa']);
        $alumnesOfertes = AlumnesOfertes::create($data);
        return response()->json($alumnesOfertes, 201);
    }

    public function index()
    {
        $alumnesOfertes = AlumnesOfertes::all();
        return response()->json($alumnesOfertes, 200);
    }

    public function get($alumne_id, $oferta_id)
    {
        $alumnesOfertes = AlumnesOfertes::where('alumne_id', $alumne_id)
            ->where('oferta_id', $oferta_id)
            ->firstOrFail();
        return response()->json($alumnesOfertes, 200);
    }

    public function update(Request $request, $alumne_id, $oferta_id)
    {
        $data = $request->only(['alumne_id','oferta_id','data_interes', 'vist_empresa']);
        $alumnesOfertes = AlumnesOfertes::where('alumne_id', $alumne_id)
            ->where('oferta_id', $oferta_id)
            ->firstOrFail();
        $alumnesOfertes->update($data);
        return response()->json($alumnesOfertes, 200);
    }

    public function destroy($alumne_id, $oferta_id)
    {
        $alumnesOfertes = AlumnesOfertes::where('alumne_id', $alumne_id)
            ->where('oferta_id', $oferta_id)
            ->firstOrFail();
        $alumnesOfertes->delete();
        return response()->json(null, 204);
    }
    
}
