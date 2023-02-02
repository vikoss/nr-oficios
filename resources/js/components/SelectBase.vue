<template>
    <section class="text-wine text-base font-medium block relative">
        <h1>{{selecTitulo}}</h1>
        <select name="" id="" class="bg-white h-11  rounded-md border border-wine border-solid outline-none text-gray text-base font-medium mt-1 w-full focus:border-2 focus:shadow p-2">
            <option value="" disabled selected>{{ placeholder }}</option>
            <option value="">{{ texto1 }}</option>
            <option value="">{{ texto2 }}</option>
            <option value="">{{ texto3 }}</option>
            <option value="">{{ texto4 }}</option>
        </select>
    </section>
</template>

<script>

export default {
    props: {
        texto1: {
            type: String,
            default: '',
        },
        texto2: {
            type: String,
            default: '',
        },
        texto3: {
            type: String,
            default: '',
        },
        texto4: {
            type: String,
            default: '',
        },
        selecTitulo: {
            type: String,
            default: '',
        },
        placeholder: {
            type: String,
            default: '',
        }
    },

}
</script>

<style>
</style>