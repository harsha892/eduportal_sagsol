import axios from 'axios';
import environment from './environment';

class AppService {
    doGetWithOutToken(endpoint) {
        const url = `${environment.apiBase}${endpoint}`;
        return axios.get(url).then(response => {
            return response
        }).catch(error => {
            throw error.response.data
        });
    }
    doPostWithOutToken(endpoint, payload) {
        const url = `${environment.apiBase}${endpoint}`;
        return axios.post(url, payload).then(response => {
            return response
        }).catch(error => {
            throw error.response.data
        })

    }
    doGet(endpoint) {
        const headers = JSON.parse(sessionStorage.getItem("vue-session-key")) !== null ?
            { Authorization: "Bearer " + JSON.parse(sessionStorage.getItem("vue-session-key"))["token"] } : false;
        const url = `${environment.apiBase}${endpoint}`;
        return axios.get(url, { headers }).then(function (response) {
            return response;
        }).catch(function (error) {
            console.log(error.response);
            if (error.response.status === 401) {
                swal({
                    text: "Something went worng please login again",
                    icon: "warning",
                    dangerMode: true,
                }).then(function () {
                    sessionStorage.clear();
                    window.location.replace("http://" + window.location.hostname + '/portal');
                });
            } else {
                swal({
                    text: "Something went worng please try again",
                    icon: "warning",
                    dangerMode: true,
                })
            }
        })
    }
    doPost(endpoint, payload) {
        const headers = JSON.parse(sessionStorage.getItem("vue-session-key")) !== null ?
            { Authorization: "Bearer " + JSON.parse(sessionStorage.getItem("vue-session-key"))["token"] } : false;
        const url = `${environment.apiBase}${endpoint}`;
        return axios.post(url, payload, { headers }).then(function (response) {
            return response;
        }).catch(function (error) {
            const statusCode = error.response.status;
            throw error.response.data
        });

    }
    doPut(endpoint, payload) {
        const headers = JSON.parse(sessionStorage.getItem("vue-session-key")) !== null ?
            { Authorization: "Bearer " + JSON.parse(sessionStorage.getItem("vue-session-key"))["token"] } : false;
        const url = `${environment.apiBase}${endpoint}`;
        return axios.put(url, payload, { headers }).then(function (response) {
            return response;
        }).catch(function (error) {
            throw error.response.data

        });
    }
    doDelete(endpoint, payload) {
        const headers = JSON.parse(sessionStorage.getItem("vue-session-key")) !== null ?
            { Authorization: "Bearer " + JSON.parse(sessionStorage.getItem("vue-session-key"))["token"] } : false;
        const url = `${environment.apiBase}${endpoint}`;
        return axios.delete(url, payload, { headers }).then(function (response) {
            return response;
        }).catch(function (error) {
            throw error.response.data

        });
    }
}

export default new AppService();

