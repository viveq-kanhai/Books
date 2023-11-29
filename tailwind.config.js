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
      // white: '#ffffff',
      // blue: '#2596be',
      // darkblue: '#145369',
      // black: '#041014'

      // -------option 2------

      white: '#f9fcff',
      blue: '#4fbecf',
      darkblue: '#27295b',
      lightblue: '#dceff6',
      lighter: '#f4fafc'

    }
  },
  plugins: [],
}

