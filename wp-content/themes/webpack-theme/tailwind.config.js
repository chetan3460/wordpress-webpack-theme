/** @type {import('tailwindcss').Config} */
import plugin from "tailwindcss/plugin";

module.exports = {
  content: ["../../**/*.php", './src/**/*.js'],
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
        orange: '#FB9E3F',
        darkgray: '#333333', // Dark Gray
        lightblue: '#E0E8F4',
        aliceblue: '#F5F8FD', // LIGHT BLUE TYPE 2
        lavendermist: '#E0E7F4', // LIGHT BLUE TYPE 3
        lightgray: '#BEC5CF',
        mercury: '#E5E5E5',
        mediumblue: '#345177',
        black: '#000',
        "light-border": '#353535',
        white: '#fff',
        beige: '#ccbda8',
      },
    },
    typography: ({ theme }) => ({
      DEFAULT: {
        css: {
          maxWidth: "100%",
          "--tw-prose-body": theme("colors.white"),
          "--tw-prose-headings": theme("colors.white"),
          "--tw-prose-lead": theme("colors.beige"),
          "--tw-prose-links": theme("colors.beige"),
          "--tw-prose-bold": theme("colors.beige"),
          "--tw-prose-bullets": theme("colors.beige"),
          "--tw-prose-hr": theme("colors.beige"),
        },
      },
    }),
  },
  plugins: [
    require("@tailwindcss/typography"),
    plugin(({ addBase, addVariant, matchVariant, theme }) => {
      addBase({
        body: {
          color: theme("colors.white"),
          background: theme("colors.black"),
          // fontFamily: theme("fontFamily.inria"),
          margin: "0",
          fontWeight: "normal",
          fontSmoothing: "antialiased",
          "-webkit-font-smoothing": "antialiased",
          "-moz-osx-font-smoothing": "grayscale",
          overflowX: "hidden",
        },
      });
      addVariant("active", "&.active", "&.swiper-slide-active"),

        matchVariant("nth", (value) => `&:nth-child(${value})`, {
          values: {
            1: "1",
            2: "2",
            3: "3",
            4: "4",
            5: "5",
            6: "6",
          },
        })

    }),
  ],
}

