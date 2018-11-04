import { series } from 'gulp';
import browserify from './browserify';
import sass from './sass';
import images from './images';
import fonts from './fonts';

export const build = series(sass, images);
