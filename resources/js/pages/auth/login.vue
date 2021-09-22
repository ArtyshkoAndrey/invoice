<template>
  <div class="row flex-row login-form align-items-center">
    <div class="col-12">
      <div class="row justify-content-center">
        <div class="col-auto">
          <vs-input v-model="form.email" placeholder="Email">
            <template v-if="validEmail" #message-success>
              Email введён правильно
            </template>
            <template v-if="!validEmail && form.email !== ''" #message-danger>
              Email введён неправильно
            </template>
          </vs-input>
        </div>
        <div class="col-auto">
          <vs-input v-model="form.password" placeholder="Password" type="password">
            <template v-if="validPassword" #message-danger>
              Менее 6 символов
            </template>
          </vs-input>
        </div>
        <div class="col-auto">
          <vs-button
            :loading="form.busy"
            success
            @click="login"
          >
            Войти
          </vs-button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Form from 'vform'
import Cookies from 'js-cookie'

export default {
  name: 'Login',
  middleware: 'guest',
  metaInfo() {
    return {title: 'Вход в аккаунт'}
  },
  data: () => ({
    form: new Form({
      email: '',
      password: ''
    }),
    remember: false
  }),
  computed: {
    validEmail() {
      return /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(this.form.email)
    },
    validPassword() {
      return this.form.password.length < 6 && this.form.password !== ''
    }
  },
  methods: {
    async login() {
      // Submit the form.
      const {data} = await this.form.post('/api/login')
        .then(r => {
          console.log(r.data)
        })
        .catch(e => {
          this.$vs.notification({
            title: 'Ошибка авторизации',
            text: 'Сервер не смог обработать ответ и выдал ошибку. Попробуйте войти снова или обратитесь к администратору'
          })
        })
      // Save the token.
      this.$store.dispatch('auth/saveToken', {
        token: data.token,
        remember: this.remember
      })
      // Fetch the user.
      await this.$store.dispatch('auth/fetchUser')
      // Redirect home.
      this.redirect()
    },
    redirect() {
      const intendedUrl = Cookies.get('intended_url')
      if (intendedUrl) {
        Cookies.remove('intended_url')
        this.$router.push({path: intendedUrl})
      } else {
        this.$router.push({name: 'home'})
      }
    }
  }
}
</script>

<style scoped>

</style>
