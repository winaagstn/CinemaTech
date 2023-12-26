import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

module.exports = {
    darkMode: 'media',
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

      },
    },
    plugins: [
        require('flowbite/plugin',forms)
    ],
  }
