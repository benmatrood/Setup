<template>
    <div class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background" style="background: url(assets/images/backgrounds/sign-in.svg) no-repeat;
        background-size: 60%;
        background-position: center;width: 50rem; height: 80rem;">
        </div>
        <div class="app-auth-container">
            <div class="logo">
                <Link :href="route('home')">Awanne</Link>
            </div>
            <p class="auth-description">Veuillez vous connecter à votre compte en utilisant votre adress mail et votre mot
                de passe.
                Vous n'avez pas de compte ?
                <Link :href="route('register')">S'inscrire</Link>
            </p>
            <form @submit.prevent="soumettre" id="formulaire">
                <div class="auth-credentials m-b-xxl">
                    <label for="signInEmail" class="form-label">Addres mail</label>
                    <input type="email" class="form-control" id="signInEmail" aria-describedby="signInEmail"
                        placeholder="example@awanne.com" v-model="form.email" :class="{ 'is-invalid': form.errors.email }">
                    <span v-if="form.errors.email" class="invalid-feedback error">{{
                        form.errors.email
                    }}</span>
                    <label for="signInPassword" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="signInPassword" aria-describedby="signInPassword"
                        placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" v-model="form.password"
                        :class="{ 'is-invalid': form.errors.password }">
                    <span v-if="form.errors.password" class="invalid-feedback error">{{
                        form.errors.password
                    }}</span>
                </div>
            </form>
            <div class="auth-submit">
                <a href="#" class="btn btn-primary" id="formulaire" @click="soumettre()">Se connecter</a>
                <a href="#" class="auth-forgot-password float-end">Mot de passe oublier</a>
            </div>

            <div class="divider"></div>
        </div>
    </div>
</template>
<script setup>
import { Link, useForm } from '@inertiajs/inertia-vue3';
import { useSwalError, useSwalSuccess } from '../../Composables/alert';
const form = useForm({
    email: "",
    password: ""
})
//function de soumition
const soumettre = () => {
    form.post(route("login.user"), {
        onSuccess: () => {
            console.log("Connexion réussi")
            // useSwalSuccess("Connexion réussi")
        },
        onError: () => {
            useSwalError("Identifiant incorecte")
            // console.log("Identifiant incorecte")
        }
    })
}


</script>