
import "./bootstrap"
import { createApp, h } from 'vue'
import { createInertiaApp, Link, Head } from '@inertiajs/inertia-vue3'
import { ZiggyVue } from 'ziggi-vue'
import { Ziggy } from './ziggy'
import Swal from "sweetalert2";
import ElementPlus from 'element-plus';
import 'element-plus/dist/index.css';
import fr from 'element-plus/dist/locale/fr.mjs'

// import { fr } from "element-plus/es/locale"

window.Swal = Swal;
// Add the section below
import { createI18n } from 'vue-i18n';
import messages from '@/lang/messages.js'
const i18n = createI18n({
    locale: 'fr',
    fallbackLocale: 'fr',
    messages,
});
createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        return pages[`./Pages/${name}.vue`]
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ElementPlus, {
                locale: fr,
            })
            .use(i18n)
            .use(ZiggyVue, Ziggy)
            .component('Link', Link)
            .component('Head', Head)
            .mixin({ methods: { route } })
            .mount(el)
    },
})







