<?php

namespace App\Http\Controllers;

use App\Models\Empreses;
use App\Models\Usuaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class EmpresesController extends Controller
{


 // ---------------------------------- [ Alta Empresa  ] ----------------------------------

    public function altaEmpresa(Request $request){
    
    
    // ------------------- [ VERIFICADORS ] -------------------
    
    
    // NIF
    
      $rules = ['nif' => 'required|string|size:9|regex:/^[0-9]{8}[A-Z]$/'];
      
      $messages = [
        'nif.required' => 'El NIF és obligatori.',
        'nif.string' => 'El NIF ha de ser una cadena de text.',
        'nif.size' => 'El NIF ha de tenir exactament 9 caràcters.',
        'nif.regex' => 'El format del NIF no és vàlid. Ha de seguir el patró 8 dígits seguits d’una lletra majúscula.'
      ];
      
      $validator = Validator::make($request->all(), $rules, $messages);
      
      
      // Si falla el NIF respondre el error
      if ($validator->fails()) {
        return redirect()->back()->withInput()->with(['error' => $validator->errors()->first()]);
      }
      
      
      
    // Telefon 1
    
    $rules = [
    'telefonContacte' => 'required|numeric|min:9', 
    ];

    $messages = [
        'telefonContacte.required' => 'El telèfon és obligatori.',
        'telefonContacte.numeric' => 'El telèfon ha de ser una cadena de numeros.',
        'telefonContacte.min' => 'El telèfon ha de tenir com a mínim 9 caràcters.'
    ];
    
    $validator = Validator::make($request->all(), $rules, $messages);
    
    // Si falla el telèfon, responder con el error
    if ($validator->fails()) {
        return redirect()->back()->withInput()->with(['error' => $validator->errors()->first()]);
    }


    // Telefon 2
    
    $rules = [
    'segonTelefonContacte' => 'numeric|min:9', 
    ];

    $messages = [
        'segonTelefonContacte.numeric' => 'El telèfon ha de ser una cadena de numeros.',
        'segonTelefonContacte.min' => 'El telèfon ha de tenir com a mínim 9 caràcters.'
    ];
    
    $validator = Validator::make($request->all(), $rules, $messages);
    
    // Si falla el telèfon, responder con el error
    if ($validator->fails()) {
        return redirect()->back()->withInput()->with(['error' => $validator->errors()->first()]);
    }
    
    
    
    // ------------------- [ CREAR EMPRESA ] -------------------
    
    
    //Crear usuari (contrasenya no la passem)
    
    
    $emailExistente = Usuaris::where('email', $request->input('email'))->exists();
    
    if ($emailExistente) {
    return back()->with('success', 'L\'empresa ha sigut registrada correctament');
    }
    
    $usuario = Usuaris::create([
            'email' => $request->input('email'),
            'password' => Hash::make(Str::random(10)),
            'rol' => "Empreses",
    ]);
    
    
    
    //Crear empresa (Sense validar)
    
    $empresa = Empreses::create([
      'nif' => $request->input('nif'),
      'nom' => $request->input('nom'),
      'persona_contacte' => $request->input('personaContacte'),
      'primer_telefon_contacte' => $request->input('telefonContacte'),
      'segon_telefon_contacte' => $request->input('segonTelefonContacte'),
      'adreca' => $request->input('adreca'),
      'codi_postal' => $request->input('codiPostal'),
      'municipi' => $request->input('municipi'),
      'provincia' => $request->input('provincia'),
      'validada' => 0,
      'usuari_id' => $usuario->usuari_id,
    ]);    
    
    return back()->with('success', 'L\'empresa ha sigut registrada correctament');

}




 public function validarInvalidarEmpresa(Request $request){
 
    $empresa = Empreses::findOrFail($request->input('empresaId'));
    
    
    //Si el usuari esta validat desvalidar cambiar password del usuari
    if($empresa->validada == 1) {
 
        $empresa->validada = 0;
        $empresa->save();
        $usuari = Usuaris::where('usuari_id', $empresa->usuari_id)->firstOrFail();

        //Cambiar contraseña usuari
        $newPassword = Str::random(10);
        $usuari->password = Hash::make($newPassword);
        $usuari->save();

        return back()->with('success', 'L\'empresa s\'ha invalidat correctament');


    //Si el usuari esta invalid validar i passaar password a usuari
    } else {
    
        $usuari = Usuaris::where('usuari_id', $empresa->usuari_id)->firstOrFail();
        
        $empresa->validada = 1;
        $empresa->save();

        //Cambiar contraseña usuari
         
        $newPassword = Str::random(10);
        $usuari->password = Hash::make($newPassword);
        $usuari->save();

        Mail::send('emails.passwordRecovery', ['user' => $request, 'newPassword' => $newPassword], function ($message) use ($usuari) {
            $message->to($usuari->email);
            $message->subject('Recuperación de contraseña');
        });
        
        return back()->with('success', 'L\'empresa s\'ha validat correctament');

    }
 }


    public function store(Request $request)
    {
        $data = $request->only(['nif', 'nom', 'persona_contacte', 'primer_telefon_contacte', 'segon_telefon_contacte', 'adreca', 'codi_postal', 'municipi', 'provincia', 'validada','usuari_id']);
        $empresa = Empreses::create($data);
        return response()->json($empresa, 201);
    }

    public function index()
    {
        $empreses = Empreses::all();
        return response()->json($empreses, 200);
    }

    public function get($id)
    {
        $empresa = Empreses::findOrFail($id);
        return response()->json($empresa, 200);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only(['nif', 'nom', 'persona_contacte', 'primer_telefon_contacte', 'segon_telefon_contacte', 'adreca', 'codi_postal', 'municipi', 'provincia', 'validada','usuari_id']);
        $empresa = Empreses::findOrFail($id);
        $empresa->update($data);
        return response()->json($empresa, 200);
    }

    public function destroy($id)
    {
        $empresa = Empreses::findOrFail($id);
        $empresa->delete();
        return response()->json(null, 204);
    }
    
        public function updateEmpresa(Request $request)
    {
        $empresa = Empreses::find(session('userData')->empresa_id);

        // Actualizar los datos de la empresa
        $empresa->nom = $request->input('nom');
        $empresa->persona_contacte = $request->input('persona_contacte');
        $empresa->primer_telefon_contacte = $request->input('primer_telefon_contacte');
        $empresa->segon_telefon_contacte = $request->input('segon_telefon_contacte');
        $empresa->adreca = $request->input('adreca');
        $empresa->codi_postal = $request->input('codi_postal');
        $empresa->municipi = $request->input('municipi');
        $empresa->provincia = $request->input('provincia');

        // Guardar los cambios en la base de datos
        $empresa->save();
        session(['userData' => $empresa]);
        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Dades de l\'empresa actualitzades correctament.');
    }
}
