import Vue from 'vue';
import Router from 'vue-router';
import Home from '../routes/Home';
import Galleries from '../routes/Galleries';
import Contact from '../routes/Contact';
import Media from '../routes/Media';
import Resume from '../routes/Resume';

Vue.use(Router);

export default new Router({
  // mode: 'history',
  // scrollBehavior(to, from, savedPosition) {
  //   if (savedPosition) {
  //     return savedPosition;
  //   }

  //   return { x: 0, y: 0 };
  // },
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home,
    },
    {
      path: '/galleries',
      name: 'Galleries',
      component: Galleries,
    },
    {
      path: '/contact',
      name: 'Contact',
      component: Contact,
    },
    {
      path: '/media',
      name: 'Media',
      component: Media,
    },
    {
      path: '/resume',
      name: 'Resume',
      component: Resume,
    },
  ],
});
