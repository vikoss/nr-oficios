import { post, get } from 'axios';
import { JWT } from '../helpers/localStorage';

const authenticate = (credentials) => new Promise((resolve, reject) => {
  post('http://127.0.0.1:9009/api/auth/login', credentials)
    .then(({ data }) => {
      localStorage.setItem('oficios-jwt', JSON.stringify(data));
      resolve(data);
    })
    .catch(({ response }) => reject(response));
});

const me = () => new Promise((resolve, reject) => {
  get('http://127.0.0.1:9009/api/auth/me', {
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
  post('http://127.0.0.1:9009/api/auth/logout', {}, {
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