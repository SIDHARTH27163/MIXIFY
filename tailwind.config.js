import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily:{
                Roboto:['Roboto'],
                Robotoslab:['Robotoslab'],
              
                Montserrat:['Montserrat'],
                ubuntu:['ubuntu'],
                poppins:['poppins']
          
              }
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin' , 'tailwind-scrollbar')


    ],
};
