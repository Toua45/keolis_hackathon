/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.scss');

// eslint-disable-next-line import/no-extraneous-dependencies
require('@fortawesome/fontawesome-free/css/all.min.css');
// eslint-disable-next-line import/no-extraneous-dependencies
require('@fortawesome/fontawesome-free/js/all.js');

// eslint-disable-next-line import/no-extraneous-dependencies
require('@fortawesome/fontawesome-free/css/all.min.css');
// eslint-disable-next-line import/no-extraneous-dependencies
require('@fortawesome/fontawesome-free/js/all.js');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
const $ = require('jquery');

// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything
require('bootstrap');

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');

$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});

