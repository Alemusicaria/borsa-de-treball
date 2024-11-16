<form method="POST" action="{{ route('login') }}">
    @csrf <!-- Añadir este campo oculto para protección CSRF -->

    <div class="d-flex align-items-center justify-content-center">
        <img class="mb-4" src="./img/Logo-sense-fons.png" alt width="72">
    </div>
    
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <h1 class="h3 mb-3 fw-normal">Inicia sessió</h1>

    <div class="form-floating">
        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required value="{{ Cookie::get('email') }}">

        <label for="email">Email</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        <label for="password">Contrasenya</label>
    </div>

<div class="form-check text-start my-3">
    <input class="form-check-input" type="checkbox" value="1" id="remember" name="remember" {{ request()->cookie('email') ? 'checked' : '' }}>
    <label class="form-check-label" for="remember">
        Recorda el nom d'usuari
    </label>
</div>

    <button class="btn btn-primary w-100 py-2" type="submit">Iniciar sessió</button>
    <p class="mt-3 mb-3 text-body-secondary">
        <a href="/recuperar">Has oblidat la contrasenya?</a>
    </p>
    <p class="mt-5 mb-3 text-body-secondary">&copy; 2024</p>
</form>





