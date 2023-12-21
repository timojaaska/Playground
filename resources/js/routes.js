// 1. Define route components.
// These can be imported from other files

import UsersView from './containers/UsersView.vue';
import UserView from './containers/UserView.vue';

// 2. Define some routes
// Each route should map to a component. The "component" can
// either be an actual component constructor created via
// `Vue.extend()`, or just a component options object.
// We'll talk about nested routes later.
const routes = [
  { path: '/users', component: UsersView, meta: { auth: true } },
  { path: '/users/create', component: UserView, meta: { auth: true }},
  { path: '/users/:id', component: UserView, meta: { auth: true }},

]

export default routes;