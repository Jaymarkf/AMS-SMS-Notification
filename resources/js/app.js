require('./bootstrap');

import Vue from 'vue';
import student from './components/Students.vue';

const appf = new Vue({
el: '#app',
components: {student},
});