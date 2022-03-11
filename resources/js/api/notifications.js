import { post, get } from 'axios';

const userId = 1

const storeNotification = (notification) => new Promise((resolve, reject) => {
  const body = new FormData()
  body.append('document', notification)
  post(`http://localhost:9009/api/users/${userId}/notifications`, body, {
    headers: {
      Authorization: 'Bearer ${JWT()}',
    },
  })
    .then(({ data }) => {
      resolve(data);
    })
    .catch(({ response }) => reject(response));
});

const getNotifications = () => new Promise((resolve, reject) => {
  get(`http://localhost:9009/api/users/${userId}/notifications`, {
    headers: {
      Authorization: 'Bearer ${JWT()}',
    },
  })
    .then(({ data }) => {
      resolve(data);
    })
    .catch(({ response }) => reject(response));
});

const getNotification = (notificationId) => new Promise((resolve, reject) => {
  get(`http://localhost:9009/api/notifications/${notificationId}`, {
    headers: {
      Authorization: 'Bearer ${JWT()}',
    },
  })
    .then(({ data }) => {
      resolve(data);
    })
    .catch(({ response }) => reject(response));
});

const getEmailsNotification = (notificationId) => new Promise((resolve, reject) => {
  get(`http://localhost:9009/api/notifications/${notificationId}/emails`, {
    headers: {
      Authorization: 'Bearer ${JWT()}',
    },
  })
    .then(({ data }) => {
      resolve(data);
    })
    .catch(({ response }) => reject(response));
});

const notify = (notificationId) => new Promise((resolve, reject) => {
  post(`http://localhost:9009/api/notifications/${notificationId}/notify`, {
    headers: {
      Authorization: 'Bearer ${JWT()}',
    },
  })
    .then(({ data }) => {
      resolve(data);
    })
    .catch(({ response }) => reject(response));
});

export { storeNotification, notify, getNotifications, getNotification, getEmailsNotification };