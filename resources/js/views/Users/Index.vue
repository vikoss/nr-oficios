<template>
  <main style="width: 80%; margin: auto;" class="body">
    <h1 class="text-3xl text-blue font-medium mb-2 text-wine text-center" >
      Formulario
    </h1>
    <div class="contenedor-inputs">
    <input-base
      id="text"
      label="Nombre"
    />
    <input-base
      id="text"
      type="text"
      label="Apellido Paterno"
    />
    <input-base
      id="text"
      type="text"
      label="Apellido Materno"
    />
    <input-base
      id="text"
      label="Alias"
    />
    <input-base
      id="text"
      label="Numero de Empleado"
    />
    <select-base
        texto1="Convenio"
        texto2="Convenio 2"
        texto3="Convenio 3"
        texto4="Convenio 4"
        selecTitulo="Puesto de Trabajo"
        placeholder="Selecciona un puesto"
    />
    <select-base
        texto1="Convenio"
        texto2="Convenio 2"
        texto3="Convenio 3"
        texto4="Convenio 4"
        selecTitulo="Departamento"
        placeholder="Selecciona un departamento"
    />
    <select-base
        texto1="Convenio"
        texto2="Convenio 2"
        texto3="Convenio 3"
        texto4="Convenio 4"
        selecTitulo="Dirección"
        placeholder="Selecciona una dirección"
    />
    <select-base
        texto1="Convenio"
        texto2="Convenio 2"
        texto3="Convenio 3"
        texto4="Convenio 4"
        selecTitulo="Rol"
        placeholder="Selecciona un Rol"
    />
    <input-base
      id="email"
      label="Correo:"
    />
    <input-base
      id="password"
      type="password"
      label="Contraseña:"
    />
    <br>
    <br>
    <br>
    </div>
    <button-base
        label="Entrar"
        style=" margin: auto; margin-top: -25px; width: 50%;"
    />
  </main>
</template>

<script>
import HeaderBase from '../../components/HeaderBase.vue';
import InputBase from '../../components/InputBase.vue';
import ButtonBase from '../../components/ButtonBase.vue';
import SelectBase from '../../components/SelectBase.vue'
export default {
    components: {
        InputBase,
        HeaderBase,
        ButtonBase,
        SelectBase,
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



