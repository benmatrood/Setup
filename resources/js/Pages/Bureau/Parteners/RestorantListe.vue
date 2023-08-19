
<template>
    <div class="row mb-4">
        <div class="d-flex justify-content-between ">
            <div class="">
                <h3>Liste des Restaurants</h3>
            </div>
            <div class="">
                <a href="#" type="button" class="btn btn-primary">Ajouter un restaurant</a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div id="datatable3_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row mb-5">
                    <div class="col-sm-4 col-md-8 col-xs-12">
                        <div class="col-sm-3 col-md-3 dataTables_length" id="datatable3_length">
                            <label>Affichage de
                                <select name="datatable3_length" aria-controls="datatable3" v-model="per_page"
                                    @change="search" class="custom-select custom-select-sm form-control form-control-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                élements
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-2 col-xs-12">
                        <div id="datatable_filter" class="dataTables_filter">
                            <select id="inputState" v-model="filtre_status" @change="search"
                                class="custom-select custom-select-sm form-control form-control-sm">
                                <option selected value="">Filtre par status</option>
                                <option value="Actif">Actif</option>
                                <option value="Inactif">Inactif</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-2 col-xs-12">
                        <div id="datatable3_filter" class="dataTables_filter">
                            <label>Recherche:
                                <input type="search" class="form-control form-control-sm" placeholder=""
                                    v-model="search_data" aria-controls="datatable3" @keyup="search">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Adresse mail</th>
                                    <th>Téléphone</th>
                                    <th>Adresse</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for=" (restorant, index) in props.restorants_liste.data" :key="index">
                                    <td>
                                        <div class="m-2">
                                            {{ index + 1 }}
                                        </div>
                                    </td>
                                    <td>
                                        <img src="../../../../../public/assets/images/avatars/avatar.png" alt="avatar"
                                            class="avatar avatar-xs">
                                        {{ restorant.name }}
                                    </td>
                                    <td>
                                        <div class="m-2">
                                            {{ restorant.email }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="m-2">
                                            {{ restorant.phone }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="m-2">
                                            {{ truncate(restorant.address, 27) }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="m-2">
                                            <span class="badge badge-success badge-style-light"
                                                v-if="restorant.restorant_status == 'Actif'">Actif</span>
                                            <span class="badge badge-warning badge-style-light"
                                                v-if="restorant.restorant_status == 'Inactif'">Inactif</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-connection-request-actions d-flex ">
                                            <a href="#" class="btn btn-success btn-style-light mx-2 "
                                                style="background-color: #e6fcf0;padding-right :10px;padding-left: 22px;">
                                                <i class="material-icons">visibility</i>
                                            </a>
                                            <a href="#" class="btn btn-primary btn-style-light mx-2"
                                                style="background-color: #dff0fe;padding-right :10px;padding-left: 22px;">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-style-light mx-2"
                                                style="background-color: #fce3e5;padding-right :10px;padding-left: 22px;">
                                                <i class="material-icons">delete</i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                    </div>
                    <!-- pagination -->
                    <Pagination :links="props.restorants_liste.links" :next="props.restorants_liste.next_page_url"
                        :prev="props.restorants_liste.prev_page_url" />
                </div>
            </div>
        </div>
    </div>
</template>
<style></style>

<script>
import MainLayout from '../../../Layouts/MainLayout.vue'
import { Inertia } from "@inertiajs/inertia";
import Pagination from '../../../Shared/Pagination.vue'
// import { useSwalSuccess, useSwalError } from '../../../Composables/alert'
import { truncate } from "../../../Composables/functions"
// 
import { ref, computed } from 'vue'
export default {
    layout: MainLayout,
    components: { Pagination },

}
</script>

<script setup>

const props = defineProps({
    //Récupération des utilisateurs
    restorants_liste: Object,
    // je recupère la variables filtres depuis le controller
    // (il contient la data passer en paramètre ds l'URL) pour perssister mes champ de recherche
    filtres: Object,
})
// creation des variables de mapages
// je passe en paramètre les variables correspondants récupérées depuis les champs de filtre
// (provemant de mon controller pour faire la persistance des champs de filtre si elles exite(condition ternaire))
const per_page = ref(props.filtres.per_page ?? 10);
const filtre_status = ref(props.filtres.filtre ?? "");
const search_data = ref(props.filtres.search ?? "");



// creation de la fonction search
// _.throttle permet de retarder d'une durée déterminer l'envoie de
// la requêle vers le controller 
const search = _.throttle(function () {
    // j'envoie la data a mon controller via inertia a travers mon url(etudiant.index l'url courante)
    // je passe en parametre la data
    Inertia.get(route("resto.bureau",
        // 1er paramètre ma data
        { per_page: per_page.value, filtre_status: filtre_status.value, search_data: search_data.value }),
        // 2ème paramètre vide
        {},
        // 3ème paramètre la reponse de mon controller
        {
            replace: true,//permet de remplacer l'url courent en ajoutant les parameters retouner par le controller
            preserveState: true,//permet de préserver l'état des variables reactives(ref()) et de ne pas rechager la page vue que la requête est un get
        }
    )
}, 500)


// function trucate(value, maxLength) {
//     if (value.length <= maxLength) {
//         return value;
//     } else {
//         return value.substring(0, maxLength) + '...';
//     }
// };

</script>

