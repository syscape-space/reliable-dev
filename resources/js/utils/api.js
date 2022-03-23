import axios from "axios";
const env = "local" // can be local or production
let api = axios.create({
	baseURL: ( env == "local" ? "http://localhost/reliable/api" : 'https://law-mawthuq.com/reliable/api'),
	withCredentials: false ,
	'Content-Type': 'multipart/form-data' ,
	Authorization: "Bearer " + localStorage.getItem("token"),
   	accept: "application/json",
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