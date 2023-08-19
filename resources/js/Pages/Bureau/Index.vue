
<template>
    <div class="demo-date-picker">
        <div class="d-flex justify-content-between">
            <div class="block">
                <p v-if="days !== 0">Nombre de jours: {{ days }} </p>
                <p v-if="days !== 0">Montant: {{ days * 10000 }} Fcfa</p>
                <el-date-picker v-model="value" type="daterange" start-placeholder="Date de début"
                    end-placeholder="Date de fin" format="DD/MM/YYYY" value-format="DD/MM/YYYY"
                    :disabledDate="disabledEndDate" @change="onDateChange" />
            </div>
            <el-button type="primary" style="margin-left: 16px" @click="drawer = true">
                Ouvrir
            </el-button>
        </div>

        <el-drawer v-model="drawer" title="Filtre" size="25%">
            <div>
                <h1 style="width: 100%; background-color: antiquewhite; height: 300px;">toto</h1>
            </div>
        </el-drawer>
        <div style="height: 200px; width: 200px;">
            <!-- <el-carousel :interval="4000" type="card" height="100px" width="100px">
                <el-carousel-item v-for="item in images" :key="item">
                    <img :src="item" alt="Slide {{ item }}" />
                </el-carousel-item>
            </el-carousel> -->
            <el-carousel arrow="always" height="100px">
                <el-carousel-item v-for="item in images" :key="item">
                    <img :src="item" alt="Slide {{ item }}" />
                </el-carousel-item>
            </el-carousel>
        </div>

        <!-- gestion des upload images -->
        <div class="card" style="box-shadow: rgb(0 0 0 / 20%) 0px 2px 3px !important;">
            <div class="m-3">
                <el-upload action="#" list-type="picture-card" :auto-upload="false" multiple drag>
                    <i class="el-icon-plus">+</i>
                    <div slot="file" slot-scope="{ file }" v-if="file && file.url">
                        <img class="el-upload-list__item-thumbnail" :src="file.url" alt="">
                        <span class="el-upload-list__item-actions">
                            <span class="el-upload-list__item-preview" @click="handlePictureCardPreview(file)">
                                <i class="el-icon-zoom-in"></i>
                            </span>
                            <span v-if="!disabled" class="el-upload-list__item-delete" @click="handleDownload(file)">
                                <i class="el-icon-download"></i>
                            </span>
                            <span v-if="!disabled" class="el-upload-list__item-delete" @click="handleRemove(file)">
                                <i class="el-icon-delete"></i>
                            </span>
                        </span>
                    </div>
                </el-upload>
            </div>
            <el-dialog :visible.sync="dialogVisible">
                <img width="100%" :src="dialogImageUrl" alt="">
            </el-dialog>
        </div>
        <!-- Fin gestion des upload images -->
        <div class="m-3" v-if="url">
            <el-row :gutter="20">
                <el-col :span="6" class="d-none d-sm-block">
                    <div class="demo-imag__preview grid-content "
                        style="height: 240px;margin-right: 10px;margin-bottom: 10px;" @click="getAlternatingList(4)">
                        <el-image
                            style="width: 100%; height: 100%;border-radius: 12px;object-fit: contain; object-position: center;"
                            :src="getImageUrl(4)" :preview-src-list="getAlternatingList(4)">
                        </el-image>
                    </div>
                    <div class="grid-content " style="height: 320px;margin-right: 10px;" @click="getAlternatingList(1)">
                        <el-image
                            style="width: 100%; height: 100%;border-radius: 12px;object-fit: contain; object-position: center;"
                            :src="getImageUrl(1)" :preview-src-list="getAlternatingList(1)">
                        </el-image>
                    </div>
                </el-col>
                <el-col :span="12" :xs="24" :sm="12">
                    <el-row :gutter="20">
                        <el-col :span="12">
                            <div class="grid-content bg-purple"
                                style="height: 300px;    margin-left: 10px;margin-right: 10px;margin-bottom: 10px;"
                                @click="getAlternatingList(2)">
                                <el-image
                                    style="width: 100%; height: 100%;border-radius: 12px;object-fit: contain; object-position: center;"
                                    :src="getImageUrl(2)" :preview-src-list="getAlternatingList(2)">
                                </el-image>
                            </div>
                        </el-col>
                        <el-col :span="12">
                            <div class="grid-content bg-purple" style="height: 300px;margin-right: 10px;"
                                @click="getAlternatingList(3)">
                                <el-image
                                    style="width: 100%; height: 100%;border-radius: 12px;object-fit: contain; object-position: center;"
                                    :src="getImageUrl(3)" :preview-src-list="getAlternatingList(3)">
                                </el-image>
                            </div>
                        </el-col>
                    </el-row>
                    <div class="grid-content bg-purple" style="height: 400px;" @click="getAlternatingList(3)">
                        <el-image
                            style="width: 100%; height: 100%;border-radius: 12px;object-fit: cover; object-position: center;"
                            :src="getImageUrl(3)" :preview-src-list="getAlternatingList(3)">
                        </el-image>
                    </div>
                </el-col>
                <el-col :span="6" :xs="24" class="d-none d-sm-block">
                    <div class="grid-content" style="height: 490px;    margin-left: 10px;margin-bottom: 10px;"
                        @click="getAlternatingList(0)">
                        <el-image
                            style="width: 100%; height: 100%;border-radius: 12px;object-fit: contain; object-position: center;"
                            :src="getImageUrl(0)" :preview-src-list="getAlternatingList(0)">
                        </el-image>
                    </div>
                    <div class="grid-content " style="height: 280px;margin-left: 10px;" @click="getAlternatingList(1)">
                        <el-image
                            style="width: 100%; height: 100%;border-radius: 12px;object-fit: contain; object-position: center;"
                            :src="getImageUrl(1)" :preview-src-list="getAlternatingList(1)">
                        </el-image>
                    </div>
                </el-col>
            </el-row>
        </div>
    </div>
</template>

<style >
.d-arrow-left {
    display: none !important;
}

.d-arrow-right {
    display: none !important;
}

.el-drawer__close-btn {
    background-color: bisque !important;
}

.el-date-table td.end-date .el-date-table-cell__text,
.el-date-table td.start-date .el-date-table-cell__text {
    background-color: black !important;
}

.el-date-table td.today .el-date-table-cell__text {
    color: rgb(141, 139, 139) !important;
}

.el-date-editor.el-input__wrapper {
    box-shadow: rgb(0 0 0 / 20%) 0px 2px 3px !important;
}

.el-range-editor.el-input__wrapper {
    padding: 0 20px !important;
    height: 40px !important;
    border-radius: 8px !important;
}

/* Gestion des upload images */
.el-upload-dragger {
    background-color: transparent !important;
    border: none !important;
    height: var(--el-upload-picture-card-size) !important;
}

.el-upload--picture-card i {
    font-style: normal !important;
}

/* Fin gestion des upload images */

/* .el-row {
    margin-bottom: 20px;

    &:last-child {
        margin-bottom: 0;
    }
} */

/* .el-col {
    border-radius: 4px;
    display: flex;
    align-items: stretch;
} */


/* .grid-content {
    border-radius: 12px;
    flex-grow: 1;
} */


/*  */
.el-image-viewer__mask {
    opacity: 1 !important;
}

.el-col {
    padding-right: 0px !important;
    padding-left: 0px !important;
}

@media (max-width: 576px) {
    .hide_on_small_screen {
        display: none;
    }
}

/* .el-row {
    margin-bottom: 10px;
} */

.grid-content {
    box-shadow: rgb(0 0 0 / 20%) 0px 2px 3px !important;
    border-radius: 12px;
}

.viewer-fade-enter-active {
    -webkit-animation: viewer-fade-in 1s !important;
    animation: viewer-fade-in .4s !important;
}

.viewer-fade-leave-active {
    -webkit-animation: viewer-fade-out 3s !important;
    animation: viewer-fade-out 3s !important;
}
</style>
<script>
import MainLayout from '../../Layouts/MainLayout.vue'
import { ref } from 'vue'
import { ElMessage } from 'element-plus'

export default {
    layout: MainLayout,
}
</script>
  
<script setup>
import { ref } from 'vue';
// import moment from 'moment';

const value = ref(null); // Changez la valeur initiale de la variable à null
const drawer = ref(false);
const days = ref(0);
//liste des dates désactivés 
const dateDesabled = [
    '2023-07-23', '2023-07-03', '2023-07-07', '2023-08-16', '2023-08-21',
];
//liste des dates désactivés au date format
const disabledDates = [
    new Date('2023-07-23'),
    new Date('2023-07-03'),
    new Date('2023-07-07'),
    new Date('2023-08-16'),
    new Date('2023-08-21'),
];

// Calcul du nombre de jours
const calculateDays = () => {
    if (value.value && value.value.length >= 2) {
        const date1 = moment(value.value[0], 'DD/MM/YYYY');
        const date2 = moment(value.value[1], 'DD/MM/YYYY');
        const diffDays = date2.diff(date1, 'days');
        days.value = diffDays + 1;
    }
};

//Ajouter les dates désactivés au calendrier
const disabledEndDate = (date, departureDate) => {
    // If departureDate is defined, return valid dates after departureDate
    if (departureDate) {
        return date.getTime() < departureDate;
    } else {
        // If !departureDate, return valid dates after today, except the current date
        const today = new Date();
        today.setHours(0, 0, 0, 0); // Set time to midnight to exclude the current date
        // Check if the date is in the disabledDates array
        const isDisabled = disabledDates.some(disabledDate =>
            date.getFullYear() === disabledDate.getFullYear() &&
            date.getMonth() === disabledDate.getMonth() &&
            date.getDate() === disabledDate.getDate()
        );
        return date.getTime() < today.getTime() || isDisabled;
    }
};

//récupérations des dates séléctionner dans un tableau
const getDatesBetween = (startDate, endDate) => {
    const dates = [];
    const currentDate = new Date(startDate);
    const lastDate = new Date(endDate);

    while (currentDate <= lastDate) {
        dates.push(currentDate.toISOString().split('T')[0]);
        currentDate.setDate(currentDate.getDate() + 1);
    }

    return dates;
};

//Transformation du format de la date 
const transformDateFormat = (dateString) => {
    const parts = dateString.split('/');
    return `${parts[2]}-${parts[1]}-${parts[0]}`;
};

const onDateChange = () => {
    if (value.value && value.value.length >= 2) {
        calculateDays();
        const datesInRange = getDatesBetween(transformDateFormat(value.value[0]), transformDateFormat(value.value[1]));
        const isAnyValueInB = dateDesabled.some(value => datesInRange.includes(value));
        if (isAnyValueInB) {
            ElMessage.error('Oops, votre sélection contient une date réservée.')
            days.value = 0
            value.value = 0;
        } else {
            ElMessage.success('Super, les dates sélectionnées sont disponible.')
        }
    }
    //Vidé les valeurs des dates , du nombre de jours et de la tarification
    else {
        days.value = 0
        value.value = 0;
    }
};

const images = [
    '/assets/images/other/togg_3.jpg',
    '/assets/images/other/togg_3.jpg',
    '/assets/images/other/togg_3.jpg',
    '/assets/images/other/togg_3.jpg',
    '/assets/images/other/togg_3.jpg',
    '/assets/images/other/togg_3.jpg',
]
const file = ref();
const dialogImageUrl = ref('');
const dialogVisible = ref(false);
const disabled = ref(false);

const handleRemove = (file) => {
    console.log(file);
};

const handlePictureCardPreview = (file) => {
    dialogImageUrl.value = file.url;
    dialogVisible.value = true;
};


const handleDownload = (file) => {
    console.log(file);
};

// liste des images
const srcList = ref(
    ['https://fuss10.elemecdn.com/8/27/f01c15bb73e1ef3793e64e6b7bbccjpeg.jpeg',
        'https://fuss10.elemecdn.com/1/8e/aeffeb4de74e2fde4bd74fc7b4486jpeg.jpeg',
        'https://images.unsplash.com/photo-1575936123452-b67c3203c357?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2670&q=80',
        'https://images.unsplash.com/photo-1488372759477-a7f4aa078cb6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80'
    ]);
const url = ref(
    ['https://fuss10.elemecdn.com/8/27/f01c15bb73e1ef3793e64e6b7bbccjpeg.jpeg',
        'https://fuss10.elemecdn.com/e/5d/4a731a90594a4af544c0c25941171jpeg.jpeg',
        'https://fuss10.elemecdn.com/1/8e/aeffeb4de74e2fde4bd74fc7b4486jpeg.jpeg',
        'https://images.unsplash.com/photo-1575936123452-b67c3203c357?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2670&q=80',
        'https://images.unsplash.com/photo-1488372759477-a7f4aa078cb6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80'
    ]);
// fonctio quiretourne l'image en fonction de l'index
const getImageUrl = (index) => {
    return url.value[index];
};

// const toto = () => {
//     getAlternatingList(index)
// };
function getAlternatingList(index) {
    const alternatingList = [...url.value];
    if (index >= 0 && index < alternatingList.length) {
        const temp = alternatingList[0];
        alternatingList[0] = alternatingList[index];
        alternatingList[index] = temp;
    }
    return alternatingList;
}

// Exemple d'utilisation
// async function translateText(text, targetLanguage) {
//     const apiKey = 'VOTRE_CLE_API_GOOGLE'; // Remplacez par votre clé d'API Google Cloud
//     const url = `https://translation.googleapis.com/language/translate/v2?key=${apiKey}`;

//     const data = new URLSearchParams();
//     data.append('q', text);
//     data.append('target', targetLanguage);

//     const response = await fetch(url, {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/x-www-form-urlencoded',
//         },
//         body: data,
//     });

//     const jsonResponse = await response.json();

//     if (jsonResponse && jsonResponse.data && jsonResponse.data.translations[0].translatedText) {
//         return jsonResponse.data.translations[0].translatedText;
//     }

//     return null;
// }

// Utilisation de la fonction
// const textToTranslate = "Hello, how are you?";
// const targetLanguage = "fr"; // Langue cible (français)

// translateText(textToTranslate, targetLanguage)
//     .then(translatedText => {
//         if (translatedText) {
//             console.log(`Traduction : ${translatedText}`);
//         } else {
//             console.log("Impossible de traduire le texte.");
//         }
//     })
//     .catch(error => {
//         console.error("Erreur lors de la traduction :", error);
//     });


</script>
  
