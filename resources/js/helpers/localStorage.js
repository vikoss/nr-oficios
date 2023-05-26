import { ROLE_ADMINISTRATOR } from './constants';

const currentUser = () => {
  const local = localStorage.getItem('oficios-me');
  if (!local) {
    return null;
  }
  return JSON.parse(local);
};

const JWT = () => {
  const local = localStorage.getItem('oficios-jwt');
  if (!local) {
    return null;
  }
  return JSON.parse(local).access_token;
};

const isRoleAdmin = () => {
  return currentUser().role?.name === ROLE_ADMINISTRATOR;
};

export { currentUser, JWT, isRoleAdmin };
