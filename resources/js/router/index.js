import { createRouter, createWebHistory } from 'vue-router'
import checkJWT from './../middleware/checkJWT'

const routes = [
  {
    path: '/login',
    name: 'Login',
    component: () => import ('./../views/Login.vue'),
  },
  {
    path: '/',
    name: 'Home',
    component: () => import ('./../views/Home.vue'),
    meta: {
      middleware: checkJWT,
    },
  },
  {
    path: '/notificaciones/:notification/correos/:email',
    name: 'Emails',
    component: () => import ('./../views/Emails/Details.vue'),
    meta: {
      middleware: checkJWT,
    },
  },
  {
    path: '/notificaciones/:notification',
    name: 'NotificationDetails',
    component: () => import ('./../views/Notifications/Details.vue'),
    meta: {
      middleware: checkJWT,
    },
  },
  {
    path: '/notificaciones',
    name: 'Notifications',
    component: () => import ('./../views/Notifications/Index.vue'),
    meta: {
      middleware: checkJWT,
    },
  },
  {
    path: '/notificar',
    name: 'Notify',
    component: () => import ('../views/Notifications/Notify.vue'),
    meta: {
      middleware: checkJWT,
    },
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
