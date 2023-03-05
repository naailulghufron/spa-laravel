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
// const _404 = require('./pages/_404.vue').default

const routes = [

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

export default router
