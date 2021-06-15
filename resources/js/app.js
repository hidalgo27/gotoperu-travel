/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

window.Vue = require('vue');

import Element from 'element-ui';
import locale from "element-ui/src/locale/lang/es";
import VueTelInput from "vue-tel-input"
Vue.use(Element, {locale});
Vue.use(VueTelInput);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('search-package', require('./components/searchPackage.vue').default);
Vue.component('search-package-page', require('./components/searchPackagesPage').default);
Vue.component('search-list-package', require('./components/searchListPackage.vue').default);
Vue.component('search-list-package-page', require('./components/searchListPackagePage').default);
Vue.component('destino-package', require('./components/destinoPackage.vue').default);
Vue.component('tiempo-package', require('./components/duracionPackage').default);
Vue.component('categoria-package', require('./components/categoriaPackage').default);
Vue.component('spinner', require('./components/Spinner').default);

Vue.component('form-inquire', require('./components/form/FormInquire').default);
Vue.component('destino-form', require('./components/form/destinoForm').default);
Vue.component('categoria-form', require('./components/form/categoriaForm').default);
Vue.component('numero-pasajeros-form', require('./components/form/numeroPasajerosForm').default);
Vue.component('duracion-form', require('./components/form/duracionForm').default);
Vue.component('form-inquire-detail', require('./components/form/FormInquireDetail').default);
Vue.component('first-step', require('./components/form/FirstStep').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
