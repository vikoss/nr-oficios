import { post, get } from 'axios'
import { API } from './baseUrl'
import { JWT, currentUser } from '../helpers/localStorage'

const storeNotification = ({ name, document }) => new Promise((resolve, reject) => {
  const body = new FormData()
  body.append('document', document)
  body.append('name', name)
  post(`${API}/api/users/${currentUser().id}/notifications`, body, {
    headers: {
      Authorization: `Bearer ${JWT()}`,
    },
  })
    .then(({ data }) => {
      resolve(data);
    })
    .catch(({ response }) => reject(response));
});

const getNotifications = () => new Promise((resolve, reject) => {
  get(`${API}/api/users/${currentUser().id}/notifications`, {
    headers: {
      Authorization: `Bearer ${JWT()}`,
    },
  })
    .then(({ data }) => {
      resolve(data);
    })
    .catch(({ response }) => reject(response));
});

const getNotification = (notificationId) => new Promise((resolve, reject) => {
  get(`${API}/api/notifications/${notificationId}`, {
    headers: {
      Authorization: `Bearer ${JWT()}`,
    },
  })
    .then(({ data }) => {
      resolve(data);
    })
    .catch(({ response }) => reject(response));
});

const getEmailsNotification = (notificationId) => new Promise((resolve, reject) => {
  get(`${API}/api/notifications/${notificationId}/emails`, {
    headers: {
      Authorization: `Bearer ${JWT()}`,
    },
  })
    .then(({ data }) => {
      resolve(data);
    })
    .catch(({ response }) => reject(response));
});

const notify = (notificationId) => new Promise((resolve, reject) => {
  post(`${API}/api/notifications/${notificationId}/notify`, {
    headers: {
      Authorization: `Bearer ${JWT()}`,
    },
  })
    .then(({ data }) => {
      resolve(data);
    })
    .catch(({ response }) => reject(response));
});

export { storeNotification, notify, getNotifications, getNotification, getEmailsNotification };