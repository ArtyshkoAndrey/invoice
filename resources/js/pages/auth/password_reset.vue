<template>
  <div class="row flex-row login-form align-items-center">
    <div class="col-12">
      <div class="row justify-content-center">
        <div class="col-md-4 col-lg-3 col-sm-6 col-10">
          <vs-input v-model="form.password" :placeholder="$t('form.inputs.password.placeholder')" type="password">
            <template v-if="validPassword" #message-danger>
              {{ $t('auth.errors.password.length.min', {length: 6}) }}
            </template>
          </vs-input>
        </div>
      </div>
      <div class="row justify-content-center mt-3">
        <div class="col-md-4 col-lg-3 col-sm-6 col-10">
          <vs-input v-model="form.password_confirmation"
                    :placeholder="$t('form.inputs.password_confirmation.placeholder')" type="password"
          >
            <template v-if="validPasswordConfirmation" #message-danger>
              {{ $t('auth.errors.password_confirmation') }}
            </template>
          </vs-input>
        </div>
      </div>

      <div class="row justify-content-center mt-3">
        <div class="col-md-4 col-lg-3 col-sm-6 col-10">
          <vs-button
            :loading="form.busy"
            class="d-block w-100 mt-3 mt-md-auto"
            style="margin: 0; padding: 4px 13px;"
            success
            @click="reset"
          >
            {{ $t('auth.in_login') }}
          </vs-button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Form from 'vform'

export default {
  name: "PasswordReset",
  middleware: 'guest',
  metaInfo() {
    return {title: this.$t('password_reset.title')}
  },
  data: () => ({
    status: '',
    form: new Form({
      token: '',
      email: '',
      password: '',
      password_confirmation: ''
    })
  }),
  computed: {
    validPassword() {
      return this.form.password.length < 6 && this.form.password !== ''
    },
    validPasswordConfirmation() {
      return this.form.password !== this.form.password_confirmation && this.form.password_confirmation !== ''
    }
  },
  created() {
    this.form.email = this.$route.query.email
    this.form.token = this.$route.params.token
    this.$root.$loading.finish()
  },
  methods: {
    async reset() {
      if (!this.validPassword && !this.validPasswordConfirmation) {
        const {data} = await this.form.post('/api/password/reset')
        this.status = data.status
        if (this.form.successful) {
          this.$vs.notification({
            title: this.$t('notification.resetting_password.title'),
            text: this.status
          })
          this.form.reset()
        } else {
          this.$vs.notification({
            title: this.$t('notification.get.danger.title'),
            text: this.status
          })
        }
      }
    }
  }
}
</script>

<style scoped>

</style>