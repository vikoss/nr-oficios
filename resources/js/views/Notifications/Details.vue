<template>
  <header-base />
  <main class="px-6 sm:px-16 py-12">
    <redirect-to-back />
    <div class="grid grid-cols-5 mt-5">
      <div class="col-span-5 sm:col-span-2">
        <h1>
          Notificacion
          <a :href="notification.item.document" class="uppercase hover:underline font-bold text-wine" target="_blank" rel="noopener noreferrer">
            {{ notification.item.name }}
          </a>
        </h1>
        <h2 class="mb-3">Consulta los correos de quienes fueron notificados.</h2>
        <div class="flex justify-center items-center h-full">
          <button-base
            class="sm:max-w-sm"
            label="Descargar informe"
            :loading="false"
            @click="() => ({})"
            :disabled="false"
          />
        </div>
      </div>
      <div class="col-span-5 sm:col-span-3">
        <embed
          v-show="notification.item.document"
          :src="notification.item.document"
          type="application/pdf"
          frameBorder="0"
          scrolling="auto"
          height="350"
          width="100%"
          :alt="notification.item.name"
        />
      </div>
    </div>
    <table-base
      v-if="notification.emails"
      :headers="[
        { name: 'created_at', label: 'Fecha de registro' },
        { name: 'sent_at', label: 'Fecha de envio' },
        { name: 'to', label: 'Para' },
        { name: 'verified_at', label: 'Validado de recibido' }
      ]"
      :data="notification.emails"
    />
    <h2 v-else>Niguna notification aun.</h2>
  </main>
</template>

<script>
import { reactive } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import { getNotification, getEmailsNotification } from './../../api/notifications'
import TableBase from '../../components/TableBase.vue'
import HeaderBase from '../../components/HeaderBase.vue'
import RedirectToBack from '../../components/RedirectToBack.vue'
import ButtonBase from './../../components/ButtonBase.vue'

export default {
  components: { TableBase, HeaderBase, RedirectToBack, ButtonBase },
  setup() {
    const router = useRouter()
    const route = useRoute()
    const notification = reactive({
      item: {},
      emails: [],
    })
    const fetchNotification = async() => {
      const data = await getNotification(route.params.notification)
      const { data: emails } = await getEmailsNotification(route.params.notification)
      console.log('emails', emails)
      notification.item = data
      notification.emails = emails
      console.log(data)
    }
    fetchNotification()
    const showNotification = (notificationId) => router.push({ name: 'NotificationDetails', params: { notification: notificationId }})

    return { notification, showNotification }
  },

}
</script>

<style>

</style>