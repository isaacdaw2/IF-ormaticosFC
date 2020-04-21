<template>
  <div class="mt-3">

    <!-- Cabecera slides -->
    <b-carousel
        id="carousel-fade"
        style="text-shadow: 0px 0px 2px #000"
        fade="fade"
        indicators="indicators"
        img-width="1024"
        img-height="480">
        <b-carousel-slide
            caption="Bienvenid@ a nuestra web"
            :img-src="require('../assets/balon-de-futbol.jpg')"></b-carousel-slide>
        <b-carousel-slide
            caption="Comparte nuestra pasión"
            :img-src="require('../assets/campo.jpg')"></b-carousel-slide>
        <b-carousel-slide
            caption="Aquí encontrarás las noticias del club"
            :img-src="require('../assets/escuela.jpg')"></b-carousel-slide>
        <b-carousel-slide
            caption="Resultados"
            :img-src="require('../assets/futbol.jpg')"></b-carousel-slide>
    </b-carousel>

      <!-- cards con noticias -->
    <div class="mt-3 mb-3">
      <!-- Primera línea de cards -->
      <div>
        <b-card-group deck="deck">
            <b-card
                bg-variant="primary"
                text-variant="white"
                header="Historia del club"
                class="text-center">
                <b-card-text>Conoce nuestra historia</b-card-text>                                
            </b-card>

            <b-card
                bg-variant="secondary"
                text-variant="white"
                header="Instalaciones"
                class="text-center">
                <b-card-text>Contempla nuestras instalaciones</b-card-text>                
            </b-card>

            <b-card
                bg-variant="success"
                text-variant="white"
                header="Plantillas"
                class="text-center">
                <b-card-text>Conoce nuestras plantillas</b-card-text>                
            </b-card>
        </b-card-group>
      </div>

      <!-- Segunda línea de cards -->
      <div class="mt-3">
        <b-card-group deck="deck">
            <b-card
                bg-variant="info"
                text-variant="white"
                header="Clasificación"
                class="text-center">
                <b-card-text>Observa nuestra clasificación en la tabla</b-card-text>
            </b-card>

            <b-card
                bg-variant="warning"
                text-variant="white"
                header="Próximos partidos"
                class="text-center">
                <b-card-text>Aquí puedes ver contra quien jugamos el próximo encuentro</b-card-text>
            </b-card>

            <b-card
                bg-variant="danger"
                text-variant="white"
                header="Resultados"
                class="text-center">
                <b-card-text>Mira como nos ha ido en los últimos partidos</b-card-text>
            </b-card>
        </b-card-group>
      </div>

      <!-- cards horizontales -->
      <div class="mt-3">
        <b-card no-body="no-body" class="overflow-hidden">
            <b-row no-gutters="no-gutters">
                <b-col md="6">
                    <b-card-img
                        :src="require('../assets/logo_rfef.jpg')"
                        alt="Image"
                        class="rounded-0"></b-card-img>
                </b-col>
                <b-col md="6">
                    <b-card-body title="Suspensión de las competiciones">
                        <b-card-text>
                            La RFEF aprueba la suspensión de todas las competiciones no profesionales hasta que las autoridades consideren que se pueden reanudar sin riesgo
                        </b-card-text>
                    </b-card-body>
                </b-col>
            </b-row>
        </b-card>
      </div>

      
    </div>
  </div>    
</template>

<script>
    // @ is an alias to /src
    import Noticias from '@/components/Noticias.vue'

    export default {name: 'Home', components: {
            Noticias
        }}
</script>