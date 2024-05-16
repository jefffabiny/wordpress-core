const { src, dest, watch } = require("gulp");
const sass = require("gulp-sass")(require("sass")); // Specify Sass compiler
const postcss = require("gulp-postcss");
const autoprefixer = require("autoprefixer");
const cssnano = require("cssnano");
const rename = require("gulp-rename");
const sassFiles = "sass/*.scss"; // Path to your Sass files

function styles() {
  return src(sassFiles)
    .pipe(sass().on("error", sass.logError))
    .pipe(postcss([autoprefixer(), cssnano()]))
    .pipe(rename({ suffix: ".min" }))
    .pipe(dest("css"));
}

function watchSass() {
  watch(sassFiles, styles); // Watch Sass files and run styles task on change
}

exports.styles = styles;
exports.watch = watchSass;
