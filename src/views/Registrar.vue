<template>
  <b-container class="mt-5 text-center" fluid>

    <b-card title="¡Rellena este formulario!" header-tag="nav">
      <template v-slot:header>
        <b-nav card-header tabs>
          <b-nav-item :to="{name: 'Iniciar'}">Iniciar sesión</b-nav-item>
          <b-nav-item active>Registrarme</b-nav-item>
        </b-nav>
      </template>

      

      <!-- Nombre -->
      <b-row class="mt-4">
        <b-col>
          <b-card-text>Nombre:</b-card-text>
        </b-col>
        <b-col>
          <b-form-input type="text" placeholder="Introduce aquí tu nombre"></b-form-input>
        </b-col>
      </b-row>

      <!-- Apellidos -->
      <b-row class="mt-4">
        <b-col>
          <b-card-text>Apellidos:</b-card-text>
        </b-col>
        <b-col>
          <b-form-input type="text" placeholder="Introduce aquí tus apellidos"></b-form-input>
        </b-col>
      </b-row>

      <!-- DNI -->
      <b-row class="mt-4">
        <b-col>
          <b-card-text>Dni:</b-card-text>
        </b-col>
        <b-col>
          <b-form-input type="text" placeholder="Introduce aquí tu dni"></b-form-input>
        </b-col>
      </b-row>

      <!-- Fecha de nacimiento -->
      <b-row class="mt-4">
        <b-col>
          <b-card-text>Fecha de nacimiento:</b-card-text>
        </b-col>
        <b-col>
          <b-form-input type="date" placeholder="Introduce aquí tu fecha de nacimiento"></b-form-input>
        </b-col>
      </b-row>

      <hr><span class="text-success">Dirección</span>

      <!-- Calle -->
      <b-row class="mt-4">
        <b-col>
          <b-card-text>Calle:</b-card-text>
        </b-col>
        <b-col>
          <b-form-input type="text" placeholder="Introduce aquí el nombre de tu calle"></b-form-input>
        </b-col>
      </b-row>

      <!-- Localidad -->
      <b-row class="mt-4">
        <b-col>
          <b-card-text>Localidad:</b-card-text>
        </b-col>
        <b-col>
          <b-form-input type="text" placeholder="Introduce aquí la localidad"></b-form-input>
        </b-col>
      </b-row>

      <!-- Provincia -->
      <b-row class="mt-4">
        <b-col>
          <b-card-text>Provincia:</b-card-text>
        </b-col>
        <b-col>
          <b-form-input type="text" placeholder="Introduce aquí la provincia"></b-form-input>
        </b-col>
      </b-row>

      <!-- CP -->
      <b-row class="mt-4">
        <b-col>
          <b-card-text>CP:</b-card-text>
        </b-col>
        <b-col>
          <b-form-input type="text" placeholder="Introduce aquí el código póstal"></b-form-input>
        </b-col>
      </b-row>




      <hr>
      

      <!-- Contraseña -->
      <b-row class="mt-4">
        <b-col>
          <b-card-text>Contraseña:</b-card-text>
        </b-col>
        <b-col>
          <b-form-input type="password" placeholder="Introduce una contraseña"></b-form-input>
        </b-col>
      </b-row>

      <!-- Repetir contraseña -->
      <b-row class="mt-4">
        <b-col>
          <b-card-text>Repite contraseña:</b-card-text>
        </b-col>
        <b-col>
          <b-form-input type="password" placeholder="Repite la contraseña"></b-form-input>
        </b-col>
      </b-row>

      <!-- Botón de registrar -->
      <b-row class="mt-4">
        <b-col>
          <b-button variant="success">Registrarme</b-button>
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
        password: '',
        date: ''

      }
    }
  }
</script>
