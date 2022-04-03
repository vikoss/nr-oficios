<template>
  <header-base />
  <main class="px-6 sm:px-16 py-12">
    <!-- <div>
      <h1>Welcome</h1>
      <router-link :to="{ name: 'Notify' }">Notificar</router-link>
      <br>
      <br>
      <br>
      <router-link :to="{ name: 'Notifications' }">Ver notificaciones</router-link>

    </div> -->
    <div class="grid gap-3 grid-cols-1 sm:grid-cols-3">
      <div class="col-span-1">
        <card-base
          label="Notificar"
          description="Realizar una notificacion a todas las dependencias."
          :redirect-to="{ name: 'Notify' }"
        />
      </div>
      <div class="col-span-1">
        <card-base
          label="Ver notificaciones"
          description="Estadisticas de notificaciones realizadas."
          :redirect-to="{ name: 'Notifications' }"
        />
      </div>
    </div>
  </main>
</template>

<script>
import HeaderBase from './../components/HeaderBase.vue'
import CardBase from './../components/CardBase.vue'

export default {
  components: { HeaderBase, CardBase }

}
</script>

<style>

</style>