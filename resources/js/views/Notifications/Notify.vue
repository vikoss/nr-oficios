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
        <check-box-base
          id="notify-all"
          label="Notificar a todos"
          v-model="checkbox"
        />
        <p>Y adicionalmente a:</p>
        <p>Recuerda agregar los correos separados por comas</p>
        <label for="" class="text-wine text-base font-medium block">
          Correos a notificar:
        </label>
        <textarea
          class="py-3 px-3.5 rounded-md border border-wine border-solid outline-none text-gray text-base font-medium focus:border-2 focus:shadow w-full"
          name="emails"
          id="emails"
          cols="30"
          rows="5"
          placeholder="juan@nicolasromero.gob.mx,pedro@nicolasromero.gob.mx"
          v-model="emailsFromTextareaText"
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
    <modal-notify-successfull v-show="app.showModal" />
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
import ModalNotifySuccessfull from '../../components/ModalNotifySuccessfull.vue'
import { getAllUserEmails } from './../../api/users'
import CheckBoxBase from '../../components/CheckBoxBase.vue'

export default {
  name: 'NofityView',
  components: { ButtonBase, InputBase, HeaderBase, RedirectToBack, InputFile, ModalNotifySuccessfull, CheckBoxBase },
  setup() {
    const router = useRouter()
    const notification = ref({})
    const allEmails = ref({})
    const checkbox = ref(false)
    const emailsFromTextareaText = ref('')
    const emailsFromTextareaArray = computed(() => emailsFromTextareaText.value.split(',').map(email => ({ to: email })))
    const app = reactive({
      loading: false,
      disabled: true,
      showModal: false,
    })
    const emails = ref([])
    const email = ref('')
    const name = ref('')
    const document = reactive({})
    const documentSignedEncoded = ref(null)
    const fetchAllUserEmails = async () => {
      allEmails.value = await getAllUserEmails()
    }
    fetchAllUserEmails()
    const sign = async () => {
      console.log(document.value);
      app.loading = true
      documentSignedEncoded.value = await signDocument(document.value)
      app.loading = false
    }
    const store = async () => {
      app.loading = true
      const notification = await storeNotification({ name: name.value, document: documentSignedEncoded.value })
      console.log(email.value.split());
      const mapEmails = email.value.split().map(email => ({ to: email }))
      console.log(mapEmails);
      const emailPayload = checkbox.value
      ? allEmails.value.data.map(email => ({ to: email.email })).concat(emailsFromTextareaArray.value)
      : emailsFromTextareaArray.value
      const emails = await storeEmails({ notificationId: notification.id, emails: emailPayload })
      const notified = await notify(notification.id)
      app.loading = false
      app.showModal = true
      /* alert('Notificacion enviada.')
      //router.push({ name: 'Home' })
      console.log(notified) */
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
      checkbox,
      emailsFromTextareaArray,
      emailsFromTextareaText,
    }
  }

}
</script>

<style>

</style>