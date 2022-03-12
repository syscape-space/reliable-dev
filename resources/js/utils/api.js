import axios from "axios";

let api = axios.create({
	baseURL: 'http://law-mawthuq.com/reliable/public/api/v2',
	withCredentials: false ,
	'Content-Type': 'multipart/form-data'
})

api.interceptors.request.use(
	function(config) {
		const token = localStorage.getItem("token")
		if (token) {
			config.headers["Authorization"] = 'Bearer ' + token
		}
		return config;
	},
	function(error) {
		return Promise.reject(error);
	}
);



export default api