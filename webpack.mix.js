const { EnvironmentPlugin } = require("webpack");
const mix = require("laravel-mix");
const glob = require("glob");
const path = require("path");

const sassOptions = {
    precision: 5,
};

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

 /*
 |--------------------------------------------------------------------------
 | Configure Webpack
 |--------------------------------------------------------------------------
 */

mix.webpackConfig({
    output: {
      publicPath: process.env.ASSET_URL || undefined,
      libraryTarget: 'umd'
    },
  
    plugins: [
      new EnvironmentPlugin({
        // Application's public url
        BASE_URL: process.env.ASSET_URL ? `${process.env.ASSET_URL}/` : '/'
      })
    ],
    module: {
      rules: [
        {
          test: /\.es6$|\.js$/,
        }
      ]
    }
  });

/*
 |--------------------------------------------------------------------------
 | Vendor assets
 |--------------------------------------------------------------------------
 */

function mixAssetsDir(query, cb) {
    (glob.sync("resources/assets/" + query) || []).forEach((f) => {
        f = f.replace(/[\\\/]+/g, "/");
        cb(f, f.replace("resources/assets/", "public/assets/"));
    });
}

mix.js("resources/js/app.js", "public/js").sass(
    "resources/sass/app.scss",
    "public/css"
);

// Core javascripts
mixAssetsDir('js/**/*.js', (src, dest) => mix.scripts(src, dest));

// Libs
mixAssetsDir("vendor/libs/**/*.js", (src, dest) => mix.js(src, dest));
mixAssetsDir("vendor/libs/**/!(_)*.scss", (src, dest) =>
    mix.sass(src, dest.replace(/\.scss$/, ".css"), { sassOptions })
);
mixAssetsDir("vendor/libs/**/*.{png,jpg,jpeg,gif}", (src, dest) =>
    mix.copy(src, dest)
);
