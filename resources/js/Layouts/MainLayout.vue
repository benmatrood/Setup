<template>
    <div>

        <body>
            <div class="app align-content-stretch d-flex flex-wrap">
                <div class="app-sidebar">
                    <div class="logo">
                        <a href="index.html" class="logo-icon"
                            style="background: url(../assets/images/neptune.png) no-repeat;background-position: center left;background-size: 40px;"><span
                                class="logo-text">awanne</span></a>
                        <div class="sidebar-user-switcher user-activity-online">
                            <a href="#">
                                <img
                                    src="https://img.freepik.com/photos-gratuite/portrait-homme-afro-americain_23-2149072179.jpg?w=2000&t=st=1685520579~exp=1685521179~hmac=6175d4fe155a6b3f4eb1fb568522b32254031ddb888014776fb700a9d88ccbc6">
                                <span class="activity-indicator"></span>
                                <span class="user-info-text">Admin</span>
                            </a>
                        </div>
                    </div>
                    <!-- menu -->
                    <Menu />
                    <!-- end menu -->
                </div>
                <!-- complete body -->
                <div class="app-container">
                    <Header />
                    <!--body -->
                    <div class="app-content">
                        <!-- Utilisation du slot pour faire hérité les composants de MainLayout -->
                        <slot></slot>
                    </div>
                    <!-- end body -->
                </div>
                <!-- end complet body -->
            </div>
        </body>
    </div>
</template>
<script setup>
import Menu from './Partials/Menu.vue'
import Header from './Partials/Header.vue'



</script>
