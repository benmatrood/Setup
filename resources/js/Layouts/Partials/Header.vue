<template>
    <!-- top search section  -->
    <div class="search">
        <form>
            <input class="form-control" type="text" placeholder="Type here..." aria-label="Search">
        </form>
        <a href="#" class="toggle-search"><i class="material-icons">close</i></a>
    </div>
    <!-- end top search section   -->

    <div class="app-header">
        <nav class="navbar navbar-light navbar-expand-lg">
            <div class="container-fluid">
                <div class="navbar-nav" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link hide-sidebar-toggle-button" href="#"><i
                                    class="material-icons">first_page</i></a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex">
                    <ul class="navbar-nav">
                        <!-- Change language dropdown -->
                        <li class="nav-item hidden-on-mobile">
                            <a class="nav-link language-dropdown-toggle" href="#" id="languageDropDown"
                                data-bs-toggle="dropdown"> <img
                                    :src="initialLanguage === 'fr' ? '../assets/images/icons/fr.png' : '../assets/images/icons/en.png'"
                                    alt="Logo">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end language-dropdown" aria-labelledby="languageDropDown"
                                style="cursor: pointer;">
                                <li><a class="dropdown-item" @click="setLocale('en')"><img
                                            src="../../../../public/assets/images/icons/en.png" alt="">Anglais</a></li>
                                <li><a class="dropdown-item" @click="setLocale('fr')"><img
                                            src="../../../../public/assets/images/icons/fr.png" alt="">Français</a></li>
                            </ul>
                        </li>
                        <!--Change end language dropdown -->
                        <!-- Settings -->
                        <li class="nav-item hidden-on-mobile">
                            <a class="nav-link language-dropdown-toggle" href="#" id="languageDropDown"
                                data-bs-toggle="dropdown"><img src="../../../../public/assets/images/icons/setting.png"
                                    alt="Logo"></a>
                            <ul class="dropdown-menu dropdown-menu-end language-dropdown"
                                aria-labelledby="languageDropDown">
                                <li><button class="dropdown-item" href="#"><img class="_img_icon_"
                                            src="../../../../public/assets/images/icons/en.png" alt="">Profile</button></li>
                                <li class="totoi">
                                    <Link class="dropdown-item" href="#" method="post" as="button" style=""><img
                                        class="_img_icon_" src="../../../../public/assets/images/icons/fr.png" alt="">Editer
                                    Mot de
                                    passe</Link>
                                </li>
                                <li><button class="dropdown-item" href="#"><img class="_img_icon_"
                                            src="../../../../public/assets/images/icons/en.png" alt="">{{
                                                $t("nav.language_full") }}</button></li>
                                <li class="totoi">
                                    <Link class="dropdown-item" href="/logout" method="post" as="button" style=""><img
                                        class="_img_icon_" src="../../../../public/assets/images/icons/fr.png"
                                        alt="">Déconnexion</Link>
                                </li>
                            </ul>
                        </li>
                        <!-- end Settings dropdown -->
                    </ul>
                </div>
            </div>
        </nav>
    </div>
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

/* .dropdown-menu:after {
    display: none !important;
}

.navbar .dropdown-menu {
    top: calc(100% + 10px) !important;
} */
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
            this.initialLanguage = lang;
        },
    },
}
</script>