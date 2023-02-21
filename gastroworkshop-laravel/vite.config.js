import { defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from "@vitejs/plugin-vue";


export default ({ mode }) => {
    process.env = Object.assign(process.env, loadEnv(mode, process.cwd(), ''));

    return defineConfig({
        plugins: [
            laravel({
                input: ['resources/css/app.scss', 'resources/js/app.js'],
                refresh: true,
            }),
            vue({
                template: {
                 transformAssetUrls: {
                   base: null,
                   includeAbsolute: false,
                   },
                 },
             }),
        ],
        resolve:{
            alias:{
                'vue-socials': 'vue-socials/dist/vue-socials.es.js'
            }
        },
        server: {
            hmr:{
                host: 'localhost',
            }
        }
    });
}
