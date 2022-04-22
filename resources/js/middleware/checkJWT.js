import { me } from './../api/authenticate'

export default async ({ next, router }) => {
  try {
    await me()
  } catch (error) {
    localStorage.removeItem('oficios-me')
    localStorage.removeItem('oficios-jwt')
    return router.push({ name: 'Login' })
  }
  return next()
}