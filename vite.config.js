import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    resolve: {
        alias: {
            '@shared': '/resources/js/Shared',
            '@pages': '/resources/js/Pages',
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/js/app.js', 
                'resources/css/app.css',
                'resources/sass/app.scss', 
                'resources/sass/forum.scss',
                'resources/sass/bootstrap-support.scss'
            ],
            refresh: true,
        }),
        tailwindcss(),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ]
});
