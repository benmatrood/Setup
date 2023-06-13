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

                        <!-- language -->
                        <li class="nav-item hidden-on-mobile">
                            <a class="nav-link language-dropdown-toggle" href="#" id="languageDropDown"
                                data-bs-toggle="dropdown"> <img
                                    :src="language === 'fr' ? 'assets/images/icons/fr.png' : 'assets/images/icons/en.png'"
                                    alt="Logo">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end language-dropdown" aria-labelledby="languageDropDown"
                                style="cursor: pointer;">
                                <li><a class="dropdown-item" @click="changeLanguage('en')"><img
                                            :src="'assets/images/icons/en.png'" alt="">Anglais</a></li>
                                <li><a class="dropdown-item" @click="changeLanguage('fr')"><img
                                            src="assets/images/icons/fr.png" alt="">Français</a></li>
                            </ul>
                        </li>
                        <!-- end language dropdown -->
                        <!-- Settings -->
                        <li class="nav-item hidden-on-mobile">
                            <a class="nav-link language-dropdown-toggle" href="#" id="languageDropDown"
                                data-bs-toggle="dropdown"><img :src="'assets/images/icons/setting.png'" alt="Logo"></a>
                            <ul class="dropdown-menu dropdown-menu-end language-dropdown"
                                aria-labelledby="languageDropDown">
                                <li><a class="dropdown-item" href="#"><img :src="'assets/images/icons/en.png'" alt="">
                                        {{ message.toto }}</a></li>
                                <li><a class="dropdown-item" href="#"><img src="assets/images/icons/fr.png"
                                            alt="">Déconnexion</a>
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

<script>
import axios from 'axios';

export default {
    data() {
        return {
            message: '',
            language: '',
            shouldReloadPage: false, // Ajoutez une variable de drapeau

        };
    },
    mounted() {
        const myLanguage = localStorage.getItem('langue');
        if (myLanguage !== '') {
            this.changeLanguage(myLanguage);
        } else {
            this.changeLanguage('fr'); // Change the default language here
        }
    },
    watch: {
        language(newLanguage, oldLanguage) {
            if (newLanguage !== oldLanguage && this.shouldReloadPage) { // Vérifiez si le rechargement de la page est nécessaire
                window.location.reload();
            } else {
                this.shouldReloadPage = true; // Mettez à jour la variable de drapeau pour le prochain changement de langue
            }
        },
    },
    methods: {
        changeLanguage(lang) {
            this.language = lang;
            axios.get(`/api/welcome-message?lang=${lang}`).then((response) => {
                localStorage.setItem('langue', lang);
                this.message = response.data.message;
            });
        },
    },
};
</script>

