const { src, dest, watch } = require("gulp");
const gulpSass = require('gulp-sass');
const sass = gulpSass(require('sass'));

const postcss = require("gulp-postcss");
const autoprefixer = require("autoprefixer");
const cssnano = require("cssnano");
const rename = require("gulp-rename");
const sourcemaps = require("gulp-sourcemaps");
const path = require("path");

const sassFiles = path.join(__dirname, "sass/**/*.scss");
const cssDest = path.join(__dirname, "css");

function styles() {
  return src(sassFiles)
    .pipe(sourcemaps.init())
    .pipe(sass().on("error", sass.logError))
    .pipe(postcss([autoprefixer(), cssnano()]).on("error", (err) => {
      console.error(err);
      this.emit("end");
    }))
    .pipe(rename({ suffix: ".min" }))
    .pipe(sourcemaps.write("."))
    .pipe(dest(cssDest));
}

function watchSass() {
  watch(sassFiles, styles); // Watch Sass files and run styles task on change
}

exports.styles = styles;
exports.watch = watchSass;
