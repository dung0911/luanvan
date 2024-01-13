import { createApp } from 'vue'
import App from './App.vue'
import './assets/tailwind/index.css'
import router from './router'
import 'swiper/css';
import store from "./store/index"

createApp(App).use(router).use(store).mount('#app')
