<template>
    <div>
        <div>
            <div class="row mb-4">
                <div class="d-flex justify-content-between">
                    <div class="">
                        <h3>Liste des réservations</h3>
                    </div>
                    <div class="">
                        <a href="#" type="button" class="btn btn-primary">Ajouter une réservation</a>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div id="datatable3_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row mb-5">
                            <div class="col-sm-2 col-md-3">
                                <div class="col-sm-3 col-md-3 dataTables_length" id="datatable3_length">
                                    <label>Affichage de
                                        <select name="datatable3_length" aria-controls="datatable3" v-model="per_page"
                                            @change="search"
                                            class="custom-select custom-select-sm form-control form-control-sm">
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                        élements
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-2 col-md-3">
                                <div id="datatable3_filter" class="dataTables_filter">
                                    <select id="inputState" v-model="filtre_type" @change="search"
                                        class="custom-select custom-select-sm form-control form-control-sm">
                                        <option selected value="">Filtre par type</option>
                                        <option value="1">Hôtels</option>
                                        <option value="2">Résidences</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 col-md-3">
                                <div id="datatable3_filter" class="dataTables_filter">
                                    <select id="inputState" v-model="filtre_status" @change="search"
                                        class="custom-select custom-select-sm form-control form-control-sm">
                                        <option selected value="">Filtre par status</option>
                                        <option value=1>Payer</option>
                                        <option value=2>Inpayer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 col-md-3">
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
                                            <th>Prénom</th>
                                            <!-- <th>Email</th> -->
                                            <th>Téléphone</th>
                                            <th>Date de début</th>
                                            <th>Date de fin</th>
                                            <th>Nb jours</th>
                                            <th>Status</th>
                                            <th>Type</th>
                                            <th>Propriétaires</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(booking, index) in props.booking_liste.data" :key="index">
                                            <td>
                                                <div class="my-2">
                                                    {{ index + 1 }}
                                                </div>
                                            </td>
                                            <td>
                                                <!-- <img src="
                                                    ../../../../../public/assets/images/avatars/avatar.png" alt="avatar"
                                                    class="avatar avatar-xs"> -->
                                                <div class="m-2">
                                                    {{ booking.r_booking_user.first_name }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="m-2">
                                                    {{ booking.r_booking_user.last_name }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="m-2">
                                                    {{ booking.r_booking_user.phone_number }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="m-2">
                                                    {{ dateTransformer(booking.start_date) }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="m-2">
                                                    {{ dateTransformer(booking.end_date) }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="m-2">
                                                    {{ booking.nombre_jours }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="m-2">
                                                    <span class="badge badge-success badge-style-light"
                                                        v-if="booking.booking_status == 1">Payer </span>
                                                    <span class="badge badge-warning badge-style-light"
                                                        v-if="booking.booking_status == 2">Inpayer </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="m-2">
                                                    {{ booking.end_date }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="m-2">
                                                    {{ getNameById(booking.r_booking_user.companie_id, props.companie_data)
                                                    }}
                                                </div>
                                            </td>
                                            <!-- <td>
                                                <div class="m-2">
                                                    <span class="badge badge-success badge-style-light"
                                                        v-if="booking.company_status == '1'">Actif</span>
                                                    <span class="badge badge-warning badge-style-light"
                                                        v-if="booking.company_status == '2'">Inactif</span>
                                                </div>
                                                </td> -->
                                            <!-- <td>
                                                    <div class="m-2">
                                                        <span v-if="booking.booking_status == 0">Hôtel</span><span
                                                            v-if="booking.booking_status == 1">Résidence</span>
                                                    </div>
                                            </td> -->
                                            <td>
                                                <div class="widget-connection-request-actions d-flex ">
                                                    <a href="#" class="btn  btn-style-ligh mx-2" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal" @click="setViewPlusData(booking)"
                                                        style="padding: 6px 10px !important;border-radius: 10px;">
                                                        <img src="../../../../../public/assets/images/icons/eye.png"
                                                            style="width: 22px;" alt="view">
                                                    </a>
                                                    <a href="#" class="btn  btn-style-ligh "
                                                        style="padding: 6px 9px 9px 12px !important;border-radius: 10px;">
                                                        <img src="../../../../../public/assets/images/icons/editing.png"
                                                            style="width: 19px;" alt="edit">
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
                            <Pagination :links="props.booking_liste.links" :next="props.booking_liste.next_page_url"
                                :prev="props.booking_liste.prev_page_url" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <!-- Modal -->
            <Modal :data="view_plus" />
            <!-- end Modal -->
        </div>
    </div>
</template>

<script>
import MainLayout from '../../../Layouts/MainLayout.vue'
// import { useSwalSuccess, useSwalError } from '../../Composables/alert'
import { truncate, dateTransformer } from "../../../Composables/functions";
import Pagination from '../../../Shared/Pagination.vue';
import Modal from './Modal.vue'

import { ref, reactive } from 'vue'
export default {
    layout: MainLayout,
    components: { Pagination },
}

</script>

<script setup>
import { Inertia } from '@inertiajs/inertia';
import { usePage } from '@inertiajs/inertia-vue3';
import { computed } from 'vue';


// console.log(usePage().props.value)
const props = defineProps({
    //Récupération des utilisateurs
    booking_liste: Object,
    companie_data: Array,
    // je recupère la variables filtres depuis le controller
    // (il contient la data passer en paramètre ds l'URL) pour perssister mes champ de recherche
    filtres: Object,
})
const per_page = ref(props.filtres.per_page ?? 10);
const filtre_status = ref(props.filtres.filtre_status ?? '');
const search_data = ref(props.filtres.search_data ?? '');
const filtre_type = ref(props.filtres.filtre_type ?? '');
const view_plus = reactive({});
// const dataArray = ref([]);
// creation de la fonction search
// _.throttle permet de retarder d'une durée déterminer l'envoie de
// la requêle vers le controller 
const search = _.throttle(function () {
    // j'envoie la data a mon controller via inertia a travers mon url(hotel.bureau l'url courante)
    // je passe en parametre la data
    Inertia.get(route("reservation.bureau",
        // 1er paramètre ma data
        { per_page: per_page.value, filtre_type: filtre_type.value, filtre_status: filtre_status.value, search_data: search_data.value }),
        // 2ème paramètre vide
        {},
        // 3ème paramètre la reponse de mon controller
        {
            replace: true,//permet de remplacer l'url courent en ajoutant les parameters retouner par le controller
            preserveState: true,//permet de préserver l'état des variables reactives(ref()) et de ne pas rechager la page vue que la requête est un get
        }
    )
}, 500)

//Récupération du nom de l'entreprise par l'ID
function getNameById(id, data) {
    const entry = data.find(item => item.id === id);
    if (entry && entry.name) {
        return entry.name;
    } else {
        return "NAN";
    }
}
//Fonction de récupération de la data du modal
function setViewPlusData(data) {
    view_plus.value = data
}
console.log(Inertia.page.props);
</script>