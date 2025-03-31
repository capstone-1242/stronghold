import { defineConfig } from 'vite';
import tailwindcss from '@tailwindcss/vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/css/styles.css', 'resources/js/main.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],

});
