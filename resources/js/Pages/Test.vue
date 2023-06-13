<template>
    <div>
        <h1>{{ message.toto }}</h1>
        <div class="row mb-2">
            <!-- <div>
                <input type="text" class="input_data_range form-control" name="daterange" value="" placeholder="" />
            </div> -->
        </div>

    </div>
</template>


<!-- gestion du style -->
<style>
.input_data_range {
    height: 40px;
    padding: 0 20px;
    width: 290px;
    border: #ffff;
    box-shadow: rgb(0 0 0 / 20%) 0px 2px 3px;
    border-radius: 10px;
    font-size: 16px;
    padding-left: 50px;

}



/*Gestion taill de calendrier*/
.daterangepicker .drp-calendar {
    display: none;
    width: 360px;
    height: 300px;
    max-width: 300px;
}

/*bouton selectionner*/
.daterangepicker .calendar-table td.active {
    color: #fff;
    background-color: #020202 !important;
    padding-top: 1px;
    padding-bottom: 1px;
    border-radius: 30px;
}

/**/
.daterangepicker .calendar-table th,
.daterangepicker .calendar-table td {
    white-space: nowrap;
    text-align: center;
    line-height: 37px;
    font-size: 13px;
    white-space: nowrap;
    cursor: pointer;
}

/*Footer du range*/
.daterangepicker .drp-buttons {
    clear: both;
    text-align: right;
    padding: 20px;
    padding-top: 50;
    line-height: 12px;
    vertical-align: middle;
    border: none;
}

/*Boutons du footer*/
.daterangepicker .drp-buttons .btn {
    margin-left: 8px;
    font-size: 14px;
    padding: 8px 10px;
    border: none;
    background-color: #ffffff;
    border-radius: 8px;
    border: 2px solid transparent;
    box-shadow: rgb(0 0 0 / 20%) 0px 2px 3px;
    cursor: pointer;
    font-weight: 100;
    color: black;
}

/* Hide annuler boton*/
/* .cancelBtn {
    display: none;
} */

.daterangepicker .drp-selected {
    display: none;
}

.daterangepicker .drp-calendar.left {
    margin: 10px;
}

.daterangepicker .drp-calendar.right {
    margin: 10px;
}

th {
    font-weight: normal !important;
}


.daterangepicker .calendar-table td.in-range {
    background-color: #f0f0f0;
}

.daterangepicker .calendar-table td.disabled {
    color: #999;
    background-color: transparent;
    cursor: default;
}

.daterangepicker .calendar-table td.week-number {
    background-color: #f9f9f9;
    color: #999;
    font-weight: normal;
    vertical-align: middle;
}
</style>
<!-- Création de Layout persistent pour faire hérité MainLayout des autres composants -->
<script>
import axios from 'axios';
import MainLayout from '../Layouts/MainLayout.vue';


export default {
    layout: MainLayout,
    data() {
        return {
            message: '',
        };
    },
    mounted() {
        const my_language = localStorage.getItem('langue');
        if (my_language != "") {
            this.changeLanguage(my_language);
        } else {
            this.changeLanguage('fr'); // Change the default language here
        }

    },
    methods: {

        changeLanguage(lang) {
            axios.get(`/api/welcome-message?lang=${lang}`).then((response) => {
                localStorage.setItem('langue', lang);
                this.message = response.data.message;
            });
        },
    },
};
</script>



<script setup>

$(function () {
    var disabledDates = ['2023-06-12', '2023-06-13', '2023-07-19'];
    $('input[name="daterange"]').daterangepicker({
        "locale": {
            "format": "MM/DD/YYYY",
            "separator": " - ",
            "applyLabel": "Valider",
            "cancelLabel": "Annuler",
            "fromLabel": "From",
            "toLabel": "To",
            "customRangeLabel": "Custom",
            "weekLabel": "W",
            "daysOfWeek": [
                "Dim",
                "Lun",
                "Mar",
                "Mer",
                "Jeu",
                "Ven",
                "San"
            ],
            "monthNames": [
                "Janvier",
                "Fevrier",
                "Mars",
                "Avril",
                "Mai",
                "Juin",
                "Juillet",
                "Aout",
                "Septembre",
                "Octobre",
                "Novembre",
                "Decembre"
            ],
            "firstDay": 1
        },
        opens: 'right',
        minDate: moment().startOf('day'),
        isInvalidDate: function (date) {
            // Désactiver les dates passées
            if (date.isBefore(moment().startOf('day'))) {
                return true;
            }

            // Désactiver les dates spécifiques
            var dateString = date.format('YYYY-MM-DD');
            return disabledDates.indexOf(dateString) !== -1;
        }
    }, function (start, end, label) {
        // Vérifier si la date désactivée est incluse dans la sélection
        var disabledDateIndex = disabledDates.findIndex(function (date) {
            return moment(date).isBetween(start, end, null, '[]')
        })
        if (disabledDateIndex !== -1) {
            // Mettre à jour la date de fin de la sélection
            var disabledDate = moment(disabledDates[disabledDateIndex])
            end = disabledDate.subtract(1, 'day')
        }
        console.log(
            'A new date selection was made: ' +
            start.format('YYYY-MM-DD') +
            ' to ' +
            end.format('YYYY-MM-DD')
        )
    })
});


</script>