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
                    300: '#ccb8ea',  // Slightly lighter tint
                    400: '#7F4DCA',  // The base color
                    500: '#693CA9',  // Slightly darker shade
                    600: '#522A87',  // Darker shade
                    700: '#3C1955',  // Even darker shade
                    800: '#260823',
                }
            },
            flex: {
                '320': '0 0 320px',
            },
        },
        screens: {
            'sm': '320px',
            // => @media (min-width: 320px) { ... }

            'md': '640px',
            // => @media (min-width: 768px) { ... }

            'lg': '1024px',
            // => @media (min-width: 1024px) { ... }

            'xl': '1280px',
            // => @media (min-width: 1280px) { ... }

            '2xl': '1536px',
            // => @media (min-width: 1536px) { ... }
        }
    },

    plugins: [forms],
};
