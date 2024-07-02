/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./application/**/*.{html,js,php}"],
  theme: {
    extend: {
      colors: {
        primaryColor: '#F9A826',
        greenAgro: '#187113',
        greenAgroHover: '#c2e807',
      }
    },
    fontFamily: {
      display: ["Nunito", "sans-serif",
      "montserrat", "Montserrat",
      "Dancing Script", "cursive"]
    }
  },
  plugins: [],
}
