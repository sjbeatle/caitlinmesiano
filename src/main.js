// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue';
import router from './router';
import App from './App';
import Header from './components/Header';
import SocialIcons from './components/SocialIcons';
import MainNav from './components/MainNav';
import Footer from './components/Footer';

Vue.config.productionTip = false;

Vue.component('Header', Header);
Vue.component('SocialIcons', SocialIcons);
Vue.component('MainNav', MainNav);
Vue.component('Footer', Footer);

// scroll to top of page after routing
router.afterEach(() => {
  document.getElementById('app').scrollIntoView();
});

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  template: '<App/>',
  components: { App },
});
