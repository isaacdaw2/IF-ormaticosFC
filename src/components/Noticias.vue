<template>
  <div class="hello">
    <h1>{{ msg }}</h1>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active" style="height: 100vh;">
            <img src="../assets/balon-de-futbol.jpg" class="d-block w-100" alt="fondo1">
          </div>
          <div class="carousel-item" style="height: 100vh;">
            <img src="../assets/campo.jpg" class="d-block w-100" alt="fondo2">
          </div>
          <div class="carousel-item" style="height: 100vh;">
            <img src="../assets/escuela.jpg" class="d-block w-100" alt="fondo-3">
          </div>
          <div class="carousel-item" style="height: 100vh;">
            <img src="../assets/futbol.jpg" class="d-block w-100" alt="fondo-3">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    
  </div>
</template>

<script>
export default {
  name: 'Noticias',
  props: {
    msg: String
  }
}
</script>