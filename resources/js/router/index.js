window.Vue = require('vue').default;

import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter)

import _404 from '../pages/_404.vue'
const Home = require('../pages/Home.vue').default
const About = require('../pages/About.vue').default
import User from '../pages/users/User.vue'
import Profile from '../pages/users/Profile.vue'
import Register from '../pages/users/Register.vue'
import EditUser from '../pages/users/Edit.vue'
import UploadImageUser from '../pages/users/Upload.vue'
import Login from '../pages/auth/Login.vue'
// const _404 = require('./pages/_404.vue').default

const routes = [

  {
    name: 'Login',
    path: '/login',
    component: Login,
  },
  {
    name: 'Home',
    path: '/home',
    component: Home,
  },
  {
    name: 'About',
    path: '/about',
    component: About,
  },
  {
    name: 'User',
    path: '/user',
    // path: '/user/:id_name?',
    component: User,
    // props: true,
  },
  {
    name: 'Register',
    path: '/user/create',
    component: Register,
  },
  {
    name: 'EditUser',
    path: '/user/:id/edit',
    component: EditUser,
    props: true,
  },
  {
    name: 'UploadImageUser',
    path: '/user/upload/:id',
    component: UploadImageUser,
    props: true,
  },
  {
    name: 'Profile',
    path: '/user/:id',
    component: Profile,
    props: true,
  },
  {
    path: '*',
    component: _404,
  },
]

const router = new VueRouter({
  linkActiveClass: 'active',
  mode: 'history',
  routes
})

const is_authenticated = false

router.beforeEach((to, from, next) => {
  if (to.name !== 'Login' && !is_authenticated) next({ name: 'Login' });
  if (to.name === 'Login' && is_authenticated) next({ name: 'Home' });
  next();
})

// router.beforeEach((to, from, next) => {
//   console.log(to);
//   console.log(to.name);
//   console.log(from);
//   console.log(next);
//   if (to.name !== 'Login') next({ name: 'Login' })
//   if (to.matched.some(record => record.meta.requiresAuth)) {
//     // this route requires auth, check if logged in
//     // if not, redirect to login page.
//     if (!store.getters.isLoggedIn) {
//       next({ name: 'Login' })
//     } else {
//       next() // go to wherever I'm going
//     }
//   } else {
//     next() // does not require auth, make sure to always call next()!
//   }
// })
//
export default router
