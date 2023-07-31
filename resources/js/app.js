import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js';
import {registerComponents} from './components';

const app = createApp({});
registerComponents(app);

app.mount('#app');
