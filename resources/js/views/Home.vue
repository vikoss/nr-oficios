<template>
  <header-base />
  <main class="px-6 sm:px-16 py-12">
    <div class="grid gap-3 grid-cols-1 sm:grid-cols-2">
      <div class="col-span-1">
        <card-base
          label="Notificar"
          description="Realizar una notificacion a todas las dependencias."
          :redirect-to="{ name: 'Notify' }"
        />
      </div>
      <div class="col-span-1">
        <card-base
          label="Ver notificaciones enviadas"
          description="Estadisticas de notificaciones realizadas."
          :redirect-to="{ name: 'Notifications' }"
        />
      </div>
      <div class="col-span-1">
        <card-base
          label="Ver notificaciones recibidas"
          description="Bandeja de entrada para notificaciones recibidas."
          :redirect-to="{ name: 'Inbox' }"
        />
      </div>
      <div class="col-span-1" v-if="isAdmin">
        <card-base
          label="Alta de usuarios"
          description="Formulario para dar de alta nuevo usuarios."
          :redirect-to="{ name: 'Users' }"
        />
      </div>
    </div>
  </main>
</template>

<script>
import HeaderBase from './../components/HeaderBase.vue'
import CardBase from './../components/CardBase.vue'
import { isRoleAdmin } from '../helpers/localStorage'

export default {
  components: { HeaderBase, CardBase },
  setup() {

    return {
      isAdmin: isRoleAdmin()
    }
  },
}
</script>
