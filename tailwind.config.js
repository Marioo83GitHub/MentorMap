import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                fredoka: ['Fredoka', 'sans-serif'],
                nunito: ['Nunito', 'sans-serif'],
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                mmdarkgray: '#2C2C2C',
                mmgray: '#DDDDDD',
                mmwhite: '#FFFFFF',
                mmgreen: '#2EB830',
                mmblue: '#1A44D5'
            },
        },
    },

    plugins: [forms, typography],
};
