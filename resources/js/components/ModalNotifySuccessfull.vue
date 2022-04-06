<template>
  <modal-base :show="true" @closed="redirect">
    <div class="py-12 pb-8">
      <h5 class="text-xl mb-9 mt-12 text-center">
        <strong>
          Se a notificado con exito.
        </strong>
      </h5>
      <h5 class="text-lg mb-14">
        Recuerda que puedes revisar el estatus de esta notificacion mas adelante.
      </h5>
      <button-base
        class="max-w-xs mx-auto"
        :loading="false"
        label="De acuerdo"
        @click="redirect"
      />
    </div>
  </modal-base>
</template>

<script>
import ModalBase from './ModalBase.vue'
import ButtonBase from './ButtonBase.vue'
import { useRouter } from 'vue-router'

export default {
  components: {
    ModalBase,
    ButtonBase,
  },
  setup() {
    const router = useRouter()
    const redirect = () => router.push({ name: 'Home' })

    return { redirect }
  },
}
</script>