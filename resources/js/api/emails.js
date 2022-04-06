import { post, get, put } from 'axios'
import { API } from './baseUrl'

const storeEmails = ({ notificationId, emails }) => new Promise((resolve, reject) => {
  post(`${API}/api/notifications/${notificationId}/emails`, emails, {
    headers: {
      Authorization: 'Bearer ${JWT()}',
    },
  })
    .then(({ data }) => {
      resolve(data);
    })
    .catch(({ response }) => reject(response));
});

const getEmail = (emailId) => new Promise((resolve, reject) => {
  get(`${API}/api/emails/${emailId}`, {
    headers: {
      Authorization: 'Bearer ${JWT()}',
    },
  })
    .then(({ data }) => {
      resolve(data);
    })
    .catch(({ response }) => reject(response));
});

const updateEmail = (email) => new Promise((resolve, reject) => {
  put(`${API}/api/emails/${email.id}`, email, {
    headers: {
      Authorization: 'Bearer ${JWT()}',
    },
  })
    .then(({ data }) => {
      resolve(data);
    })
    .catch(({ response }) => reject(response));
});

export { storeEmails, getEmail, updateEmail };