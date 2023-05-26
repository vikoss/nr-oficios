<template>
  <header-base />
  <main style="width: 80%; margin: auto;" class="body">
    <h1 class="text-3xl text-blue font-medium mb-2 text-wine text-center" >
      Formulario
    </h1>
    <div class="contenedor-inputs">
    <input-base
      id="name"
      v-model="form.name"
      label="Nombre"
    />
    <input-base
      id="firstSurname"
      v-model="form.first_surname"
      label="Apellido Paterno"
    />
    <input-base
      id="secondSurname"
      v-model="form.second_surname"
      label="Apellido Materno"
    />
    <input-base
      id="nick_name"
      v-model="form.nick_name"
      label="Nombre usuario"
    />
    <input-base
      id="employeeNumber"
      v-model="form.employee_number"
      label="Numero de Empleado"
    />
    <select-base
        :options="positions"
        selecTitle="Puesto de Trabajo"
        placeholder="Selecciona un puesto"
        v-model="form.position_id"
    />
    <!-- <select-base
       :options="departaments"
        selecTitle="Departamento"
        placeholder="Selecciona un departamento"
        v-model="form.departament_id"
    />
    <select-base
        :options="directions"
        selecTitle="Dirección"
        placeholder="Selecciona una dirección"
        v-model="form.direction_id"
    /> -->
    <select-base
        :options="roles"
        selecTitle="Rol"
        placeholder="Selecciona un Rol"
        v-model="form.role_id"
    />
    <input-base
      id="email"
      v-model="form.email"
      label="Correo:"
    />
    <input-base
      id="password"
      v-model="form.password"
      type="password"
      label="Contraseña:"
    />
    <br>
    <br>
    <br>
    </div>
    <button-base
        @click="saveUser"
        label="Entrar"
        :loading="loading"
        :disabled="loading"
        style=" margin: auto; margin-top: -25px; width: 50%;"
    />
    <modal-base :show="modalSuccess" @closed="closeModal">
      <div class="py-12 pb-8">
        <h5 class="text-xl mb-9 mt-12 text-center">
          <strong>
            Se creo el usuario con exito.
          </strong>
        </h5>
        <h5 class="text-lg mb-14">
          email:
          <br>
          <strong>
            {{ form.email }}
          </strong>
        </h5>
        <button-base
          class="max-w-xs mx-auto"
          :loading="false"
          label="Aceptar"
          @click="closeModal"
        />
      </div>
    </modal-base>
  </main>
</template>

<script>
import HeaderBase from '../../components/HeaderBase.vue';
import InputBase from '../../components/InputBase.vue';
import ButtonBase from '../../components/ButtonBase.vue';
import SelectBase from '../../components/SelectBase.vue'
import {
  fetchDepartaments,
  fetchDirections,
  fetchRoles,
  fetchPositions
} from './../../api/catalogs'
import { storeUser } from './../../api/users'
import ModalBase from '../../components/ModalBase.vue';

export default {
    components: {
        InputBase,
        HeaderBase,
        ButtonBase,
        SelectBase,
        ModalBase,
    },
    data: function () {
      return {
        form: {
          // employee
          name: '',
          first_surname: '',
          second_surname: '',
          employee_number: '',
          position_id: '',
          // user
          nick_name: '',
          email: '',
          password: '',
          role_id: '',
        },
        directions: [],
        positions: [],
        departaments: [],
        roles: [],
        loading: false,
        modalSuccess: false,
      }
    },
    methods: {
      async getCatalogs() {
        const directions = await fetchDirections()
        const positions = await fetchPositions()
        const roles = await fetchRoles()
        const departaments = await fetchDepartaments()
        this.directions = directions.map(item => ({ value: item.id, label: item.name }))
        this.positions = positions.map(item => ({ value: item.id, label: item.name }))
        this.roles = roles.map(item => ({ value: item.id, label: item.name }))
        this.departaments = departaments.map(item => ({ value: item.id, label: item.name }))
      },
      async saveUser() {
        this.loading = true
        await storeUser(this.form)
        this.loading = false
        this.modalSuccess = true
      },
      closeModal() {
        this.closeModal = false
        this.$router.push({ name: 'Home' })
      },
    },
    created() {
      this.getCatalogs()
    }
}
</script>

<style>
@media (min-width: 810px) {
    .contenedor-inputs {
      height: 460px; 
      columns: 2; 
      margin-bottom: 20px; 
      column-gap: 40px;
    }
    .body {
      width: 70% !important;
    }
}

</style>



