<?php

namespace App\Http\Controllers;

use App\Models\Usuaris;
use App\Models\Alumne;
use App\Models\Empreses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;
 

class UsuarisController extends Controller
{



public function updateUsuari(Request $request)
{
    $validator = \Validator::make($request->all(), [
        'email_new' => 'email',
        'password_new' => 'min:8',
    ]);

    
    if ($validator->fails()) {
        return redirect()->back()->withInput()->with('error', 'Error al modificar el usuario, inserta los campos correctamente');
    }
    
    $newEmail = $request->input('email-new');
    $newPassword = $request->input('password-new');
    $passwordInput = $request->input('password-old');
    $hashedPassword = Auth::user()->password;    
    
    // Validar si la contraseña es correcta
    if (!Hash::check($passwordInput, $hashedPassword)) {
        return redirect()->back()->withInput()->with('error', 'Contraseña original incorrecta');
    }
    
    // Si es la contraseña nueva, cambiarla
    if ($newPassword) {
        Auth::user()->password = bcrypt($newPassword);
        Auth::user()->save();
    }
    
    // Si es el correo nuevo, cambiarlo
    if ($newEmail) {
        Auth::user()->email = $newEmail;
        Auth::user()->save();
    }
    
    return redirect()->back()->with('success', 'Usuari s\'ha actualizat correctament');
}









    //------------------------------------- [ LOGIN ] -------------------------------------


    //Funcio per recuperar contrasenya
    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        $remember = $request->filled('remember');
        
        
        if (Auth::attempt($credentials)) {  
        
          if($remember){
          Cookie::queue('email', Auth::user()->email, 60 * 24 * 30);
          
          }else{
          Cookie::queue('email', "", 60 * 24 * 30);
          }
          
          
          if(Auth::user()->rol == 'Alumnes'){
          
              $userData = Alumne::where('usuari_id', Auth::user()->usuari_id)->firstOrFail();
              
              session(['userData' => $userData]);
              
              return redirect()->intended('/lesmevesofertes'); 
              
          } else if (Auth::user()->rol == 'Empreses'){
          
              $userData = Empreses::where('usuari_id', Auth::user()->usuari_id)->firstOrFail();
              
              session(['userData' => $userData]); 
              
              return redirect()->intended('/iniciempresa'); 
              
          } else if (Auth::user()->rol == 'Administradors'){
          
              return redirect()->intended('/admin'); 
              
          }
}

        
        //Si falla retorna error
        return redirect()->back()->withInput()->with('error', 'Inici de sessió incorrecte');

}


    //------------------------------------- [ LOGOUT ] -------------------------------------
    
    
    public function logout(Request $request)
    {
    

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    
    
 
    //------------------------------------- [ RECUPERAR CONTRASENYA] -------------------------------------


    // Función para recuperar contraseña
    public function recoverPassword(Request $request) {

        $validator = \Validator::make($request->all(), [
            'email' => 'required|email|exists:usuaris,email',
        ]);

   
        if ($validator->fails()) {
          
          
          //Modificat perque es un forat de seguret
            //return redirect()->back()->withInput()->with('error', 'No sha trobat cap usuari associat a aquest correu electrònic.');
            
            
            return back()->with('success', 'Una nova contrasenya ha estat enviada al seu correu electrònic.');
        }

        
        
        $user = Usuaris::where('email', $request->email)->first();
        
        
        //Verificado de si esta validat (Empresa)
        
        if($user->rol == 'Empreses'){
          $usuariEmpresa = Empreses::where('usuari_id', $user->usuari_id)->firstOrFail();
          if($usuariEmpresa->validada == 0){
          
          return back()->with('success', 'Una nova contrasenya ha estat enviada al seu correu electrònic.');
          }
        }
        
        $newPassword = Str::random(10);
        $user->password = Hash::make($newPassword);
        $user->save();

        Mail::send('emails.passwordRecovery', ['user' => $request, 'newPassword' => $newPassword], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('Recuperación de contraseña');
        });
        
        
    
        return back()->with('success', 'Una nova contrasenya ha estat enviada al seu correu electrònic.');
    }



    // --------------------------------------------------------------------------------------------

    public function index()
    {
        $usuario = Usuaris::all();
        return response()->json($usuario, 200);
    }

    public function store(Request $request)
    {
        // Validar les dades
        $validatedData = $request->validate([
            'email' => 'required|email|unique:usuaris,email',
            'password' => 'required|min:8',
            'rol' => 'required|in:Alumnes,Empreses,Administradors',
        ]);


        // Crear el usuari
        $usuario = Usuaris::create([
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'rol' => $validatedData['rol'],
        ]);



        // Retornar la resposta amb un json
        return response()->json($validatedData, 201);
    }


    public function get($id)
    {
        // Obtenir el usuari per el id
        $usuario = Usuaris::findOrFail($id);

        // Retornar la resposta amb un json
        return response()->json($usuario, 200);
    }
 

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'email' => 'email|unique:usuaris,email,' . $id,
            'password' => 'min:8',
            'rol' => 'required|in:Alumnes,Empreses,Administradors',
        ]);

        // Obtenir el usuari per el id
        $usuario = Usuaris::findOrFail($id);

        // Actualizar les dades
        if (isset($validatedData['email'])) {
            $usuario->email = $validatedData['email'];
        }
        if (isset($validatedData['password'])) {
            $usuario->password = Hash::make($validatedData['password']);
        }
        if (isset($validatedData['rol'])) {
            $usuario->rol = $validatedData['rol'];
        }

        // Guardar els cambis
        $usuario->save();

        // Retornar una resposta amb els cambis
        return response()->json($usuario, 200);
    }


    public function destroy($id)
    {
        // Obtener id i el eliminem
        Usuaris::findOrFail($id)->delete();

        // Retornar la resposta amb un json
        return response()->json(null, 204);
    }
}