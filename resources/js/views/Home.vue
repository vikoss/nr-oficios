<template>
  <div>
    <h1>Welcome</h1>
    <router-link :to="{ name: 'Notify' }">Notificar</router-link>
    <br>
    <br>
    <br>
    <router-link :to="{ name: 'Notifications' }">Ver notificaciones</router-link>

  </div>
</template>

<script>
export default {

}
</script>

<style>

</style>