import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';


const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
export default {
    jit: false,
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            spacing: {
                '6': '1.5rem',
            },
              colors: {
                'critical': '#952715',
                'high': '#f26f21',
                'medium': '#f39f09',
                'low': '#6da79b',
              },
        },
    },

    plugins: [forms],
};
