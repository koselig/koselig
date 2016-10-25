/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap.es6';

/**
 * Setup the routes of the application to allow for class-based
 * controllers. CommonController is always fired regardless of page classes,
 * class names should be the camel cased name, ie. post-25 -> Post25.
 */

import Router from './util/Router.es6';
import CommonController from './controllers/CommonController.es6';
import PostController from './controllers/PostController.es6';

document.addEventListener('DOMContentLoaded', () => new Router([
    new CommonController,
    new PostController
]).loadEvents());

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

// Vue.component('example', require('./components/Example.vue'));

// const app = new Vue({
//    el: '#app'
// });
