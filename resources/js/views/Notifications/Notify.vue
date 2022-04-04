<template>
  <header-base />
  <main class="px-6 sm:px-16 py-12">
    <div>
      <redirect-to-back />
      <br>
      <br>
      <br>
      <section v-show="signing">
        <input-file
          id="file-to-sign"
          @change="handleFile"
        />
        <br>
        <br>
        <embed
          v-show="fileTmp"
          :src="fileTmp"
          type="application/pdf"
          frameBorder="0"
          scrolling="auto"
          height="500"
          width="100%"
          alt="Documento para firmar"
        />
        <button-base
          class="sm:max-w-sm ml-auto mr-0 my-8"
          label="Firmar"
          :loading="app.loading"
          @click="sign"
          :disabled="false"
        />
        <embed
          v-show="documentSignedEncoded"
          :src="documentSignedEncoded"
          type="application/pdf"
          frameBorder="0"
          scrolling="auto"
          height="500"
          width="100%"
          alt="Documento firmado"
        />
        <br>
        <br>
        <button-base
          v-show="documentSignedEncoded"
          class="sm:max-w-sm ml-auto mr-0"
          label="Siguiente"
          :loading="false"
          @click="nextStep"
          :disabled="false"
        />
      </section>
      <section v-show="!signing">
        <input-base
          id="email-to-notify"
          v-model="email"
          label="Correo a notificar:"
        />
        <br>
        <br>
        <input-base
          id="name-notification"
          v-model="name"
          label="Nombre de la notificacion:"
        />
        <br>
        <br>
        <br>
        <button-base
          class="sm:max-w-sm ml-auto mr-0"
          label="Notificar"
          :loading="app.loading"
          @click="store"
          :disabled="false"
        />
      </section>
    </div>
  </main>
</template>

<script>
import { computed, reactive, ref } from 'vue'
import { storeNotification, notify } from './../../api/notifications'
import { signDocument } from './../../api/documents'
import { storeEmails } from './../../api/emails'
import { useRouter } from 'vue-router'
import HeaderBase from './../../components/HeaderBase.vue'
import ButtonBase from './../../components/ButtonBase.vue'
import InputBase from './../../components/InputBase.vue'
import InputFile from './../../components/InputFile.vue'
import RedirectToBack from '../../components/RedirectToBack.vue'

export default {
  name: 'NofityView',
  components: { ButtonBase, InputBase, HeaderBase, RedirectToBack, InputFile },
  setup() {
    const router = useRouter()
    const notification = ref({})
    const app = reactive({
      loading: false,
      disabled: true,
    })
    const emails = ref([])
    const email = ref('')
    const name = ref('')
    const document = reactive({})
    const documentSignedEncoded = ref(null)
    const sign = async () => {
      console.log(document.value);
      app.loading = true
      documentSignedEncoded.value = await signDocument(document.value)
      app.loading = false
    }
    const store = async () => {
      const notification = await storeNotification({ name: name.value, document: documentSignedEncoded.value })
      console.log(email.value.split());
      const mapEmails = email.value.split().map(email => ({ to: email }))
      console.log(mapEmails);
      const emails = await storeEmails({ notificationId: notification.id, emails: mapEmails })
      const notified = await notify(notification.id)
      alert('Notificacion enviada.')
      router.push({ name: 'Home' })
      console.log(notified)
    }
    const handleFile = (e) => {
      document.value = e.target.files[0]
    }

    const fileTmp = computed(() => {
      if (document.value) {
        return URL.createObjectURL(document.value)
      }
      return false
    })
    const signing = ref(true)
    const nextStep = () => {
      signing.value = false
    }

    return {
      sign,
      handleFile,
      documentSignedEncoded,
      store,
      email,
      name,
      fileTmp,
      nextStep,
      signing,
      app,
    }
  }

}
</script>

<style>

</style>