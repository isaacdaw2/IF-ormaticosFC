<template class="bg-danger">
  <div id="app">
      
      <b-navbar toggleable="md" type="dark" variant="primary">

        <b-container>

          <b-navbar-toggle target="navbar-toggle-collapse">
            <template v-slot:default="{ expanded }">
              <b-icon v-if="expanded" icon="chevron-bar-up"></b-icon>
              <b-icon v-else icon="chevron-bar-down"></b-icon>
            </template>
          </b-navbar-toggle>
          <b-navbar-brand :to="{name: 'Noticias'}">
            <img src="./assets/balon.png" alt="" width="40">
            IF-ormáticos FC</b-navbar-brand>

          <b-collapse id="navbar-toggle-collapse" is-nav>

            <b-navbar-nav>

              <b-nav-item  v-show="visto1" :to="{name: 'Noticias'}">Noticias del club</b-nav-item>
              <b-nav-item v-show="visto2" :to="{name: 'Socio'}">Inscribirse como socio</b-nav-item>
              <b-nav-item v-show="visto3" :to="{name: 'Jugador'}">Inscribirse como jugador</b-nav-item>              
              <b-nav-item v-show="visto4" :to="{name: 'Entrenador'}">Enviar solicitud de entrenador</b-nav-item>       
              <b-nav-item v-show="!visto" :to="{name: 'Iniciar'} ">Registro / Iniciar sesión</b-nav-item>       

             
            </b-navbar-nav>

          </b-collapse>

        </b-container>

      </b-navbar>

      <b-container>
        <router-view/>
      </b-container>   
  </div>
</template>

<style>
  body{
    background-color: papayawhip;
  }  
</style>