/** @type {import('tailwindcss').Config} */

module.exports = {
  content: ["../../**/*.php"],
  theme: {
    extend: {
      screens: {
        sl: "992px",
        lg: "1200px",
        xxl: "1440px",
        '3xl': "1600px",
        '4xl': "1800px",
        '5xl': "2000px",
        '6xl': "2200px",
      },
       colors: {
        darkblue: "#012555", //Dark Blue
        orange:'#FB9E3F' ,
        darkgray:'#333333', // Dark Gray
        lightblue:'#E0E8F4',
        aliceblue:'#F5F8FD', // LIGHT BLUE TYPE 2
        lavendermist:'#E0E7F4', // LIGHT BLUE TYPE 3
        lightgray:'#BEC5CF',
        mercury:'#E5E5E5',
        mediumblue:'#345177',
      },
    },
  },
  plugins: [require("@tailwindcss/typography"),],
}

