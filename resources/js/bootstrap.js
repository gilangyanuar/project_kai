import axios from "axios";
import Alpine from "alpinejs";
import anchor from "@alpinejs/anchor";

window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

Alpine.plugin(anchor);

window.Alpine = Alpine;
Alpine.start();
