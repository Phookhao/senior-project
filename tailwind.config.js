/** @type {import('tailwindcss').Config} */
export default {
  content: ["./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",],
  theme: {
    extend: {screens:{
      'sm': '480px',
      'md': '768px',
      'lg': '976px',
      'xl': '1440px',
    },
      fontFamily: {
        thai: ["Noto Serif Thai", 'serif'],
        english: ["Mitr", 'sans-serif']
      },
      colors:{
        'deepblue':'#0d558f',
        'littleblue':' #0E6497',
        'lightblue':'#011F37',
      },
      textShadow: {
        sm: '5px 0px 0px rgb(255, 255, 255)',
        DEFAULT: '2px 2px 4px rgba(0, 0, 0, 0.5)',
        lg: '3px 3px 6px rgba(0, 0, 0, 0.7)',
      },
    },
  },
  plugins: [
    require('tailwindcss-textshadow'),
  ],
}

