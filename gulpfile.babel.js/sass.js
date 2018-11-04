import { dest, src } from 'gulp';
import autoprefixer from 'autoprefixer';
// import browserSync from 'browser-sync';
import gulpIf from 'gulp-if';
import nano from 'cssnano';
import pixrem from 'pixrem';
import plumber from 'gulp-plumber';
import postcss from 'gulp-postcss';
import postcssScss from 'postcss-scss';
import reporter from 'postcss-reporter';
import gulpSass from 'gulp-sass';
import sourcemaps from 'gulp-sourcemaps';
import stylelint from 'stylelint';
import config from './config';
// import images from './images';

const preprocessors = [
  stylelint(),
  reporter({
    clearMessages: true,
    throwError: false
  })
];

const postprocessors = [pixrem(), autoprefixer(config.autoprefixer), nano()];

export const sass = () =>
  src(config.sass.src)
    .pipe(plumber())
    .pipe(gulpIf(config.environment.debug, sourcemaps.init()))
    .pipe(postcss(preprocessors, { syntax: postcssScss }))
    .pipe(gulpSass(config.sass.settings))
    .pipe(postcss(postprocessors))
    .pipe(gulpIf(config.environment.debug, sourcemaps.write()))
    .pipe(dest(config.sass.dest));
    // .pipe(
    //   browserSync.reload({
    //     stream: true
    //   })
    // );

export default sass;
