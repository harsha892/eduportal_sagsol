import axios from 'axios';
import environment from './environment';

class AuthService {
    doAuthGet(endpoint) {
        const url = `${environment.apiBase}${endpoint}`;
        return axios.get(url).then(response => {
            return response
        }).catch(error => {
            throw error.response.data
        });
    }
    doAuthPost(endpoint, payload) {
        const url = `${environment.apiBase}${endpoint}`;
        return axios.post(url, payload).then(response => {
            return response
        }).catch(error => {
            throw error.response.data
        })

    }
}

export default new AuthService();

