<template>
  <div class="row flex-row login-form align-items-center">
    <div class="col-12">
      <div class="row justify-content-center">
        <div class="col-md-auto col-10">
          <vs-input v-model="form.email" class="w-100" placeholder="Email">
            <template v-if="validEmail" #message-success>
              Email введён правильно
            </template>
            <template v-if="!validEmail && form.email !== ''" #message-danger>
              Email введён неправильно
            </template>
          </vs-input>
        </div>
        <div class="col-md-auto col-10 mt-3 mt-md-0">
          <vs-input v-model="form.password" placeholder="Password" type="password">
            <template v-if="validPassword" #message-danger>
              Менее 6 символов
            </template>
          </vs-input>
        </div>
        <div class="col-md-auto col-10">
          <vs-button
            :loading="form.busy"
            success
            class="d-block w-100 mt-3 mt-md-auto"
            style="margin: 0; padding: 4px 13px;"
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
  metaInfo () {
    return { title: 'Вход в аккаунт' }
  },
  data: () => ({
    form: new Form({
      email: '',
      password: ''
    }),
    remember: false
  }),
  computed: {
    validEmail () {
      return /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(this.form.email)
    },
    validPassword () {
      return this.form.password.length < 6 && this.form.password !== ''
    }
  },
  methods: {
    async login () {
      if (this.validEmail && !this.validPassword) {
        // Submit the form.
        await this.form.post('/api/login')
          .then(({ data }) => {
            // Save the token.
            this.$store.dispatch('auth/saveToken', {
              token: data.token,
              remember: this.remember
            })
            // Fetch the user.
            this.$store.dispatch('auth/fetchUser')
            // Redirect home.
            this.redirect()
          })
          .catch(e => {
            if (e.response.data) {
              Object.keys(e.response.data.errors).forEach((key) => {
                this.$vs.notification({
                  title: key.capitalize(),
                  text: e.response.data.errors[key]
                })
              })
            } else {
              this.$vs.notification({
                title: 'Ошибка авторизации',
                text: 'Сервер не смог обработать ответ и выдал ошибку. Попробуйте войти снова или обратитесь к администратору'
              })
            }
          })
      }
    },
    redirect () {
      const intendedUrl = Cookies.get('intended_url')
      if (intendedUrl) {
        Cookies.remove('intended_url')
        this.$router.push({ path: intendedUrl })
      } else {
        this.$router.push({ name: 'dashboard.index' })
      }
    }
  }
}
</script>

<style scoped>

</style>
