import { post, get, put } from 'axios';

const storeEmails = ({ notificationId, emails }) => new Promise((resolve, reject) => {
  post(`http://localhost:9009/api/notifications/${notificationId}/emails`, emails, {
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
  get(`http://localhost:9009/api/emails/${emailId}`, {
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
  put(`http://localhost:9009/api/emails/${email.id}`, email, {
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