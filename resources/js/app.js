
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('acl', require('./components/ACLComponent.vue'));
Vue.component('acl-group', require('./components/ACLGroupComponent.vue'));

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

import VueRecaptcha from 'vue-recaptcha';
Vue.component('VueRecaptcha', VueRecaptcha);

// import Vue from 'vue';
import vSelect from 'vue-select';
Vue.component('v-select', vSelect);

// import Select2Component
// import Select2 from 'v-select2-component';
// Vue.component('Select2', Select2);

// https://vue-multiselect.js.org/#sub-getting-started
import Multiselect from 'vue-multiselect'
Vue.component('multiselect', Multiselect)

import VueCkeditor from 'vue-ckeditor2';
Vue.component('VueCkeditor', VueCkeditor);

import BootstrapVue from 'bootstrap-vue';
Vue.use(BootstrapVue);

// https://www.npmjs.com/package/vuejs-datepicker#disabled-dates
// import Datepicker from 'vuejs-datepicker';
import Datepicker from 'vuejs-datepicker';
Vue.component('Datepicker', Datepicker);
// Vue.use(Datepicker)

// https://www.npmjs.com/package/vue-moment
Vue.use(require('vue-moment'));

// import moment from 'moment';
// import moment, * as moments from 'moment';

// import VueMomentLib from 'vue-moment-lib';
// Vue.use(VueMomentLib);

// import Moment from 'moment';
// import { extendMoment } from 'moment-range';
// const moment = extendMoment(Moment);

import round from 'vue-round-filter';

import PayPal from 'vue-paypal-checkout';
Vue.component('paypal-checkout', PayPal);


// import ES6 style
// import {VueMasonryPlugin} from 'vue-masonry';
// or using CJS 
const VueMasonryPlugin = require('vue-masonry').VueMasonryPlugin
Vue.use(VueMasonryPlugin)

Vue.component('pagination', require('laravel-vue-pagination'));

import draggable from 'vuedraggable';
Vue.component('draggable', draggable);

import VueMatchHeights from 'vue-match-heights'; 
Vue.use(VueMatchHeights, {
  disabled: [768], // Optional: default viewports widths to disabled resizing on. Can be overridden per usage
});

// https://github.com/greyby/vue-spinner
// import PulseLoader from 'vue-spinner/src/PulseLoader.vue';
Vue.component('pulse-loader', require('vue-spinner/src/PulseLoader.vue'));

import Vue2Filters from 'vue2-filters'
Vue.use(Vue2Filters)

// import VueCountdown from '@chenfengyuan/vue-countdown';
// Vue.component(VueCountdown.name, VueCountdown);

// https://github.com/getanwar/vuejs-countdown
import Countdown from 'vuejs-countdown'
Vue.component('Countdown', Countdown);

// https://github.com/TriDiamond/vuejs-countdown-timer
// import VueCountdownTimer from 'vuejs-countdown-timer'
// Vue.component('VueCountdownTimer', VueCountdownTimer);

// // GOOGLE MAP
// import * as VueGoogleMaps from 'vue2-google-maps'

// Vue.use(VueGoogleMaps, {
//   load: {
//     key: 'AIzaSyCVfiG0WBDC223SzY65Rnj8VWZa3myVPoA',
//     libraries: 'places', // This is required if you use the Autocomplete plugin
//   },
// });
// // GOOGLE MAP

Vue.component('login', require('./components/LoginComponent.vue'));
Vue.component('register', require('./components/RegisterComponent.vue'));
Vue.component('passwordreset', require('./components/PasswordResetComponent.vue'));
Vue.component('passwordresetform', require('./components/PasswordResetFormComponent.vue'));
Vue.component('homepage', require('./components/HomeComponent.vue'));
Vue.component('myprofile', require('./components/MyProfileComponent.vue'));

Vue.component('blog', require('./components/site/BlogComponent.vue'));
Vue.component('blog-post', require('./components/site/BlogPostComponent.vue'));
Vue.component('blog-category-posts', require('./components/site/BlogCategoryPostsComponent.vue'));
Vue.component('blog-comment-form', require('./components/site/BlogCommentsFormComponent.vue'));

Vue.component('recent-posts', require('./components/site/RecentPostsComponent.vue'));
Vue.component('recent-posts-max-comments', require('./components/site/RecentPostsMaxCommentsComponent.vue'));

Vue.component('steps', require('./components/site/StepsComponent.vue'));
Vue.component('services', require('./components/site/ServicesComponent.vue'));

Vue.component('faqs', require('./components/site/FaqsComponent.vue'));

Vue.component('about-us', require('./components/site/AboutUsComponent.vue'));
Vue.component('testimonials', require('./components/site/TestimonialsComponent.vue'));
Vue.component('contact-us', require('./components/site/ContactUsComponent.vue'));
Vue.component('contact-us-form', require('./components/site/ContactUsFormComponent.vue'));

Vue.component('page-how-it-works', require('./components/site/PageHowItWorksComponent.vue'));
Vue.component('page-meet-and-greet', require('./components/site/PageMeetAndGreetComponent.vue'));

Vue.component('parkings', require('./components/site/ParkingsComponent.vue'));
Vue.component('parking-model', require('./components/site/ParkingModelComponent.vue'));
Vue.component('booking', require('./components/site/BookingComponent.vue'));
Vue.component('parking-reviews', require('./components/site/ParkingReviewsComponent.vue'));

Vue.component('review', require('./components/site/ReviewComponent.vue'));

Vue.component('parking-history', require('./components/ParkingHistoryComponent.vue'));

Vue.component('my-bookings', require('./components/site/MyBookingsComponent.vue'));
Vue.component('my-booking-history', require('./components/site/MyBookingHistoryComponent.vue'));

// Vue.component('customer-reviews', require('./components/site/CustomerReviewsComponent.vue'));



Vue.component('faqs-form', require('./components/FaqsFormComponent.vue'));

Vue.component('dashboard', require('./components/DashboardComponent.vue'));
Vue.component('settings', require('./components/SettingsComponent.vue'));
Vue.component('profile', require('./components/ProfileComponent.vue'));
Vue.component('change-password', require('./components/ChangePasswordComponent.vue'));
Vue.component('social-setup', require('./components/setting/SocialSetupComponent.vue'));

Vue.component('users', require('./components/UsersComponent.vue'));
Vue.component('user-parkings', require('./components/UserParkingsComponent.vue'));

Vue.component('blog-category-setup', require('./components/setting/BlogCategorySetupComponent.vue'));
Vue.component('blog-post-form', require('./components/BlogPostFormComponent.vue'));

Vue.component('steps-form', require('./components/StepsFormComponent.vue'));
Vue.component('services-form', require('./components/ServicesFormComponent.vue'));
Vue.component('pags-form', require('./components/PagesFormComponent.vue'));


Vue.component('setup-airport', require('./components/AirportComponent.vue'));
Vue.component('setup-cancellation', require('./components/SetupCancellationComponent.vue'));
Vue.component('setup-parking-services', require('./components/SetupParkingServicesComponent.vue'));
Vue.component('setup-parking-types', require('./components/SetupParkingTypesComponent.vue'));
Vue.component('setup-airport-terminals', require('./components/SetupAirportTerminalsComponent.vue'));
Vue.component('setup-parking-tabs', require('./components/SetupParkingTabsComponent.vue'));
Vue.component('setup-titles', require('./components/SetupTitlesComponent.vue'));

Vue.component('parking', require('./components/ParkingComponent.vue'));
Vue.component('parking-tabs', require('./components/ParkingTabsComponent.vue'));

// Vue.component('order-taken-remarks-model', require('./components/OrderTakenRemarksModelComponent.vue'));
// Vue.component('order-completed-remarks-model', require('./components/OrderCompletedRemarksModelComponent.vue'));
// Vue.component('order-view-model', require('./components/OrderViewModelComponent.vue'));

const app = new Vue({
    el: '#app'
});
