/** @type {import('tailwindcss').Config} */
export default {
  content: [    
  "./resources/**/*.blade.php",
  "./resources/**/*.js",
  "./resources/**/*.vue",],
  theme: {
    extend: {
      fontFamily: {
        'playball': ["Playball", "cursive"],
        'calistoga': ["Calistoga", "serif"]
      }
    },
    colors: {
      white: '#f9fcff',
      blue: '#4fbecf',
      darkblue: '#27295b',
      lightblue: '#dceff6',
      lighter: '#f4fafc',

      teal: '#008080',
      test: '#17252a',

      zodiac: '#0c243c',
      tiara: '#c9d1d5',
      fountain: '#55c2c3',
      regent: '#7e8c9c',

    }
  },
  plugins: [],
}

