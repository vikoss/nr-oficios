import { get } from 'axios'
import { API } from './baseUrl'
import { JWT, currentUser } from '../helpers/localStorage'

const getAllEmails = () => new Promise((resolve, reject) => {
  get(`${API}/api/users?fields=email`, {
    headers: {
      Authorization: 'Bearer ${JWT()}',
    },
  })
    .then(({ data }) => {
      resolve(data);
    })
    .catch(({ response }) => reject(response));
})

const getInbox = (page = 1) => new Promise((resolve, reject) => {
  get(`${API}/api/users/${currentUser().id}/inbox?page=${page}`, {
    headers: {
      Authorization: `Bearer ${JWT()}`,
    },
  })
    .then(({ data }) => {
      resolve(data);
    })
    .catch(({ response }) => reject(response));
})

export { getAllEmails, getInbox }