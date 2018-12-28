/* eslint-disable */
/* eslint-disable import/first */
/* eslint-disable import/no-extraneous-dependencies */
/* eslint import/no-unresolved: [2, { ignore: ['^glob:'] }] */

/**
 * Setup webpack public path
 * to enable lazy-including of
 * js chunks
 *
 */
import './vendor/webpack.publicPath';

/**
 * Import
 * fonts
 *
 */
import 'glob:../fonts/**/*.{eot,otf,ttf,woff,woff2,svg}';
/**
 * Import
 * images
 *
 */
import 'glob:../img/**/*.{gif,ico,jpg,jpeg,png,webp}';
/**
 * Import
 * sass
 *
 */
import '../scss/main.scss';
/**
 * Import
 * svgs
 *
 */
import 'glob:../svg/**/*.svg';

/**
 * Your theme's js starts
 * here...
 */


import './scripts/home';
/*import './scripts/footermap';*/
import './scripts/rehber';
import './utils/stretch.text';

/* eslint no-console: 0 */

