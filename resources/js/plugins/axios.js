import axios from 'axios'
import store from '~/store'
import router from '~/router'
import Swal from 'sweetalert2'

// Request interceptor
axios.interceptors.request.use(request => {
  const token = store.getters['auth/token']

  if (token) {
    request.headers.common.Authorization = `Bearer ${token}`
  }

  const locale = store.getters['lang/locale']
  if (locale) {
    request.headers.common['Accept-Language'] = locale
  }

  // request.headers['X-Socket-Id'] = Echo.socketId()

  return request
})

// Response interceptor
axios.interceptors.response.use(response => response, error => {
  const { status } = error.response

  if (status >= 500) {
    Swal.fire({
      icon: 'error',
      title: 'Ошибка',
      text: 'Произошла непредвиденная ошибка на сервере',
      reverseButtons: true,
      confirmButtonText: 'Окей',
      cancelButtonText: 'Отмена'
    })
  }

  if (status === 401 && store.getters['auth/check']) {
    Swal.fire({
      icon: 'warning',
      title: 'Аутентификация не актуальная',
      text: 'Перезайдите в аккаунт для продолжения',
      reverseButtons: true,
      confirmButtonText: 'Окей',
      cancelButtonText: 'Отмена'
    }).then(() => {
      store.commit('auth/LOGOUT')

      router.push({ name: 'login' })
    })
  }

  return Promise.reject(error)
})
