import { post, get } from 'axios';

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

const me = () => new Promise((resolve, reject) => {
  get('http://localhost:9009/api/auth/me', {
    headers: {
      Authorization: `Bearer ${JWT()}`,
    },
  })
    .then(({ data }) => {
      resolve(data);
    })
    .catch(({ response }) => reject(response));
});

export { storeEmails, me };