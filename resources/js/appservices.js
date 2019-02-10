import axios from 'axios';
import environment from './environment';

const serviceRequests = [
    {
        title: "userlogin",
        url: "login"
    },
    {
        title: "createnewuser",
        url: "users/new"
    },
    {
        title: "userlogin",
        url: "users/new"
    }
]
class AppService {
    doGet(endpoint) {
        const url = `${environment.apiBase}${endpoint}`;
        return axios.get(url).catch(e => {
            console.log('error in sevice request', e);
        });
    }
    doPost(endpoint, payload) {
        const url = `${environment.apiBase}${endpoint}`;
        return axios.post(url, payload).catch(e => {
            console.log('error in sevice request', e);
        })

    }    // doPost(endpoint, payload) {
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