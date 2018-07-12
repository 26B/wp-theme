/* eslint-disable guard-for-in */
/* eslint-disable no-restricted-syntax */
import cssCache from './modules/css-cache';

const cachedStyles = window.cachedStyles || {};
for (const key in cachedStyles) {
  cssCache.require(key, cachedStyles[key]);
}
