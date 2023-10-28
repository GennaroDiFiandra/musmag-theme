"use strict";

const gulp = require("gulp");
const { src, dest, watch, series, parallel } = require("gulp");
const concat = require("gulp-concat");
const sourcemaps = require("gulp-sourcemaps");
const sass = require("gulp-sass")(require("sass"));

const paths = {
  styles: {
    src: ["./assets/styles/imports.scss",],
    dest: "./",
  },
  scripts: {
    src: ["./assets/scripts/main-menu.js"],
    dest: "./",
  },
};

function doStyle() {
  return src(paths.styles.src)
    .pipe(sourcemaps.init())
    .pipe(sass.sync().on("error", sass.logError))
    .pipe(concat("generated-styles.css"))
    .pipe(sourcemaps.write("./assets/styles"))
    .pipe(dest(paths.styles.dest));
}

function doScript() {
  return src(paths.scripts.src)
    .pipe(sourcemaps.init())
    .pipe(concat("generated-scripts.js"))
    .pipe(sourcemaps.write("./assets/scripts"))
    .pipe(dest(paths.scripts.dest));
}

function watcher() {
  watch("./assets/styles/**/*.scss", doStyle);
  watch("./assets/scripts/**/*.js", doScript);
}

exports.doStyle = doStyle;
exports.doScript = doScript;
exports.watcher = watcher;
