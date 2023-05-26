<template>
    <section class="text-wine text-base font-medium block relative">
        <h1>{{selecTitle}}</h1>
        <select @change="$emit('update:modelValue', $event.target.value)" name="" id="" class="bg-white h-11  rounded-md border border-wine border-solid outline-none text-gray text-base font-medium mt-1 w-full focus:border-2 focus:shadow p-2">
            <option value="" disabled selected>{{ placeholder }}</option>
            <option v-for="option in options" :key="option" :value="option.value">
                {{ option.label }}
            </option>
        </select>
    </section>
</template>

<script>

export default {
    props: {
        modelValue: {
            type: String,
            default: '',
        },
        options: {
            type: Array,
            default: [],
        },
        selecTitle: {
            type: String,
            default: '',
        },
        placeholder: {
            type: String,
            default: '',
        }
    }
}
</script>
