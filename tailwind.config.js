module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    colors: {
      'wine': '#54191b',
      'wine-100': '#691c32',
      'wine-200': '#8e1537',
      'wine-logo': '#73051c',
      'red-error': '#d93025',
      'gray': '#a0a0a0',
      'gray-100': '#d5d6d1',
      'gray-200': '#e0e2e0',
      'white': '#ffffff'
    },
    extend: {
      backgroundImage: {
        'checkbox-not-checked': "url('/images/svg/CheckBoxNotChecked.svg')",
        'checkbox-checked': "url('/images/svg/CheckBoxChecked.svg')",
        'logo-nicolas-romero': "url('/images/logo-nicolas-romero.jpeg')",
      },
    },
  },
  plugins: [],
}
