window.Vue = require('vue').default;

import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter)

import _404 from '../pages/_404.vue'
const Home = require('../pages/Home.vue').default
const About = require('../pages/About.vue').default
import User from '../pages/User.vue'
// const _404 = require('./pages/_404.vue').default

const routes = [

  {
    path: '/home',
    component: Home,
  },
  {
    path: '/about',
    component: About,
  },
  {
    path: '/user/:name?',
    component: User,
    props: true,
  },
  {
    path: '*',
    component: _404,
  },
]

const router = new VueRouter({
  mode: 'history',
  routes
})

export default router
