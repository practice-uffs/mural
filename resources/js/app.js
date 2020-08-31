/**
 * Materialize inicializations
 */

document.addEventListener('DOMContentLoaded', function() {
    var selectElems = document.querySelectorAll('select');
    M.FormSelect.init(selectElems);

    var dropdownOptions = {
        coverTrigger: false,
        alignment: 'right'
    };
    var dropdownElems = document.querySelectorAll('.dropdown-trigger');
    M.Dropdown.init(dropdownElems, dropdownOptions);

    var textareaElems = document.querySelectorAll('textarea[data-length]');
    M.CharacterCounter.init(textareaElems);

    var tabElems = document.querySelectorAll('.tabs');
    M.Tabs.init(tabElems);

});

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('base-modal', require('./components/base/Modal.vue').default);
Vue.component('reaction-list', require('./components/ReactionListComponent.vue').default);
Vue.component('comment-list', require('./components/CommentListComponent.vue').default);
Vue.component('feedback-form', require('./components/FeedbackFormComponent.vue').default);
Vue.component('service-form', require('./components/ServiceFormComponent.vue').default);
Vue.component('item-list', require('./components/ItemListComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
