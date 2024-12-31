/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**/*.php", // Include all PHP files
    "./**/*.html", // Include HTML files
    "./src/**/*.js", // Include JavaScript files
    "./node_modules/preline/preline.js",
  ],
  theme: {
    extend: {},
  },
  plugins: [require("preline/plugin")],
};
