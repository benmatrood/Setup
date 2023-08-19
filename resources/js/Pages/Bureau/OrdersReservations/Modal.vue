<template>
    <div>
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
                    <div class="modal-body" v-if="props.data.value && props.data.value.id">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title" style="margin-left: 30px;margin-top: 20px;">{{
                                            props.data.value.r_booking_houses.name }}
                                        </h4>
                                        <div class="mt-3 me-4">
                                            <img src="../../../../../public/assets/images/neptune.png" alt="logo_entreprise"
                                                style="width: 30px;">
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
                                                <div>{{ props.data.value.start_date }} &rarr; {{ props.data.value.end_date
                                                }}
                                                    <p class="mt-2">Chambre privé 1 lit</p>
                                                </div>
                                                <img src="../../../../../public/assets/images/cards/card.png"
                                                    alt="logo_entreprise"
                                                    style="width: 80px;height: 60px;border-radius: 10px;margin-bottom: 10px;">
                                            </div>
                                            <p>{{ props.data.value.r_booking_houses.description }}</p>
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
                                        <h5 class="card-title">
                                            Détails de la facturation
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <p class="widget-info-text">{{ props.data.value.r_booking_houses.price }}
                                                *{{ props.data.value.nombre_jours }}
                                                nuits</p>
                                            <p class="widget-info-text">{{ props.data.value.r_booking_houses.price *
                                                props.data.value.nombre_jours }} FCFA</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="widget-info-text">TVA </p>
                                            <p class="widget-info-text">{{ (props.data.value.r_booking_houses.price *
                                                props.data.value.nombre_jours) * 0.18 }} FCFA</p>
                                        </div>
                                        <hr style="margin-top: -2px;">
                                        <div class="d-flex justify-content-between">
                                            <p class="widget-info-text">Total</p>
                                            <p class="widget-info-text">{{ (props.data.value.nombre_jours *
                                                props.data.value.r_booking_houses.price * 0.18) +
                                                props.data.value.r_booking_houses.price }} FCFA</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card widget widget-info-inline">
                                    <div class="card-header">
                                        <h5 class="card-title">Paiement
                                            <span class="badge badge-warning badge-style-light"
                                                v-if="props.data.value.booking_status == 2">
                                                Impayer
                                            </span>
                                            <span class="badge badge-success badge-style-light"
                                                v-if="props.data.value.booking_status == 1">
                                                Payer
                                            </span>
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <p class="widget-info-text">Carte Visa</p>
                                            <p class="widget-info-text">30000 f</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="widget-info-text">Date : {{ props.data.value.created_at }}</p>
                                            <!-- <p class="widget-info-text">24-10-2023</p> -->
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
</template>
<script>
export default {
    name: "Modal",
}
</script>

<script setup>
import { computed } from 'vue';
import { ref, reactive } from 'vue'

const props = defineProps({
    data: {
        type: Object,
        required: true
    },
})

//créatio de watch pour le modal
//créatio de watch pour le modal
// const computed_data = computed(() => {
//     // const view_plus = ref({});
//     // // Extraire les données des sous-objets
//     // const r_booking_user_data = props.data.r_booking_user;
//     // const r_booking_houses_data = props.data.r_booking_houses;

//     // Supprimer les sous-objets de l'objet principal
//     // delete props.data.value.r_booking_user;
//     // delete props.data.value.r_booking_houses;

//     // Fusionner les données des sous-objets avec l'objet principal
//     // view_plus.value = {
//     //     ...props.data,
//     //     ...r_booking_user_data,
//     //     ...r_booking_houses_data
//     // };
//     // je retoune la collection nickel pour boucler dans ma vue
//     return props.data.value
// })

</script>