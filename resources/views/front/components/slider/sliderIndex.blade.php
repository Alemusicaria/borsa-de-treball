<style>
  .carousel-item {
    position: relative;
    background-image: url('img/slider1.jpg');
    background-size: cover;
    background-position: center;
  }
  
  .carousel-item::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6); /* Ajusta l'opacitat segons la teva preferència */
  }
  
  .carousel-control-prev-icon, .carousel-control-next-icon {
    filter: invert(1); /* Inverteix els colors dels ícones per fer-los blancs */
  }
</style>

<div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"  style="background-color:white;"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"  style="background-color:white;"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"  style="background-color:white;"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="container">
        <div class="carousel-caption text-start" style="color:white;">
          <h1>Borsa de Treball a Mollerussa</h1>
          <p class="opacity-75">Descobreix oportunitats professionals a Mollerussa amb la nostra borsa de treball.</p>
          <p><a class="btn btn-lg btn-primary" href="/buscar" style="background-color: #6cad07; border-color: #6cad07">Inscriu-te avui</a></p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="container">
        <div class="carousel-caption text-start" style="color:white;">
          <h1>Oportunitats Professionals a Mollerussa</h1>
          <p>Explora les ofertes de treball disponibles i avança en la teva carrera a Mollerussa.</p>
          <p><a class="btn btn-lg btn-primary" href="/buscar" style="background-color: #6cad07; border-color: #6cad07">Més informació</a></p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="container">
        <div class="carousel-caption text-start" style="color:white;">
          <h1>Oportunitats Laborals a Mollerussa</h1>
          <p>Consulta les últimes ofertes de treball i troba la teva carrera professional a Mollerussa.</p>
          <p><a class="btn btn-lg btn-primary" href="/buscar" style="background-color: #6cad07; border-color: #6cad07">Explora la borsa de treball</a></p>
        </div>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
    <i class="fa-solid fa-chevron-left" style="color: #ffffff;"></i>
    <span class="visually-hidden">Anterior</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
    <i class="fa-solid fa-chevron-right" style="color: #ffffff;"></i>
    <span class="visually-hidden">Següent</span>
  </button>
</div>
