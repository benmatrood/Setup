import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'
// import path
import path from 'path'
export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true
        })
    ],
    resolve: {
        alias: {
            ziggy: path.resolve(__dirname, 'vendor/tightenco/ziggy/src/js'),
            'ziggi-vue': path.resolve(
                __dirname,
                'vendor/tightenco/ziggy/src/js/vue'
            )
        }
    },
    build: {
        rollupOptions: {
            external: 'ziggy'
        }
    }
})
