
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import 'bootstrap';

import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import { i18nVue } from 'laravel-vue-i18n'

import { Settings } from "luxon";
Settings.defaultLocale = "fi";

import axios from 'axios';
axios.defaults.baseURL = '/api'

import routes from './routes';
import store from './store';

const router = createRouter({
  history: createWebHistory(),
  routes
})

router.beforeEach((to, from, next) => {
  if (document.body.classList.contains('menu-open')) {
    document.body.classList.remove('menu-open')
  }
  next()
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Application from './containers/Application.vue';

const app = createApp(Application);
app.use(router)
  .use(i18nVue, {
    resolve: async lang => {
        const langs = import.meta.glob('../../lang/*.json');
        return await langs[`../../lang/${lang}.json`]();
    }
  })
  .use(store)
  .mount('#vue-app');
