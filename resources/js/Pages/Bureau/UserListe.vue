<template>
    <div class="container-fluid">
        <div class="row">
            <div class="d-flex justify-content-between mt-4 mb-4">
                <div class="">
                    <h3>Liste des Utilisateurs</h3>
                </div>
                <div class="">
                    <a href="#" type="button" class="btn btn-primary">Ajouter Utilisateurs</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Basic</h5>
            </div>
            <div class="card-body">
                <div id="datatable1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="datatable1" class="display dataTable" style="width: 100%" role="grid"
                                aria-describedby="datatable1_info">
                                <thead>
                                    <tr role="row">
                                        <th>Id</th>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Adress mail</th>
                                        <th>Sexe</th>
                                        <th>Téléphone</th>
                                        <th>Nombre de Points</th>
                                        <th>Role de l'utilisateur</th>
                                        <th>Action</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <tr v-for="user in props.users_liste">
                                        <td>{{ user.id }}</td>
                                        <td>{{ user.first_name }}</td>
                                        <td>{{ user.last_name }}</td>
                                        <td>{{ user.email }}</td>
                                        <td>{{ user.sexe_user }}</td>
                                        <td>{{ user.phone_number }}</td>
                                        <td>{{ user.nb_points }}</td>
                                        <!-- <td>{{ user.r_user_role[0].name  }}</td> -->
                                        <td>{{ 'toto' }}</td>
                                        <td>
                                            <div class="widget-connection-request-actions d-flex" style="width:250px">
                                                <a href="#" class="btn btn-primary btn-style-light flex-grow-1 m-r-xxs"
                                                    style="background-color: transparent"><i
                                                        class="material-icons">done</i>Editer</a>
                                                <a href="#" class="btn btn-danger btn-style-light flex-grow-1 m-l-xxs"
                                                    style="background-color: transparent"><i
                                                        class="material-icons">close</i>Supprimer</a>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style></style>

<script>
import MainLayout from '../../Layouts/MainLayout.vue'
import { useSwalSuccess, useSwalError } from '../../Composables/alert'

import { ref, onMounted } from 'vue'
export default {
    layout: MainLayout
}
</script>

<script setup>
import { usePage } from '@inertiajs/inertia-vue3'
import { computed } from 'vue'

// console.log(usePage().props.value)
const props = defineProps({
    //Récupération des utilisateurs
    users_liste: Object
})
console.log(props.users_liste)
</script>
