import Vue from "vue";
import axios from "axios";
import VueAxios from "vue-axios";

axios.defaults.baseURL = process.env.BACKEND_URL;
axios.defaults.headers.common['Access-Control-Allow-Origin'] = ['*'];
axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('acess_token');


Vue.use(VueAxios, axios);
