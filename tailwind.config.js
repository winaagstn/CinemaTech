module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./node_modules/flowbite/**/*.js"
    ],
    theme: {
      extend: {},
    },
    plugins: [
        require('flowbite/plugin')
    ],
    darkMode: 'media',
    fontFamily: {
      sans: ['Graphik', 'sans-serif' , ],
      serif: ['Merriweather', 'serif'],
      montserrat:['Montserrat'],
      inter:['Inter'],
     }
  }
