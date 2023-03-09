import './bootstrap';
import {createApp} from "vue";
import App from "./App.vue";
import {router} from "./router/index.js"
import "bootstrap/scss/bootstrap.scss"
import "bootstrap/js/dist/collapse.js"
import "bootstrap/js/dist/dropdown.js"
import "../css/app.scss"
import vueClickOutsideElement from 'vue-click-outside-element'

const app = createApp(App);

import { library } from "@fortawesome/fontawesome-svg-core"
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faTwitter, faFacebookF, faInstagram, faLinkedin } from '@fortawesome/free-brands-svg-icons'
import { faChevronDown, faChevronUp, faX, faCircleUser, faTrash} from "@fortawesome/free-solid-svg-icons";
import {faPenToSquare} from "@fortawesome/free-regular-svg-icons";

library.add(faTwitter, faFacebookF, faInstagram, faLinkedin, faChevronDown, faChevronUp, faX, faCircleUser, faTrash, faPenToSquare)
app.component('font-awesome-icon', FontAwesomeIcon)
app.use(router)
app.use(vueClickOutsideElement)
app.mount("#app");
