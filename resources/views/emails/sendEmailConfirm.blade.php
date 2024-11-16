<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seleccionat per a l'Oferta</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
  p ,h1{
  color:white;
  }
  </style>
</head>
<body class="d-flex align-items-center justify-content-center" style="height: 65vh; background-color:#212529;">
  <div class="container text-center">
    <div class="row">
      <div class="col-md-8 offset-md-2 mt-100">

        <h1 class="mt-5">Felicitats! Ha sigut seleccionat per a l'oferta de <b>{{ $oferta->descripcio }}</b></h1>
        
        <p>Hola, som l'empresa {{ $empresa->nom }}, creiem que compleixes els requisits necessaris per a l'oferta "{{ $oferta->descripcio }}".</p>
          
        <p>Contacta amb nosaltres a través del correu electrònic<b> {{ $usuariEmpresa->email }}</b> o al telèfon <b>{{ $empresa->primer_telefon_contacte }}</b> per a més informació.</p>

        
      </div> 
    </div> 
  </div>
</body>
</html>


 
