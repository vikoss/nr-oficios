import { post, get } from 'axios'
import { JWT } from '../helpers/localStorage'
import { API } from './baseUrl'

const authenticate = (credentials) => new Promise((resolve, reject) => {
  post(`${API}/api/auth/login`, credentials)
    .then(({ data }) => {
      localStorage.setItem('oficios-jwt', JSON.stringify(data));
      resolve(data);
    })
    .catch(({ response }) => reject(response));
});

const me = () => new Promise((resolve, reject) => {
  get(`${API}/api/auth/me`, {
    headers: {
      Authorization: `Bearer ${JWT()}`,
    },
  })
    .then(({ data }) => {
      localStorage.setItem('oficios-me', JSON.stringify(data));
      resolve(data);
    })
    .catch(({ response }) => reject(response));
});

const logout = () => new Promise((resolve, reject) => {
  post(`${API}/api/auth/logout`, {}, {
    headers: {
      Authorization: `Bearer ${JWT()}`,
    },
  })
    .then(({ data }) => {
      localStorage.removeItem('oficios-me');
      localStorage.removeItem('oficios-jwt');
      resolve(data);
    })
    .catch(({ response }) => reject(response));
});

export { authenticate, me, logout };