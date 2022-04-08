import { get } from 'axios'
import { API } from './baseUrl'

const getAllUserEmails = () => new Promise((resolve, reject) => {
  get(`${API}/api/users?fields=email`, {
    headers: {
      Authorization: 'Bearer ${JWT()}',
    },
  })
    .then(({ data }) => {
      resolve(data);
    })
    .catch(({ response }) => reject(response));
});

export { getAllUserEmails };