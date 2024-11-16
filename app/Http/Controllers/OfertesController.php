<?php

namespace App\Http\Controllers;

use App\Models\Ofertes;
use Illuminate\Http\Request;
use App\Models\Empreses;
use App\Models\OfertaEstudis;
use App\Models\AlumnesOfertes;
use App\Models\Alumne;
use Carbon\Carbon;

class OfertesController extends Controller
{

    public function eliminarOferta($id){
    
        $OfertaEstudis = OfertaEstudis::where('oferta_id', $id)->delete();
        
        $AlumnesOfertes = AlumnesOfertes::where('oferta_id', $id)->delete();
        
        $oferta = Ofertes::findOrFail($id);
        $oferta->delete();
        
        return redirect()->back()->withInput();
    }
    
    
    
    public function ocultarOferta($id) {
      $data = Carbon::now();
      $data->subYear();
      $caducidad = $data->toDateString();
      $oferta = Ofertes::findOrFail($id);
      $oferta->caducitat_oferta = $caducidad;
      $oferta->save();
      return redirect()->back()->withInput();
    }


    public function detalls($id){  
    
      $oferta = Ofertes::find($id);
      
      
      return view('front.app.visualitzarOfertes', compact('oferta'));

    }
    
public function detallsofertaempresa($id) {  
    // Obtener la oferta
    $oferta = Ofertes::find($id);
    
    // Obtener todos los registros de AlumnesOfertes para esta oferta
    $alumnesOferta = AlumnesOfertes::where('oferta_id', $id)->get();
    
    // Array para almacenar los alumnos asociados a la oferta
    $alumnos = [];
    
    // Iterar sobre los registros de AlumnesOfertes y obtener los alumnos asociados
    foreach ($alumnesOferta as $alumneOferta) {
        // Obtener el alumno asociado a este registro de AlumnesOfertes
        $alumno = Alumne::find($alumneOferta->alumne_id);
        
        // Añadir el alumno al array
        $alumnos[] = $alumno;
    }
    
    // Pasar los datos a la vista
    return view('admin.app.detallsoferta', compact('oferta', 'alumnos'));
}

public function sendEmailConfirm($id){
        Mail::send('emails.passwordRecovery', ['user' => $request, 'newPassword' => $newPassword], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('Recuperación de contraseña');
        });
}
    
    public function crearOferta(Request $request){
          $oferta = Ofertes::create([
            'horari' => $request->horari,
            'incorporacio' => $request->incorporacio,
            'sou' => $request->sou,
            'edat' => $request->edat,
            'idioma1' => $request->idioma1,
            'idioma2' => $request->idioma2,
            'idioma3' => $request->idioma3,
            'idioma4' => $request->idioma4,
            'tipus_contracte' => $request->tipus_contracte,
            'caducitat_oferta' => $request->caducitat_oferta,
            'descripcio' => $request->descripcio,
            'empreses_id' => $request->idEmpresa,
        ]);

        // Insertar las relaciones en ofertaEstudis
        foreach ($request->estudis as $estudiId) {
            OfertaEstudis::create([
                'oferta_id' => $oferta->oferta_id,
                'estudi_id' => $estudiId,
            ]);
        }
        
        return redirect()->back()->withInput()->with('success', 'Oferta creada correctament');
    }
    
public function modificarOferta(Request $request){
    $oferta = Ofertes::find($request->oferta_id); // Buscar la oferta por su ID

    // Verificar si la oferta existe
    if (!$oferta) {
        return redirect()->back()->withInput()->with('error', 'Oferta no encontrada');
    }

    // Actualizar los campos de la oferta con los valores proporcionados en el request
    $oferta->update([
        'horari' => $request->horari,
        'incorporacio' => $request->incorporacio,
        'sou' => $request->sou,
        'edat' => $request->edat,
        'idioma1' => $request->idioma1,
        'idioma2' => $request->idioma2,
        'idioma3' => $request->idioma3,
        'idioma4' => $request->idioma4,
        'tipus_contracte' => $request->tipus_contracte,
        'caducitat_oferta' => $request->caducitat_oferta,
        'descripcio' => $request->descripcio,
        'empreses_id' => $request->idEmpresa,
    ]);

    // Eliminar las relaciones existentes en ofertaEstudis para esta oferta
    OfertaEstudis::where('oferta_id', $request->oferta_id)->delete();

    // Insertar las nuevas relaciones en ofertaEstudis
    foreach ($request->estudis as $estudiId) {
        OfertaEstudis::create([
            'oferta_id' => $request->oferta_id,
            'estudi_id' => $estudiId,
        ]);
    }

    return redirect()->back()->withInput()->with('success', 'Oferta modificada correctamente');
}
    
    
    
    public function cercarOferta(Request $request){
    
      $ofertes = Ofertes::all();
    

      //Empreses
      $provincia = $request->input('provincia');
      $ciutat = $request->input('ciutat');

    
      //Oferta
       $salari = $request->input('salari');
       $horari = $request->input('horari');
       $jornada = $request->input('jornada');
       $especialitat = $request->input('especialitat');
      
      //----------------------- [Filtres] -----------------------
      
      //Filtrar per els que estan validats
      $ofertes = $ofertes->filter(function($oferta) {
        $empresa = Empreses::find($oferta->empreses_id);
        return $empresa && $empresa->validada == 1;
      });
      
      //Filtrar per data caducada
      $now = date('Y-m-d');; // Data actual

      $ofertes = $ofertes->filter(function($oferta) use ($now) {
          return $oferta->caducitat_oferta >= $now;
      });

      
      //Flitrar per provincia
      if($provincia){
          $ofertes = $ofertes->filter(function($oferta) use ($provincia) {
              $empresa = Empreses::find($oferta->empreses_id);
              if($empresa) {
                  return $empresa->provincia == $provincia;
              }
              return false; 
          });
      }
      
      //Flitrar per ciutat
      if($ciutat){
          $ofertes = $ofertes->filter(function($oferta) use ($ciutat) {
              $empresa = Empreses::find($oferta->empreses_id);
              if($empresa) {
                  return $empresa->municipi == $ciutat;
              }
              return false; 
          });
      }

      //Filtrar per Hora
      if($horari){
      $ofertes = $ofertes->filter(function($oferta) use ($horari) {
          return $oferta->horari == $horari;
      });
      }
      
      
      //Filtrar per Salari 
      if ($salari) {
          $ofertes = $ofertes->filter(function($oferta) use ($salari) {
              if ($salari == "<499€") {
                  return $oferta->sou < 499;
              } elseif ($salari == "500€-999€") {
                  return $oferta->sou >= 500 && $oferta->sou <= 999;
              } elseif ($salari == "1000€-1499€") {
                  return $oferta->sou >= 1000 && $oferta->sou <= 1499;
              } elseif ($salari == "1500€-1999€") {
                  return $oferta->sou >= 1500 && $oferta->sou <= 1999;
              } elseif ($salari == ">2000€") {
                  return $oferta->sou > 2000;
              } else {
                  return false;
              }
          });
      }
      
      //Filtrar per Jornada
      if($jornada){
        $ofertes = $ofertes->filter(function($oferta) use ($jornada) {
            return $oferta->tipus_contracte == $jornada;
        });
      }      
      
      
      //Filtrar per Especialitat
      if ($especialitat) {
      
      $ofertaEstudisIds = OfertaEstudis::where('estudi_id', $especialitat)->pluck('oferta_id')->toArray();
      
      $ofertes = $ofertes->filter(function($oferta) use ($ofertaEstudisIds) {
          return in_array($oferta->oferta_id, $ofertaEstudisIds);
      });
    }
      

    return redirect()->back()->with('ofertes', $ofertes->reverse());
    
    }




    public function store(Request $request)
    {
        $data = $request->only(['horari', 'incorporacio', 'sou', 'edat', 'idioma1', 'idioma2', 'idioma3', 'idioma4', 'tipus_contracte', 'caducitat_oferta', 'descripcio', 'empreses_id']);
        $oferta = Ofertes::create($data);
        return response()->json($oferta, 201);
    }

    public function index()
    {
        $ofertes = Ofertes::all();
        return response()->json($ofertes, 200);
    }

    public function get($id)
    {
        $oferta = Ofertes::findOrFail($id);
        return response()->json($oferta, 200);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only(['horari', 'incorporacio', 'sou', 'edat', 'idioma1', 'idioma2', 'idioma3', 'idioma4', 'tipus_contracte', 'caducitat_oferta', 'descripcio', 'empreses_id']);
        $oferta = Ofertes::findOrFail($id);
        $oferta->update($data);
        return response()->json($oferta, 200);
    }

    public function destroy($id)
    {
        $oferta = Ofertes::findOrFail($id);
        $oferta->delete();
        return response()->json(null, 204);
    }
}
