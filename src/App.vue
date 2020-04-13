<template>
  <div id="app">
      
      <b-navbar toggleable="md" type="dark" variant="primary">

        <b-container>

          <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
          <b-navbar-brand :to="{name: 'Home'}">IF-or-Máticos</b-navbar-brand>

          <b-collapse id="nav-collapse" is-nav>

            <b-navbar-nav>
              <b-nav-item :to="{name: 'Home'}">Noticias del club</b-nav-item>
              <b-nav-item :to="{name: 'Jugador'}">Inscribirse como jugador</b-nav-item>
              <b-nav-item :to="{name: 'Grid'}">Inscribirse como socio</b-nav-item>
              <b-nav-item :to="{name: 'Cards'}">Enviar solicitud de entrenador</b-nav-item>
              <b-nav-item :to="{name: 'Form'}">Plantillas</b-nav-item>
            </b-navbar-nav>

          </b-collapse>

        </b-container>

      </b-navbar>

      <b-container>
        <router-view/>
      </b-container>   
  </div>
</template>

