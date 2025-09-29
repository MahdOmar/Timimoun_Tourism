import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/views/**/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                        primary: '#2563EB',
                        secondary: '#10B981',
                        accent: '#F59E0B',
                        dark: '#1F2937',
                        light: '#F9FAFB'
                    },
              keyframes: {
       'zoom-in-out': {
          '0%': { transform: 'scale(0.8)', opacity: '0' },
          '100%': { transform: 'scale(1)', opacity: '1' },
        },
        'left-right': {
            '0%': { transform: 'translateX(-100%)', opacity: '0' },
            '50%': { transform: 'translateX(15%)', opacity: '1' },
            '100%': { transform: 'translateX(0)', opacity: '1' },
        },
         'right-left': {
            '0%': { transform: 'translateX(100%)', opacity: '0' },
            '100%': { transform: 'translateX(0)', opacity: '1' },
        },

        'slide': {
             '0%': { transform: 'translateX(0%)'},
            ' 33%' :     { transform: 'translateX(-100%)' },
            '66%'   :   { transform: 'translateX(-200%)' },
            '100%'   :  { transform: 'translateX(-300%)'},
        
              },
              

        
              },
              
             
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
             animation: {
         'zoom-in-out': 'zoom-in-out 1.5s ease-out forwards',
         'left-right': 'left-right 1.5s ease-out forwards',
         'right-left': 'right-left 1.5s ease-out forwards',
         'slide': 'slide 9s infinite',
      },
        },
    },

    plugins: [forms, require('tailwindcss-rtl')],
};
