import { createRouter, createWebHistory } from 'vue-router'
import LoginView from '../views/Auth/Login.vue'
import Home from '../views/Home.vue'
import Task from '../views/Task.vue'
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'login',
      component: LoginView
    },
    {
      path: '/home',
      name: 'home',
      component: Home
    },
    {
      path: '/tasks',
      name: 'tasks',
      component: Task
    },
    {
      path: '/signup',
      name: 'signup',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/Auth/Signup.vue')
    }
  ]
})

export default router
