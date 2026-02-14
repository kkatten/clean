/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});

// Common components
import Header from './components/Header.vue';
app.component('Header', Header);

// Page components
import HomePage from './components/HomePage.vue';
import ServicesPage from './components/ServicesPage.vue';
import ServicePage from './components/ServicePage.vue';
import ForBusinessPage from './components/ForBusinessPage.vue';
import ContactsPage from './components/ContactsPage.vue';
import AboutPage from './components/AboutPage.vue';

app.component('home-page', HomePage);
app.component('about-page', AboutPage);
app.component('services-page', ServicesPage);
app.component('service-page', ServicePage);
app.component('for-business-page', ForBusinessPage);
app.component('contacts-page', ContactsPage);

console.log('Vue app initialized, all page components registered');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

// Монтируем Vue на элемент #app
const mountApp = () => {
    const appElement = document.getElementById('app');
    if (appElement) {
        console.log('Mounting Vue app on #app element');
        console.log('App element content before mount:', appElement.innerHTML.substring(0, 200));
        app.mount('#app');
        console.log('Vue app mounted successfully');
    } else {
        console.warn('Element #app not found');
    }
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', mountApp);
} else {
    mountApp();
}
