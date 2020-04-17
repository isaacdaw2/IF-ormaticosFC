<template>
    <div class="mt-5 text-center">
        <h1>¿Tienes el título de entrenador?</h1>
        <h2>Envíanoslo y dirige a alguno de nuestros equipos</h2>
        <img src="../assets/entrenador.png">

        <!-- Seleccionar archivo -->
        <b-row class="mt-3">
            <b-form-file
                v-model="file"
                :state="Boolean(file)"
                placeholder="Elija un archivo o desplácelo aquí..."
                drop-placeholder="Soltar archivo aquí..."
                browse-text="Elegir"
            ></b-form-file>
        </b-row>

        <!-- Botón de enviar-->
        <b-row class="mt-3">
            <b-col>
                <b-button variant="success">Enviar</b-button>
            </b-col>
        </b-row>
    </div>
</template>

<script>
export default {
    name: 'Entrenador',
    data() {
      return {
        file: null
      }
    }
}
</script>