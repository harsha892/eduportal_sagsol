import axios from 'axios';
import environment from './environment';

class AppService {
    doGetWithOutToken(endpoint) {
        const url = `${environment.apiBase}${endpoint}`;
        return axios.get(url).then(response => {

        }).catch(e => {
            console.log('error in sevice request', e);
        });
    }
    doPostWithOutToken(endpoint, payload) {
        const url = `${environment.apiBase}${endpoint}`;
        return axios.post(url, payload).catch(e => {
            console.log('error in sevice request', e);
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
            swal({
                text: "Something went worng please try again",
                icon: "warning",
                dangerMode: true,
            })
        });

    }
    doPut(endpoint, payload) {
        const headers = JSON.parse(sessionStorage.getItem("vue-session-key")) !== null ?
            { Authorization: "Bearer " + JSON.parse(sessionStorage.getItem("vue-session-key"))["token"] } : false;
        const url = `${environment.apiBase}${endpoint}`;
        return axios.put(url, payload, { headers }).then(function (response) {
            return response;
        }).catch(function (error) {
            swal({
                text: "Something went worng please try again",
                icon: "warning",
                dangerMode: true,
            })
        });

    }
    // doPost(endpoint, payload) {
    //     console.log('payload from losscode search service', payload);
    //     const url = `${this.apiRoot}/${endpoint}`;
    //     return this.http.post(url, payload).pipe(
    //         map((response) => response),
    //         shareReplay(),
    //         catchError(e => {
    //             console.log(e);
    //             return of(null);
    //         }), filter(e => !!e));
    // }

    // doPut(endpoint, payload) {
    //     console.log('payload from losscode search service', payload);
    //     const url = `${this.apiRoot}/${endpoint}`;
    //     return this.http.post(url, payload).pipe(
    //         map((response) => response),
    //         shareReplay(),
    //         catchError(e => {
    //             console.log(e);
    //             return of(null);
    //         }), filter(e => !!e));
    // }
}

export default new AppService();

