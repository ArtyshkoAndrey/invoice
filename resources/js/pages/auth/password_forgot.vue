<template>
  <div class="row flex-row login-form align-items-center">
    <div class="col-12">
      <div class="row row-cols-2 justify-content-center">
        <div class="col-md-auto col-10">
          <vs-input v-model="form.email" class="w-100" placeholder="Email">
            <template v-if="validEmail" #message-success>
              {{ $t('auth.success.email.valid') }}
            </template>
            <template v-if="typeof form.errors.errors.email !== 'undefined'" #message-danger>
              {{ form.errors.errors.email }}
            </template>
            <template v-else-if="!validEmail && form.email !== ''" #message-danger>
              {{ $t('auth.errors.email.valid') }}
            </template>
          </vs-input>
        </div>
        <div class="col-md-auto col-10">
          <vs-button
            :loading="form.busy"
            class="d-block w-100 mt-3 mt-md-auto"
            style="margin: 0; padding: 4px 13px;"
            success
            @click="login"
          >
            {{ $t('auth.reset') }}
          </vs-button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Form from "vform";

export default {
  name: "ResetPassword",
  middleware: 'guest',
  //TODO: language
  metaInfo() {
    return {title: this.$t('password_forgot.title')}
  },
  data: () => ({
    form: new Form({
      email: ''
    }),
  }),
  computed: {
    validEmail() {
      return /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(this.form.email)
    }
  },
  mounted() {
    this.$root.$loading.finish()

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Enter') {
        this.login()
      }
    })
  },
  beforeMount() {
    document.removeEventListener('keydown', (e) => {
      if (e.key === 'Enter') {
        this.login()
      }
    })
  },
  methods: {
    async login() {
      if (this.validEmail && !this.validPassword) {
        // Submit the form.
        await this.form.post('/api/password/email')
          .then(({data}) => {
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
    redirect() {
      this.$vs.notification({
        title: this.$t('notification.email_send.title'),
        text: this.$t('notification.email_send.text')
      })
      this.$router.push({name: 'login'})
    }
  }
}
</script>

<style scoped>

</style>