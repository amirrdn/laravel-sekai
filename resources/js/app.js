// import './bootstrap';
import Alpine from 'alpinejs';
import jQuery from 'jquery';
import select2 from 'select2';

import 'select2';
import 'select2/dist/css/select2.css';
// Make jQuery available globally
window.$ = jQuery;
select2($);
// Initialize Alpine.js
window.Alpine = Alpine;
Alpine.start();
