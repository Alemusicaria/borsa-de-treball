<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Test Alerts
use App\Http\Controllers\Test;

//Route::get('/test', [Test::class, 'test']);

/*Administrador*/

/*use App\Http\Controllers\AdministradorController;

Route::post('/administradors', [AdministradorController::class, 'store']);
Route::get('/administradors', [AdministradorController::class, 'index']);
Route::get('/administradors/{id}', [AdministradorController::class, 'get']);
Route::put('/administradors/{id}', [AdministradorController::class, 'update']);
Route::delete('/administradors/{id}', [AdministradorController::class, 'destroy']);*/


/*Usuaris*/
use App\Http\Controllers\UsuarisController;

// Rutas para crear, leer, actualizar y eliminar usuarios
Route::post('/usuaris', [UsuarisController::class, 'store']);
Route::get('/usuaris', [UsuarisController::class, 'index']);
Route::get('/usuaris/{id}', [UsuarisController::class, 'get']); 
Route::put('/usuaris/{id}', [UsuarisController::class, 'update']);
Route::delete('/usuaris/{id}', [UsuarisController::class, 'destroy']); 
Route::post('/login', [UsuarisController::class, 'login'])->name('login');
Route::post('/logout', [UsuarisController::class, 'logout'])->name('logout');
Route::post('/recuperar', [UsuarisController::class, 'recoverPassword'])->name('recuperar');
Route::post('/updateUsuari', [UsuarisController::class, 'updateUsuari'])->name('updateUsuari');


/*Ofertes*/

use App\Http\Controllers\OfertesController;

Route::post('/ofertes', [OfertesController::class, 'store']);
Route::get('/ofertes', [OfertesController::class, 'index']);
Route::get('/ofertes/{id}', [OfertesController::class, 'get']);
Route::put('/ofertes/{id}', [OfertesController::class, 'update']);
Route::delete('/ofertes/{id}', [OfertesController::class, 'destroy']);
Route::get('/detalls/{id}', [OfertesController::class, 'detalls'])->name('detalls');
Route::post('/cercarOferta', [OfertesController::class, 'cercarOferta'])->name('cercarOferta');
Route::post('/crearOferta', [OfertesController::class, 'crearOferta'])->name('crearOferta');
Route::post('/modificarOferta', [OfertesController::class, 'modificarOferta'])->name('modificarOferta');
Route::get('/detallsofertaempresa/{id}', [OfertesController::class, 'detallsofertaempresa'])->name('detallsofertaempresa');
Route::post('/sendEmailConfirm', [OfertesController::class, 'sendEmailConfirm'])->name('sendEmailConfirm');


Route::get('/eliminarOferta/{oferta_id}', [OfertesController::class, 'eliminarOferta'])->name('eliminarOferta');

Route::get('/ocultarOferta/{oferta_id}', [OfertesController::class, 'ocultarOferta'])->name('ocultarOferta');

/*OfertesEstudis*/

use App\Http\Controllers\OfertaEstudisController;

Route::post('/oferta-estudis', [OfertaEstudisController::class, 'store']);
Route::get('/oferta-estudis', [OfertaEstudisController::class, 'index']);
Route::get('/oferta-estudis/{oferta_id}/{estudi_id}', [OfertaEstudisController::class, 'get']);
Route::put('/oferta-estudis/{oferta_id}/{estudi_id}', [OfertaEstudisController::class, 'update']);
Route::delete('/oferta-estudis/{oferta_id}/{estudi_id}', [OfertaEstudisController::class, 'destroy']);


/*Empreses*/

use App\Http\Controllers\EmpresesController;

Route::post('/empreses', [EmpresesController::class, 'store']);
Route::get('/empreses', [EmpresesController::class, 'index']);
Route::get('/empreses/{id}', [EmpresesController::class, 'get']);
Route::put('/empreses/{id}', [EmpresesController::class, 'update']);
Route::delete('/empreses/{id}', [EmpresesController::class, 'destroy']);
Route::post('/altaEmpresa', [EmpresesController::class, 'altaEmpresa'])->name('altaEmpresa');
Route::post('/validarInvalidarEmpresa', [EmpresesController::class, 'validarInvalidarEmpresa'])->name('validarInvalidarEmpresa');
Route::post('/updateEmpresa', [EmpresesController::class, 'updateEmpresa'])->name('updateEmpresa');

/*Estudis*/

use App\Http\Controllers\EstudisController;

Route::post('/estudis', [EstudisController::class, 'store']);
Route::get('/estudis', [EstudisController::class, 'index']);
Route::get('/estudis/{id}', [EstudisController::class, 'get']);
Route::put('/estudis/{id}', [EstudisController::class, 'update']);
Route::delete('/estudis/{id}', [EstudisController::class, 'destroy']);


/*Alumnes*/

use App\Http\Controllers\AlumneController;

Route::post('/alumnes', [AlumneController::class, 'store']);
Route::get('/alumnes', [AlumneController::class, 'index']);
Route::get('/alumnes/{id}', [AlumneController::class, 'get']);
Route::put('/alumnes/{id}', [AlumneController::class, 'update']);
Route::delete('/alumnes/{id}', [AlumneController::class, 'destroy']);
Route::post('/updateAlumne', [AlumneController::class, 'updateAlumne'])->name('updateAlumne');

/*AlumnesOfertes*/

use App\Http\Controllers\AlumnesOfertesController;

Route::post('/alumnes-ofertes', [AlumnesOfertesController::class, 'store']);
Route::get('/alumnes-ofertes', [AlumnesOfertesController::class, 'index']);
Route::get('/alumnes-ofertes/{alumne_id}/{oferta_id}', [AlumnesOfertesController::class, 'get']);
Route::put('/alumnes-ofertes/{alumne_id}/{oferta_id}', [AlumnesOfertesController::class, 'update']);
Route::delete('/alumnes-ofertes/{alumne_id}/{oferta_id}', [AlumnesOfertesController::class, 'destroy']);
Route::get('/rebutjar/{alumne_id}/{oferta_id}', [AlumnesOfertesController::class, 'rebutjar'])->name('rebutjar');
Route::get('/contactar/{alumne_id}/{oferta_id}', [AlumnesOfertesController::class, 'contactar'])->name('contactar');


Route::get('/inscriure/{oferta_id}/{alumne_id}', [AlumnesOfertesController::class, 'inscriure'])->name('inscriure');


/*AlumnesEstudis*/

use App\Http\Controllers\AlumnesEstudisController;

Route::post('/alumnes-estudis', [AlumnesEstudisController::class, 'store']);
Route::get('/alumnes-estudis', [AlumnesEstudisController::class, 'index']);
Route::get('/alumnes-estudis/{alumne_id}/{estudi_id}', [AlumnesEstudisController::class, 'get']);
Route::put('/alumnes-estudis/{alumne_id}/{estudi_id}', [AlumnesEstudisController::class, 'update']);
Route::delete('/alumnes-estudis/{alumne_id}/{estudi_id}', [AlumnesEstudisController::class, 'destroy']);


/*Pagines WEB*/
// Rutes publiques
Route::get('/buscar', function () {
    return view('front.app.buscarOferta');
});

Route::get('/alta', function () {
    return view('front.app.donarAlta');
});


Route::get('/', function () {
    return view('front.app.index');
});

// ------------------ [ ADMIN ] ------------------ //






// Login
Route::get('/login', function () {


    if (Auth::check()) {           
    return redirect('/');
    }  
    
    
    return view('front.app.login');           
    
});


//Recuperar contrasenya
Route::get('/recuperar', function () {
    
    if (Auth::check()) {           
    return redirect('/');
    }  
  
    return view('front.app.recuperacio_clau');
});




//Comprovar si esta loguejat

Route::middleware(['auth'])->group(function () {


//Rutes de alumnes

Route::get('/lesmevesofertes', function () {
      
      if (auth()->user()->rol !== 'Alumnes') {         
        return redirect('/');
      }

    return view('front.app.lesmevesofertes');
});

Route::get('/detalls', function () {

     if (auth()->user()->rol !== 'Alumnes') {         
       return redirect('/');
     }
      
    return view('front.app.visualitzarOfertes');
});


Route::get('/modificar', function () {

     if (auth()->user()->rol !== 'Alumnes') {         
       return redirect('/');
     }
      
    return view('front.app.modificardadesalumne');
});


Route::get('/historial', function () {

     if (auth()->user()->rol !== 'Alumnes') {         
       return redirect('/');
     }
      
    return view('front.app.historialofertes');
});

//Rutes de empresa

Route::get('/iniciempresa', function () {

    if (auth()->user()->rol !== 'Empreses') {
      return redirect('/');
    }
    return view('admin.app.iniciempresa');
});

Route::get('/modificarempresa', function () {
    
    if (auth()->user()->rol !== 'Empreses') {
      return redirect('/');
    }
    
    return view('admin.app.modificarempresa');
});




Route::get('/contactar', function () {

    if (auth()->user()->rol !== 'Empreses') {
      return redirect('/');
    }

    return view('admin.app.contactar');
});

Route::get('/afegirOferta', function () {

    if (auth()->user()->rol !== 'Empreses') {
      return redirect('/');
    }

    return view('admin.app.afegirOferta');
});

Route::get('/modificarOferta/{id}', function ($id) {

    if (auth()->user()->rol !== 'Empreses') { 
        return redirect('/');
    }

    return view('admin.app.modificarOferta', ['id' => $id]);
});




  //Rutes de Admin
  
  Route::get('/registrar', function () {
  
    if (auth()->user()->rol !== 'Administradors') {
      return redirect('/');
    }
  
    return view('admin.app.registrar');
  });
  
  Route::get('/validar', function () {
  
      if (auth()->user()->rol !== 'Administradors') {
        return redirect('/');
      }
      
      return view('admin.app.validar');
  });
  
  Route::get('/admin', function () {
  
      if (auth()->user()->rol !== 'Administradors') {
        return redirect('/');
      }
      
      return view('admin.app.admin');
  });



});
