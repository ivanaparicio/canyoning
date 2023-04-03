const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                'inter':['Inter'],
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },

            colors: {
                'primary': { 
                    '50': '#fef7ee',
                    '100': '#fdedd7',
                    '200': '#fad8ae',
                    '300': '#f6bb7b',
                    '400': '#f19444',
                    '500': '#ed7722',
                    '600': '#df5e17',
                    '700': '#b94715',
                    '800': '#933919',
                    '900': '#773117',
                },
                
                'secondary': {
                    '50': '#f3faeb',
                    '100': '#e5f4d3',
                    '200': '#cde9ad',
                    '300': '#acda7c',
                    '400': '#8bc64f',
                    '500': '#6fad35',
                    '600': '#568927',
                    '700': '#426922',
                    '800': '#375420',
                    '900': '#30481f',
                },
                
            },

            height: {
                '224': '56rem',
            }
        },        
    },

    corePlugins: {
        container: false,
    },

    plugins: [require('@tailwindcss/forms')],
};
