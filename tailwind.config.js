/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**/*.php", // Include all PHP files
    "./**/*.html", // Include HTML files
    "./src/**/*.js", // Include JavaScript files
  ],
  theme: {
    extend: {},
  },
  plugins: [  require('preline/plugin'),],
};
