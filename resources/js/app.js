
import './bootstrap';
import router from './router';
import { createApp } from 'vue';
import store from './store';
const app = createApp({});
app.use(router)
app.use(store)
app.mount('#app');
