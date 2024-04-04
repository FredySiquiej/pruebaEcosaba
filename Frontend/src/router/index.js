import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import CrearItems from '../components/CrearItems.vue'
import ListarItems from '../components/ListarItems.vue'
import EditarItems from '../components/EditarItems.vue'
import CrearIngrediente from '../components/CrearIngrediente.vue'
import EditarIngrediente from '../components/EditarIngrediente.vue'
import ListarIngrediente from '../components/ListarIngrediente.vue'
import AsignarIngredientes from '../components/AsignarIngredientes.vue'
//import SeleccionarIngredientes from '@/components/SeleccionarIngredientes.vue'





const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },


  {
    path: '/crearitems',
    name: 'CrearItems',
    component: CrearItems
  },

  
  {
    path: '/editaritems/:id',
    name: 'EditarItems',
    component: EditarItems
  },

  {
    path: '/listaritems',
    name: 'ListarItems',
    component: ListarItems
  },

  {
    path: '/listaringrediente',
    name: 'ListarIngrediente',
    component: ListarIngrediente
  },

  {
    path: '/crearingrediente',
    name: 'CrearIngrediente',
    component: CrearIngrediente
  },
  
  {
    path: '/editaringrediente/:id',
    name: 'EditarIngrediente',
    component: EditarIngrediente
  },

  {
    path: '/asignaringredientes',
    name: 'asignaringredientes',
    component: AsignarIngredientes
  },
/*
  {
    path: '/seleccionaringredientes',
    name: 'seleccionaringredientes',
    component: SeleccionarIngredientes
  },
*/
  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
