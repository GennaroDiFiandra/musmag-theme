"use strict";

const { src, dest, watch, series, parallel } = require("gulp");
const concat = require("gulp-concat");
const sourcemaps = require("gulp-sourcemaps");
const sass = require("gulp-sass")(require("sass"));
const minifyCSS = require("gulp-clean-css");
const minifyJS = require("gulp-uglify");

const paths = {
  bootstrap_styles: {
    src: ["./assets/styles/bootstrap/bootstrap.scss",],
    dest: "./assets/_dist_",
  },
  bootstrap_scripts: {
    src: ["./assets/scripts/bootstrap/bootstrap.js",],
    dest: "./assets/_dist_",
  },
  styles: {
    src: ["./assets/styles/imports.scss",],
    dest: "./assets/_dist_",
  },
  scripts: {
    src: [],
    dest: "./assets/_dist_",
  },
};

function doBootstrapStyle() {
  return src(paths.bootstrap_styles.src)
    .pipe(sourcemaps.init())
    .pipe(sass.sync().on("error", sass.logError))
    .pipe(minifyCSS())
    .pipe(concat("generated-bootstrap.css"))
    .pipe(sourcemaps.write("./"))
    .pipe(dest(paths.bootstrap_styles.dest));
}

function doBootstrapScript() {
  return src(paths.bootstrap_scripts.src)
    .pipe(sourcemaps.init())
    .pipe(minifyJS())
    .pipe(concat("generated-bootstrap.js"))
    .pipe(sourcemaps.write("./"))
    .pipe(dest(paths.bootstrap_scripts.dest));
}

function doStyle() {
  return src(paths.styles.src)
    .pipe(sourcemaps.init())
    .pipe(sass.sync().on("error", sass.logError))
    .pipe(minifyCSS())
    .pipe(concat("generated-styles.css"))
    .pipe(sourcemaps.write("./"))
    .pipe(dest(paths.styles.dest));
}

function doScript() {
  return src(paths.scripts.src)
    .pipe(sourcemaps.init())
    .pipe(minifyJS())
    .pipe(concat("generated-scripts.js"))
    .pipe(sourcemaps.write("./"))
    .pipe(dest(paths.scripts.dest));
}

function watcher() {
  watch("./assets/styles/**/*.scss", doStyle);
  watch("./assets/scripts/**/*.js", doScript);
}

exports.doBootstrapStyle = doBootstrapStyle;
exports.doBootstrapScript = doBootstrapScript;
exports.doStyle = doStyle;
exports.doScript = doScript;
exports.doAll = parallel(doBootstrapStyle, doBootstrapScript, doStyle);
exports.watcher = watcher;
