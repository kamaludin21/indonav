/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
  ],
  theme: {
    extend: {
      keyframes: {
        ripple: {
          '0%': { transform: 'scale(1)', opacity: '0.3' },
          '50%': { transform: 'scale(1.05)', opacity: '0.6' },
          '100%': { transform: 'scale(1)', opacity: '0.3' },
        }
      },
      animation: {
        ripple: 'ripple 4s infinite ease-in-out',
      }
    },
    fontFamily: {
      sans: "Host Grotesk",
    },
  },
  plugins: [],
};
