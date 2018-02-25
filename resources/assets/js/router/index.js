/**
 * Routes for the Vue application.
 * Routes are for the sidebar navigation.
 */

import Vue from 'vue';
import Router from 'vue-router';
import ContactCardBodyList from '../components/ContactCardBodyList.vue';
import ContactCardBodyAdd from '../components/ContactCardBodyAdd.vue';
import GroupCardShell from '../containers/GroupCardShell.vue';
import CompanyCardShell from '../containers/CompanyCardShell.vue';

Vue.use(Router);

export default new Router({
  routes: [
    {
      path: '/contacts',
      name: 'ContactCardBodyList',
      component: ContactCardBodyList
    },
    {
      path: '/contacts/add',
      name: 'ContactCardBodyAdd',
      component: ContactCardBodyAdd
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