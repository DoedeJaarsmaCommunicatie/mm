import Vue from 'vue';
import * as axios from 'axios';
import FormView from './views/FormView';

Vue.config.productionTip = false;
// TODO: Implement MailChimp via axios
// 			Headers: Authorization apikey {apikey}

Vue.prototype.$http = axios;

const app = new Vue(
	{
		render: h => h(FormView)
	}
).$mount('#mc-app');
