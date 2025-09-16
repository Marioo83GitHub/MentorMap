import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/css/Login/style.css', 'resources/js/Login/script.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
