module.exports = {
  purge: {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
    ],
    options: {
        safelist: [
            /text-*/,
            /bg-*/,
            /border-*/,
            /rotate-*/
        ]
    }
  },
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('daisyui'),
  ],
  daisyui: {
    themes: [
      'light', // first one will be the default theme
      'dark',
    ],
  },
}
