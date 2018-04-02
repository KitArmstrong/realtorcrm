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
import ContactCardBodyView from '../components/ContactCardBodyView.vue';
import DashboardCardShell from '../containers/DashboardCardShell.vue';

Vue.use(Router);

export default new Router({
  routes: [
    {
      path: '/dashboard',
      name: 'dashboard',
      component: DashboardCardShell
    },
    {
      path: '/contacts',
      name: 'contacts',
      component: ContactCardBodyList
    },
    {
      path: '/contacts/add',
      name: 'contact-add',
      component: ContactCardBodyAdd
    },
    {
      path: '/contacts/:id',
      name: 'contacts-view',
      component: ContactCardBodyView
    },
    {
      path: '/groups',
      name: 'groups',
      component: GroupCardShell
    },
    {
      path: '/companies',
      name: 'companies',
      component: CompanyCardShell
    }
  ]
});