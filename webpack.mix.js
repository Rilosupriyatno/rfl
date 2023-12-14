const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

// added sass bundle

mix

  .js(
    "resources/js/pages/administration/product/shipment-payment.js",
    "public/js/pages/administration/product",
    "resources/js/app.js",
    "public/js"
  )
  .sass("resources/sass/styles.scss", "public/css")
  .options({
    processCssUrls: false,
  })
  .postCss("resources/css/app.css", "public/css", [
    require("tailwindcss"),
    require("flowbite/plugin"),
  ]);
// .copy('resources/favicon.ico', 'public/favicon.ico')
// .copy('resources/font', 'public/font')
// .copy('resources/img', 'public/img')
// .copy('resources/js', 'public/js')
// .copy('resources/icon', 'public/icon')
// .copy('resources/json', 'public/json');
if (mix.inProduction()) {
  mix.version();
}
