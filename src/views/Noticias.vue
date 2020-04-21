<template>
  <div>
  <b-carousel
    id="carousel-fade"
    style="text-shadow: 0px 0px 2px #000"
    fade
    indicators
    img-width="1024"
    img-height="480"
  >
    <b-carousel-slide
      caption="Bienvenid@ a nuestra web"
      :img-src="require('../assets/balon-de-futbol.jpg')"
    ></b-carousel-slide>
    <b-carousel-slide
      caption="Comparte nuestra pasión"
      :img-src="require('../assets/campo.jpg')"
    ></b-carousel-slide>
    <b-carousel-slide
      caption="Aquí encontrarás las noticias del club"
      :img-src="require('../assets/escuela.jpg')"
    ></b-carousel-slide>
    <b-carousel-slide
      caption=""
      :img-src="require('../assets/futbol.jpg')"
    ></b-carousel-slide>
  </b-carousel>
</div>
</template>

<script>
// @ is an alias to /src
import Noticias from '@/components/Noticias.vue'

export default {
  name: 'Home',
  components: {
    Noticias
  }
}
</script>
