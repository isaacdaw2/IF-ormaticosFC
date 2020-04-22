<template>
  <div class="mt-3">

    <!-- Cabecera slides -->
    <b-carousel
        id="carousel-fade"
        style="text-shadow: 0px 0px 2px #000"
        fade
        indicators
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
                class="text-center"
                href="#">
                <b-card-text><a href="#" class="text-white">Conoce nuestra historia</a></b-card-text>                                
            </b-card>

            <b-card
                bg-variant="secondary"
                text-variant="white"
                header="Instalaciones"
                class="text-center">
                <b-card-text><a href="#" class="text-white">Contempla nuestras instalaciones</a></b-card-text>                
            </b-card>

            <b-card
                bg-variant="success"
                text-variant="white"
                header="Plantillas"
                class="text-center">
                <b-card-text><a href="#" class="text-white">Conoce nuestras plantillas</a></b-card-text>                
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
                <b-card-text><a href="#" class="text-white">Observa nuestra clasificación en la tabla</a></b-card-text>
            </b-card>

            <b-card
                bg-variant="warning"
                text-variant="white"
                header="Próximos partidos"
                class="text-center">
                <b-card-text><a href="#" class="text-white">Aquí puedes ver contra quien jugamos el próximo encuentro</a></b-card-text>
            </b-card>

            <b-card
                bg-variant="danger"
                text-variant="white"
                header="Resultados"
                class="text-center">
                <b-card-text><a href="#" class="text-white">Mira como nos ha ido en los últimos partidos</a></b-card-text>
            </b-card>
        </b-card-group>
      </div>

      <!-- cards horizontales -->

      <!-- noticia RFEF-->
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
                    <b-card-body title="Suspensión de las competiciones" sub-title="27 marzo, 2020">
                        <b-card-text>
                            La RFEF aprueba la suspensión de todas las competiciones no profesionales hasta que las autoridades consideren que se pueden reanudar sin riesgo
                        </b-card-text>
                    </b-card-body>
                </b-col>
            </b-row>
        </b-card>
      </div>

      <!-- comunicado oficial -->
      <div class="mt-3">
        <b-card no-body="no-body" class="overflow-hidden">
            <b-row no-gutters="no-gutters">
                <b-col md="6">
                    <b-card-img
                        :src="require('../assets/Comunicado_oficial.jpg')"
                        alt="Image"
                        class="rounded-0"></b-card-img>
                </b-col>
                <b-col md="6">
                    <b-card-body title="Comunicado Oficial | Coronavirus" sub-title="10 marzo, 2020">
                        <b-card-text>
                            Quedan suspendidos todos los entrenamientos desde mañana miércoles 11 de marzo de 2020 hasta nuevo aviso. La Real Federación de Fútbol de Madrid ha anunciado la suspensión de las competiciones territoriales durante las próximas dos semanas.
                        </b-card-text>
                    </b-card-body>
                </b-col>
            </b-row>
        </b-card>
      </div>

      <!-- resultados -->
      <div class="mt-3">
        <b-card no-body="no-body" class="overflow-hidden">
            <b-row no-gutters="no-gutters">
                <b-col md="6">
                    <b-card-img
                        :src="require('../assets/resultados.jpg')"
                        alt="Image"
                        class="rounded-0"></b-card-img>
                </b-col>
                <b-col md="6">
                    <b-card-body title="Resultados del fin de semana" sub-title="9 marzo, 2020">
                        <b-card-text>
                            Nuestros equipos continuan con la buena dinámica de estas últimas 7 jornadas. Tras el tropiezo inicial a la vuelta de navidad, se cuentan los partidos por victoria.
                        </b-card-text>
                    </b-card-body>
                </b-col>
            </b-row>
        </b-card>
      </div>

      <!-- Puesto de entrenador -->
      <div class="mt-3">
        <b-card no-body="no-body" class="overflow-hidden">
            <b-row no-gutters="no-gutters">
                <b-col md="6">
                    <b-card-img
                        :src="require('../assets/puesto_entrenador.jpg')"
                        alt="Image"
                        class="rounded-0"></b-card-img>
                </b-col>
                <b-col md="6">
                    <b-card-body title="Puestos de entrenadores vacantes" sub-title="2 marzo, 2020">
                        <b-card-text>
                            Tenemos disponibles algunas vacantes de entrenadores de algunas de nuestras plantillas, si tienes el título mandalo y forma parte del club.
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