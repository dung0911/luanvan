import { createApp } from 'vue'
import App from './App.vue'
import './assets/tailwind/index.css'
import router from './router'
import 'swiper/css';
import store from "./store/index"
import 'aos/dist/aos.css'
import AOS from 'aos'

createApp(App).use(router).use(store).mount('#app').use(AOS)
