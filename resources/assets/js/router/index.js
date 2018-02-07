/**
 * Routes for the Vue application.
 * Routes are for the sidebar navigation.
 */

import Vue from 'vue';
import Router from 'vue-router';
import ContactCardShell from '../components/ContactCardShell.vue';
import GroupCardShell from '../components/GroupCardShell.vue';
import CompanyCardShell from '../components/CompanyCardShell.vue';

Vue.use(Router);

export default new Router({
  routes: [
    {
      path: '/contacts',
      name: 'ContactCardShell',
      component: ContactCardShell
    },
    {
      path: '/groups',
      name: 'GroupCardShell',
      component: GroupCardShell
    },
    {
      path: '/companies',
      name: 'CompanyCardShell',
      component: CompanyCardShell
    }
  ]
});