import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

  const routes = [
  {
    path: '/',
    name: 'Noticias',
    component: () => import(/* webpackChunkName: "noticias" */ '../views/Noticias.vue')
  },
  {
    path: '/jugador',
    name: 'Jugador',
    component: () => import(/* webpackChunkName: "jugador" */ '../views/Jugador.vue')
  },
  {
    path: '/socio',
    name: 'Socio',
    component: () => import(/* webpackChunkName: "socio" */ '../views/Socio.vue')
  },
  {
    path: '/entrenador',
    name: 'Entrenador',
    component: () => import(/* webpackChunkName: "entrenador" */ '../views/Entrenador.vue')
  },
  {
    path: '/iniciar',
    name: 'Iniciar',
    component: () => import(/* webpackChunkName: "Iniciar" */ '../views/Iniciar.vue')
  },
  {
    path: '/registrar',
    name: 'Registrar',
    component: () => import(/* webpackChunkName: "Registrar" */ '../views/Registrar.vue')
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
