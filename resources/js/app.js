import './bootstrap';

import {createApp} from 'vue'
import router from '@/router/routes'
// import ComponentA from './components/ComponentA.vue';
import App from '@/components/App.vue';

// const app = createApp({});

// app.component('App', App);

// app.mount("#app");
// new Vue({  
//   router,
//   ...App
// })

createApp(App).use(router).mount("#app")