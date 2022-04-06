import { post, get } from 'axios'
import { JWT, currentUser } from '../helpers/localStorage'
import { API } from './baseUrl'

const signDocument = (document) => new Promise((resolve, reject) => {
  const body = new FormData()
  body.append('pdf', document)
  post(`${API}/api/sign`, body, {
    headers: {
      Authorization: `Bearer ${JWT()}`,
    },
  })
    .then(({ data }) => {
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
      resolve(data);
    })
    .catch(({ response }) => reject(response));
});

export { signDocument, me };