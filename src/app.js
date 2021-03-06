import { createApp } from 'vue'
import ElementPlus from 'element-plus';
import 'element-plus/lib/theme-chalk/index.css';
import locale from 'element-plus/lib/locale/lang/ru'
import 'dayjs/locale/ru'
import App from './App.vue'

createApp(App).use(ElementPlus, {locale}).mount('#app')