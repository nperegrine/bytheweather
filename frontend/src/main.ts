import { createApp } from "vue";
import { createPinia } from "pinia";

import App from "./App.vue";
import router from "./router";

import "./assets/main.css";

// Axios
import axios from "./plugins/axios";
import VueAxios from "vue-axios";

// Ant design vue
import Antd from "ant-design-vue";
import "ant-design-vue/dist/reset.css";

// Bootstrap
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";

const pinia = createPinia();
const app = createApp(App);

app.use(Antd);
app.use(VueAxios, axios);
app.use(pinia);
app.use(router);

app.mount("#app");
