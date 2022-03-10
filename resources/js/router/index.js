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
    path: '/notificaciones/{notification}',
    name: 'NotificationDetails',
    component: () => import ('./../views/NotificationDetails.vue'),
  },
  {
    path: '/notificaciones/{notification}/correos/{email}',
    name: 'Email',
    component: () => import ('./../views/Email.vue'),
  },
  {
    path: '/notificar',
    name: 'Notify',
    component: () => import ('./../views/Notify.vue'),
  },
  {
    path: '/validacion/{email}',
    name: 'Notifications',
    component: () => import ('./../views/Notifications.vue'),
  },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
