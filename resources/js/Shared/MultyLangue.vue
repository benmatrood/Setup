<template>
    <!-- Locale Selector -->
    <li class="nav-item hidden-on-mobile">
        <a class="nav-link language-dropdown-toggle" href="#" id="languageDropDown" data-bs-toggle="dropdown"> <img
                :src="initialLanguage === 'fr' ? '../assets/images/icons/fr.png' : '../assets/images/icons/en.png'"
                alt="Logo">
        </a>
        <ul class="dropdown-menu dropdown-menu-end language-dropdown" aria-labelledby="languageDropDown"
            style="cursor: pointer;">
            <li><a class="dropdown-item" @click="setLocale('en')"><img src="../../../../public/assets/images/icons/en.png"
                        alt="">Anglais</a></li>
            <li><a class="dropdown-item" @click="setLocale('fr')"><img src="../../../../public/assets/images/icons/fr.png"
                        alt="">Français</a></li>
        </ul>
    </li>
</template>
<style>
._img_icon_ {
    width: 30px;
    height: 30px;
    margin-right: 15px;
    padding: 2px;
}

.dropdown-item:hover {
    background-color: #fff !important;
}
</style>
<script>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
export default {
    data() {
        return {
            responsiveSettingsLanguage: false,
            initialLanguage: ref('fr'),
        }
    },
    mounted() {
        const storedLanguage = localStorage.getItem('selectedLanguage');
        const initialLanguage = storedLanguage || 'fr';
        this.setLocale(initialLanguage);
    },
    methods: {
        setLocale(lang) {
            Inertia.post("/api/locale", {
                'lang': lang,
            });
            this.$i18n.locale = lang;
            this.responsiveSettingsLanguage = false;
            localStorage.setItem('selectedLanguage', lang);
        },
    },
}
</script>

<script setup>
</script>