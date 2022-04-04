<template>
  <div @click="goBack" class="flex items-center cursor-pointer">
    <arrow-left-svg />
    <p class="text-wine text-lg ml-2">Regresar</p>
  </div>
</template>

<script>
import { useRouter } from "vue-router"
import ArrowLeftSvg from "../svg/ArrowLeft.vue"

export default {
  name: 'RedirectToBack',
  components: { ArrowLeftSvg },
  setup() {
    const router = useRouter()
    const goBack = () => router.go(-1)

    return { goBack }
  },
}
</script>
