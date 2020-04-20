<template>
  <b-container class="mt-5 text-center" fluid>

    <b-card title="¡Bienvenid@ a IF-ORMATICOS FC!" header-tag="nav">
      <template v-slot:header>
        <b-nav card-header tabs>
          <b-nav-item active>Iniciar sesión</b-nav-item>
          <b-nav-item :to="{name: 'Registrar'}">Registrarme</b-nav-item>
        </b-nav>
      </template>

      <!-- Usuario -->
      <b-row class="mt-4">
        <b-col>
          <b-card-text>Dni:</b-card-text>
        </b-col>
        <b-col>
          <b-form-input type="text" placeholder="Introduce aquí tu dni"></b-form-input>
        </b-col>
      </b-row>

      <!-- Contraseña -->
      <b-row class="mt-4">
        <b-col>
          <b-card-text>Contraseña:</b-card-text>
        </b-col>
        <b-col>
          <b-form-input type="password" placeholder="Introduce aquí tu contraseña"></b-form-input>
        </b-col>
      </b-row>

      <!-- Botón de iniciar -->
      <b-row class="mt-4">
        <b-col>
          <b-button variant="success">Iniciar</b-button>
        </b-col>        
      </b-row>     
    </b-card>
  </b-container>
</template>

<script>
  export default {
    data() {
      return {
        text: '',
        password: ''

      }
    }
  }
</script>
