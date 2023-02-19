const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./app/Http/Livewire/**/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
              primary: 'rgb(var(--color-primary) / <alpha-value>)',
              secondary: 'rgb(var(--color-secondary) / <alpha-value>)',
            },
            container: {
              padding: {
                DEFAULT: '10px',
                sm: '10px',
                md: '10px',
                lg: '0',
                xl: '0',
                '2xl': '0',
              },
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
