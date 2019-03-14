window.Vue = require('vue');
import axios from 'axios';
import environment from './environment';
const accessToken = localStorage.getItem("@token") || "";
let headers;
if (accessToken) {
    headers = { Authorization: "Bearer " + JSON.parse(localStorage.getItem("@token")) }
}

class BaseService {
    doGet(endpoint) {
        console.log({ headers });
        const url = `${environment.apiBase}${endpoint}`;
        return axios.get(url, { headers }).then(function (response) {
            return response;
        }).catch(function (error) {
            console.log(error.response);
            // if (error.response.status === 401) {
            //     swal({
            //         text: "Something went worng please login again",
            //         icon: "warning",
            //         dangerMode: true,
            //     }).then(function () {
            //         // sessionStorage.clear();
            //         // window.location.replace("http://" + window.location.hostname + '/portal');
            //     });
            // } else {
            //     swal({
            //         text: "Something went worng please try again",
            //         icon: "warning",
            //         dangerMode: true,
            //     })
            // }
        })
    }
    doPost(endpoint, payload) {
        const url = `${environment.apiBase}${endpoint}`;
        return axios.post(url, payload, { headers }).then(function (response) {
            return response;
        }).catch(function (error) {
            const statusCode = error.response.status;
            throw error.response.data
        });

    }
    doPut(endpoint, payload) {
        const url = `${environment.apiBase}${endpoint}`;
        return axios.put(url, payload, { headers }).then(function (response) {
            return response;
        }).catch(function (error) {
            throw error.response.data

        });
    }
    doDelete(endpoint, payload) {
        const url = `${environment.apiBase}${endpoint}`;
        return axios.delete(url, payload, { headers }).then(function (response) {
            return response;
        }).catch(function (error) {
            throw error.response.data

        });
    }
}

export default new BaseService();

