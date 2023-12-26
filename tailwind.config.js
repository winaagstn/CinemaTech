import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

module.exports = {
    darkMode: 'media',
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./node_modules/flowbite/**/*.js"
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
