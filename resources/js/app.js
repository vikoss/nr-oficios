import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import './index.css'
import { JWT } from './helpers/localStorage'

router.beforeEach((to, from, next) => {
  if (to.name !== 'Login' && !JWT()) next({ name: 'Login' })
  else next()
});

createApp(App)
  .use(router)
  .mount('#app')
