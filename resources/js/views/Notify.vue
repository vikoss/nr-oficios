<template>
  <div>
    <input type="file" name="file" id="file" @change="handleFile">
    <br>
    <br>
    <input type="button" value="Firmar" @click="sign">

    <embed
      v-show="documentSignedEncoded"
      :src="`data:application/pdf;base64,${documentSignedEncoded}`"
      type="application/pdf"
      frameBorder="0"
      scrolling="auto"
      height="500"
      width="100%"
      alt="Documento firmado"
    />
    <br>
    <br>
    <p>Correo a notificar</p>
    <input type="text" name="email" v-model="email">
    <br>
    <br>
    <br>
    <input type="button" value="Notificar" @click="store">
  </div>
</template>

<script>
import { ref } from 'vue'
import { storeNotification, notify } from '../api/notifications'
import { signDocument } from './../api/documents'
import { storeEmails } from './../api/emails'

export default {
  setup() {
    const notification = ref({})
    const emails = ref([])
    const email = ref('')
    const document = ref({})
    const documentSignedEncoded = ref(null)
    const sign = async () => {
      console.log(document.value);
      documentSignedEncoded.value = await signDocument(document.value)
    }
    const store = async () => {
      const notification = await storeNotification(documentSignedEncoded.value)
      console.log(email.value.split());
      const mapEmails = email.value.split().map(email => ({ to: email }))
      console.log(mapEmails);
      const emails = await storeEmails({ notificationId: notification.id, emails: mapEmails })
      const notified = await notify(notification.id)
      alert('Notificacion enviada.')
      console.log(notified)
    }
    const handleFile = (e) => {
      document.value = e.target.files[0]
    }

    return {
      sign,
      handleFile,
      documentSignedEncoded,
      store,
      email,
    }
  }

}
</script>

<style>

</style>