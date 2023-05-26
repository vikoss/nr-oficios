import { get } from 'axios'
import { API } from './baseUrl'
import { JWT } from '../helpers/localStorage'

const fetchDepartaments = () => new Promise((resolve, reject) => {
  get(`${API}/api/departaments`, {
    headers: {
      Authorization: `Bearer ${JWT()}`,
    },
  })
    .then(({ data }) => {
      resolve(data);
    })
    .catch(({ response }) => reject(response));
});

const fetchDirections = () => new Promise((resolve, reject) => {
  get(`${API}/api/directions`, {
    headers: {
      Authorization: `Bearer ${JWT()}`,
    },
  })
    .then(({ data }) => {
      resolve(data);
    })
    .catch(({ response }) => reject(response));
});

const fetchRoles = () => new Promise((resolve, reject) => {
  get(`${API}/api/roles`, {
    headers: {
      Authorization: `Bearer ${JWT()}`,
    },
  })
    .then(({ data }) => {
      resolve(data);
    })
    .catch(({ response }) => reject(response));
});


const fetchPositions = () => new Promise((resolve, reject) => {
  get(`${API}/api/positions`, {
    headers: {
      Authorization: `Bearer ${JWT()}`,
    },
  })
    .then(({ data }) => {
      resolve(data);
    })
    .catch(({ response }) => reject(response));
});

export {
  fetchDepartaments,
  fetchDirections,
  fetchRoles,
  fetchPositions
}
