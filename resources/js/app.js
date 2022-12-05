import './bootstrap';
import { createApp } from 'vue';
import router from './routes';
import index from './components/index.vue';
import '../sass/app.scss'

const app = createApp(index);
app.use(router);

app.mount('#app');

app.config.devtools = true;