<header class="p-3 mb-3 border-bottom">
  <script src="https://kit.fontawesome.com/6102a80a3f.js" crossorigin="anonymous"></script>
    <div class="">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
          <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
            <img src="{{ asset('img/Logo-sense-fons.png') }}" alt="Logo" width="40" height="32">
          </a>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center md-0">
            <a class="btn" href="/" style="background-color: transparent; border-color: transparent;">Inici</a>
            <a class="btn" href="/buscar" style="background-color: transparent; border-color: transparent;">Buscar ofertes</a>
            
            @if(auth()->check() && auth()->user()->rol == 'Alumnes')
            <a class="btn" href="/historial" style="background-color: transparent; border-color: transparent;">Estat ofertes</a>
            <a class="btn" href="/lesmevesofertes" style="background-color: transparent; border-color: transparent;">Les meves ofertes</a>
            @endif 
            
            @if(auth()->check() && auth()->user()->rol == 'Empreses')
            <a class="btn" href="/iniciempresa" style="background-color: transparent; border-color: transparent;">Les meves ofertes</a>
            @endif 
            
            @if(auth()->check() && auth()->user()->rol == 'Administradors')
            <a class="btn" href="/admin" style="background-color: transparent; border-color: transparent;">Admin Menu</a>
            @endif 
        </ul>
        

        @if(auth()->check() && auth()->user()->rol == 'Alumnes')
        <p class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" > {{ session('userData')->nom }} {{ session('userData')->primer_cognom }} {{ session('userData')->segon_cognom }} </p>
        @endif 
        
        @if(auth()->check() && auth()->user()->rol == 'Empreses')
        <p class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" > {{ session('userData')->nom }}</p>
        @endif 
        
        @if(auth()->check() && auth()->user()->rol == 'Administradors')
        <p class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" >{{ auth()->user()->email }}</p>
        @endif 
        
        
        

        <div class="dropdown text-end">
          <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown"
            aria-expanded="false">
            
            @if(!auth()->check())
            
            <i class="fa-solid fa-user-large-slash rounded-circle" style="color: #ffffff;" alt="mdo" width="70" height="70"></i>
            
            @endif
          
            @if(auth()->check() && auth()->user()->rol == 'Alumnes')
            
            <i class="fa-solid fa-user rounded-circle" style="color: #ffffff;" alt="mdo" width="70" height="70"></i>
            
            @endif
            
            @if(auth()->check() && auth()->user()->rol == 'Empreses')
             
            <i class="fa-solid fa-users rounded-circle" style="color: #ffffff;" alt="mdo" width="70" height="70"></i>
            
            @endif
            
            
            @if(auth()->check() && auth()->user()->rol == 'Administradors')
             
            <i class="fa-solid fa-user-tie rounded-circle" style="color: #ffffff;" alt="mdo" width="70" height="70"></i>
            
            @endif
            
            

          </a>
           
          <ul class="dropdown-menu text-small">
            
          @if(auth()->check() && auth()->user()->rol == 'Alumnes')
            <li><a class="dropdown-item" href="/modificar">Confguració</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
          @endif 
            
          @if(auth()->check() && auth()->user()->rol == 'Empreses')
            <li><a class="dropdown-item" href="/modificarempresa">Confguració</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
          @endif 
            
          @if(!auth()->check())
            
            <li><a class="dropdown-item" href="/alta">Registrar-se</a></li>
            <li><a class="dropdown-item" href="/login">Iniciar sessió</a></li>
            
          @endif


          
          
          @if(auth()->check())
            
            <li>
            <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="dropdown-item" type="submit">Tancar sessió</button>
            </form>
            </li>
            
          @endif 
            
          </ul>
        </div>
      </div>
    </div>
  </header>