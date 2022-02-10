const mix = require("laravel-mix");
const tailwindcss = require("tailwindcss");

mix
  .js("resources/js/dashboard.js", "public/assets/js/dashboard.js")
  .postCss("resources/css/dashboard.css", "public/assets/css", [
    require("postcss-import"),
    tailwindcss("./tailwind.config.js"),
  ]);
