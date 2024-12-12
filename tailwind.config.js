import forms from '@tailwindcss/forms';
import aspectRatio from '@tailwindcss/aspect-ratio';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: '#2f26ce',
                secondary: '#dddcfe',
                accent: '#443BFD',
            },
        },
    },
    plugins: [
        forms,
        aspectRatio,
    ],
}
