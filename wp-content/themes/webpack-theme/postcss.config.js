const tailwindcss = require('tailwindcss');
module.exports = {
  plugins: [
    ['postcss-preset-env', {
      stage: 3, // Change this as necessary
      features: {
        'custom-properties': false // Disable custom properties
      }
    }],
    tailwindcss,
  ],
};
