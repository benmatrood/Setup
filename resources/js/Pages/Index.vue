<template>
    <div>
        <h1>Hello bienvenu</h1>
        <button @click="toto">click</button>
        <button @click="titi">click</button>

    </div>
</template>
<style></style>

<script>
import MainLayout from '../Layouts/MainLayout.vue'
import { useSwalSuccess, useSwalError } from "../Composables/alert";

import { ref, onMounted } from 'vue';
export default {
    layout: MainLayout,

}
</script>

<script setup>
import { usePage } from '@inertiajs/inertia-vue3';
import { computed } from 'vue';

console.log(usePage().props.value
)
const user = computed(() => {
    console.log(usePage)
})
const toto = () => {
    useSwalSuccess("Hello");
}

const titi = () => {
    useSwalError("Hello");
}
</script>