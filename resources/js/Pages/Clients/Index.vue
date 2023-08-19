<template>
    <div>
        <h1>{{ message.toto }}</h1>
        <div class="row mb-2">
            <h1>Dashbord Client</h1>
        </div>

    </div>
</template>


<style></style>

<script >
import axios from 'axios';
import MainLayout from '../../Layouts/MainLayout.vue';


export default {
    layout: MainLayout,
    data() {
        return {
            message: '',
        };
    },
    mounted() {
        const my_language = localStorage.getItem('langue');
        if (my_language != "") {
            this.changeLanguage(my_language);
        } else {
            this.changeLanguage('fr'); // Change the default language here
        }

    },
    methods: {

        changeLanguage(lang) {
            axios.get(`/api/welcome-message?lang=${lang}`).then((response) => {
                localStorage.setItem('langue', lang);
                this.message = response.data.message;
            });
        },
    },
};
</script>