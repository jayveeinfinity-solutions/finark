import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    resolve: {
        alias: {
            '@shared': '/resources/js/Shared',
            '@pages': '/resources/js/Pages',
        },
    },
    plugins: [
        laravel({
            input: ['resources/js/app.js', 'resources/sass/app.scss', 'resources/sass/forum.scss'],
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
    ]
});
