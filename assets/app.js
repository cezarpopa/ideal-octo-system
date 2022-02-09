import Vue from 'vue';
import App from './js/views/App';
import './js/imports';
import router from './js/router';
import './js/registerServiceWorker';

Vue.config.productionTip = false;

new Vue({
  router,
  el: '#app',
  render: (h) => h(App),
}).$mount('#app');
