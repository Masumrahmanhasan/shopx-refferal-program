import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
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
            colors: {
                purple_light: {
                    50: '#7F4DCA',
                    100: '#E8E4F6',  // Lightest tint
                    200: '#C4B8E9',  // Light tint
                    300: '#9F8BDD',  // Slightly lighter tint
                    400: '#7F4DCA',  // The base color
                    500: '#693CA9',  // Slightly darker shade
                    600: '#522A87',  // Darker shade
                    700: '#3C1955',  // Even darker shade
                    800: '#260823',
                }
            }
        },
    },

    plugins: [forms],
};
