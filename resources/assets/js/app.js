
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 *  Load all required additional packages
 */
import ElementUI from 'element-ui';
import locale from 'element-ui/lib/locale/lang/en';
import App from './containers/App.vue';
import router from './router';

Vue.use(ElementUI, {locale});

const app = new Vue({
    el: '#appshell',
    router,
    template: '<App/>',
	components: { App }
});
