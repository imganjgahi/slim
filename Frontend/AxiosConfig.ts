import Axios from 'axios'
import {logOut} from './index'
let AxiosInstance = Axios.create({
  headers: {
    'Content-Type': 'application/json',
  },

});

AxiosInstance.interceptors.request.use(
  config => {
      const token = window.localStorage.getItem('Nili');
      console.log("axios")
      if (token) {
        config.headers['Authorization'] = token;
      }
      return config;
  },
  error => {
      return Promise.reject(error);
  });

AxiosInstance.interceptors.response.use(
    (response) => response,
  (error) => {
    if (error.response.status === 401) {
      logOut()
    }
    return Promise.reject(error);;
  }
)

export default AxiosInstance