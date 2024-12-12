import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from 'tailwindcss';
import MistralClient from '@mistralai/mistralai';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                './resources/css/app.css',
                './resources/js/app.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
