import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        laravel({
            input: [
                'resources/admin/sass/style.scss',
                'resources/admin/js/main.js',
                'resources/admin/js/components/utils.js',
            ],
            refresh: true,
        })
    ],
    css: {
        preprocessorOptions: {
            scss: {
                additionalData: `@import "bootstrap/scss/functions";`,
            },
        },
    },
});
