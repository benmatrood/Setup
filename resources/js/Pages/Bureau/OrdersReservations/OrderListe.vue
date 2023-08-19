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
                                            <option value="25">25</option>
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
                                        <option value="1">Actif</option>
                                        <option value="2">Inactif</option>
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
                                        <tr v-for="(booking, index) in props.booking_liste" :key="index">
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
                                                    {{ 10 }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="m-2">
                                                    {{ "Payer" }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="m-2">
                                                    {{ booking.end_date }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="m-2">
                                                    {{ booking.booking_status }}
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
                                                        data-bs-target="#exampleModal"
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
                            <!-- <Pagination :links="props.booking_liste.links" :next="props.booking_liste.next_page_url"
                                :prev="props.booking_liste.prev_page_url" /> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="d-flex ">
                                <img src="../../../../../public/assets/images/neptune.png" alt="logo_entreprise"
                                    style="width: 30px;">
                                <h4 class="card-title mx-2 ">awanne</h4>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="card">
                                        <div class="d-flex justify-content-between">
                                            <h4 class="card-title" style="margin-left: 30px;margin-top: 20px;">Hôtel Tihama
                                            </h4>
                                            <div class="mt-3 me-4">
                                                <img src="../../../../../public/assets/images/neptune.png"
                                                    alt="logo_entreprise" style="width: 30px;">
                                            </div>

                                        </div>
                                        <!-- <div class="card-body"> -->
                                        <h6 class="" style="margin-left: 30px;margin-top: 20px;">2 nuits dans la suite N° 14
                                        </h6>
                                        <!-- </div> -->
                                        <ul class="list-group list-group-flush">
                                            <hr style="height: 1px; color: #a6b2bf;margin-bottom: -4px; z-index: 1;">
                                            <li class="list-group-item ">
                                                <div class="d-flex justify-content-between">
                                                    <div>01-06-2023 &rarr; 02-06-2023
                                                        <p class="mt-2">Chambre privé 1 lit</p>
                                                    </div>
                                                    <img src="../../../../../public/assets/images/cards/card.png"
                                                        alt="logo_entreprise"
                                                        style="width: 80px;height: 60px;border-radius: 10px;margin-bottom: 10px;">
                                                </div>
                                                <p>Le Lorem Ipsum est simplement du faux texte employé dans la
                                                    composition et la mise en page avant impression. Le Lorem Ipsum
                                                    est le faux texte standard de l'imprimerie depuis les années
                                                    1500, quand un imprimeur anonyme assembla</p>
                                            </li>
                                            <li class="list-group-item">
                                                <h5 class="card-title mt-3 mb-3">Conditions d'annulation</h5>
                                                <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition
                                                    et la mise en page avant impression. Le Lorem Ipsum est le faux texte
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="card widget widget-info-inline">
                                        <div class="card-header">
                                            <h5 class="card-title">Détails de la facturation</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="widget-info-container d-flex justify-content-between">
                                                <p class="widget-info-text">10000 f * 2 nuits</p>
                                                <p class="widget-info-text">20000 f</p>
                                            </div>
                                            <div class="widget-info-container d-flex justify-content-between">
                                                <p class="widget-info-text">Frais de ménage</p>
                                                <p class="widget-info-text">5000 f</p>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="widget-info-text">TVA</p>
                                                <p class="widget-info-text">5000 f</p>
                                            </div>
                                            <hr style="margin-top: -2px;">
                                            <div class="d-flex justify-content-between">
                                                <p class="widget-info-text">Total</p>
                                                <p class="widget-info-text">30000 f</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card widget widget-info-inline">
                                        <div class="card-header">
                                            <h5 class="card-title">Paiement<span
                                                    class="badge badge-success badge-style-light">Payer</span></h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <p class="widget-info-text">Carte Visa <br>
                                                    <span style="font-weight: 100;font-size: small;">24-10-2023 à
                                                        10h:30</span>
                                                </p>
                                                <p class="widget-info-text">30000 f</p>
                                            </div>
                                            <hr style="margin-top: -1px;">
                                            <div class="d-flex justify-content-between">
                                                <p class="widget-info-text">Montant payer</p>
                                                <p class="widget-info-text">30000 f</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import MainLayout from '../../../Layouts/MainLayout.vue'
// import { useSwalSuccess, useSwalError } from '../../Composables/alert'
import { truncate, dateTransformer } from "../../../Composables/functions"

import { ref, onMounted } from 'vue'
export default {
    layout: MainLayout,
}

</script>

<script setup>
import { usePage } from '@inertiajs/inertia-vue3'
import { computed } from 'vue'

// console.log(usePage().props.value)
const props = defineProps({
    //Récupération des utilisateurs
    booking_liste: Object,
    // je recupère la variables filtres depuis le controller
    // (il contient la data passer en paramètre ds l'URL) pour perssister mes champ de recherche
    filtres: Object,
})
const per_page = ref();
const filtre_status = ref();
const search_data = ref();
const filtre_type = ref();
// creation de la fonction search
// _.throttle permet de retarder d'une durée déterminer l'envoie de
// la requêle vers le controller 
const search = _.throttle(function () {
    // j'envoie la data a mon controller via inertia a travers mon url(etudiant.index l'url courante)
    // je passe en parametre la data
    Inertia.get(route("hotel.bureau",
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



console.log(props.booking_liste)
</script>