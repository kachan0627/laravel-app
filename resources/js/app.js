/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'; // Vue Routerの読み込み
Vue.use(VueRouter); // Vue.jsで、Vue Routerを使うように設定
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
 // vue-routerによるルーティング設定
 //import About from './components/About.vue';


 const router = new VueRouter({
     mode: 'history',
     routes: [
         { path: '/home', component: require('./components/List.vue').default, name: 'home' }, // ルートでアクセスしたら、List.vueを表示
         { path: '/create', component: require('./components/Form.vue').default, name: 'create' }, // createにアクセスしたらForm.vueを表示
         { path: '/search', component: require('./components/About.vue').default, name: 'search' },
         { path: '/profile', component: require('./components/Profile.vue').default, name: 'profile' },
         { path: '/profileEdit', component: require('./components/ProfileEdit.vue').default, name: 'profileEdit' },
         { path: '/:id', component: require('./components/Detail.vue').default, name: 'detail' }, // id番号でアクセスしたらDetail.vueを表示
     ]
 });
// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
// Vueのコンポーネント
//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('navbar', require('./components/Navbar.vue').default); //ページ上部にメニューバーを表示させたいので、Navbar.vueを登録

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// Vue.jsの実行
const app = new Vue({
    router,
    el: '#app',
});
