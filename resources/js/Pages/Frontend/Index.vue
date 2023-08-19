<template>
    <div class="text-center toto">
        <h1 class="text-center">Index de la page frontend</h1>

        <Link type="button" class="btn btn-danger btn-style-light m-3" :href="route('login')">Connexion</Link>
        <Link type="button" class="btn btn-success btn-style-light" :href="route('register')">Inscription</Link>
        <Link type="button" method="post" as="button" class="btn btn-success btn-style-light" href="/logout">Déconnexion
        </Link>

    </div>
</template>

<style>
.toto {
    background-color: white;
    height: 100vh;

}
</style>
<script >

</script>