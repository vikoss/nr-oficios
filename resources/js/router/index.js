import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: () => import ('./../views/Home.vue'),
  },
  {
    path: '/notificaciones/:notification/correos/:email',
    name: 'Emails',
    component: () => import ('./../views/Emails/Details.vue'),
  },
  {
    path: '/notificaciones/:notification',
    name: 'NotificationDetails',
    component: () => import ('./../views/Notifications/Details.vue'),
  },
  {
    path: '/notificaciones',
    name: 'Notifications',
    component: () => import ('./../views/Notifications/Index.vue'),
  },
  {
    path: '/notificar',
    name: 'Notify',
    component: () => import ('../views/Notifications/Notify.vue'),
  },
  {
    path: '/validacion/:email',
    name: 'EmailValidation',
    component: () => import ('./../views/Emails/Validation.vue'),
  },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
