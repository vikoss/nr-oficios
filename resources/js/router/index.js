import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: () => import ('./../views/Home.vue'),
  },
  {
    path: '/notificaciones',
    name: 'Notifications',
    component: () => import ('./../views/Notifications.vue'),
  },
  {
    path: '/notificar',
    name: 'Notify',
    component: () => import ('./../views/Notify.vue'),
  },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
