<template>
  <div class="home">
    <img alt="Vue logo" src="../assets/logo.png">
    <Noticias msg="Bienvenido a IF-ormáticos FC"/>
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
