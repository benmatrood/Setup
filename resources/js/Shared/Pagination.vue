<template>
    <div class="col-sm-12 col-md-7">
        <div class="dataTables_paginate paging_simple_numbers" id="datatable3_paginate">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item" :class="{ 'disabled': props.prev == null }">
                        <Link class="page-link" :href="props.prev">«</Link>
                    </li>
                    <li class="page-item" :class="{ 'active': link.active }" v-for="link in computed_links">
                        <Link class="page-link" :href="link.url">{{ link.label }}</Link>
                    </li>
                    <li class="page-item" :class="{ 'disabled': props.next == null }">
                        <Link class="page-link" :href="props.next">»</Link>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</template>
<script setup>
import { computed } from 'vue'
//Definition des propriétés de pagination
const props = defineProps({
    links: {
        type: Array,
        required: true
    },
    prev: {
        type: String,
        default: ""
    },
    next: {
        type: String,
        default: ""
    }
})

const computed_links = computed(() => {
    // shift() permet de suprimé le premier element de la collection ou du tableau
    props.links.shift();
    // pop() permet de suprimé le dernier element de la collection ou du tableau
    props.links.pop();
    // je retoune la collection nickel pour boucler dans ma vue
    return props.links
})
</script>
