<template>
  <transition appear mode="out-in" name="fade">
    <Loader v-if="$root.$loading.show" key="1" />

    <div v-else id="groupCollapse" key="2">

      <div class="row justify-content-center mb-5">
        <div class="col-12 col-mg-8 col-lg justify-content-center">
          <Stepper :bus="bus" :count="5" />
        </div>
      </div>

      <div class="row mx-0">
        <div class="col-12">
          <transition name="slide-fade" appear mode="out-in">
            <div v-if="stepForm === 1" key="1" class="card">
              <div class="card-title px-3 pb-2 pt-4">
                <h6 class="fw-light text-reset">Шаг 1 из 5 <span class="fw-bolder">Компания</span></h6>
              </div>

              <div class="card-body p-0 pb-3">
                <div class="mx-3 my-2">
                  <div class="row">
                    <div class="col-12 col-md-6 col-lg-4">

                        <vs-select class="mw-100" :placeholder="$t('invoice.inputs.company_name')" v-model="form.company">
                          <template #message-danger v-if="companyError">
                            {{ companyError }}
                          </template>
                          <vs-option v-for="c in companies"
                                     :label="c.name"
                                     :value="c.id"
                                     :key="c.id"
                          >
                            {{ c.name }}
                          </vs-option>
                        </vs-select>

                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                      <vs-select class="mw-100"
                                 :placeholder="$t('invoice.inputs.company_ref')"
                                 v-model="form.company"
                      >
                        <template #message-danger v-if="companyError">
                          {{ companyError }}
                        </template>
                        <vs-option v-for="c in companies" :key="c.id" :label="c.code" :value="c.id">
                          {{ c.code }}
                        </vs-option>
                      </vs-select>
                    </div>
                  </div>
                  <div class="row justify-content-end">
                    <div class="col-auto">
                      <vs-button
                        flat
                        @click="next"
                      >
                        {{ $t('invoice.buttons.next')}}

                        <template #animate v-if="companyError === false">
                          <i class='bx bx-right-arrow-alt fs-2'  aria-hidden="true"></i>
                        </template>
                        <template #animate v-else>
                          <i class='bx bx-x fs-2'  aria-hidden="true"></i>
                        </template>
                      </vs-button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div v-else-if="stepForm === 2" key="2" class="card">
              <div class="card-title px-3 pb-2 pt-4">
                <h6 class="fw-light text-reset">Шаг 2 из 5 <span class="fw-bolder">Данные пользователя</span></h6>
              </div>

              <div class="card-body p-0 pb-3">
                <div class="mx-3 my-2">
                  <div class="row">
                    <div class="col-12 col-md-6 col-lg-4">
                      <vs-input v-model="form.user.name"
                                shadow
                                :placeholder="$t('invoice.inputs.user.name')"
                      >
                        <template #icon>
                          <i class='bx bx-user' aria-hidden="true"></i>
                        </template>
                        <template #message-danger v-if="userNameError">
                          {{ userNameError }}
                        </template>
                      </vs-input>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                      <vs-input v-model="form.user.nationality"
                                shadow
                                :placeholder="$t('invoice.inputs.user.nationality')"
                      >
                        <template #icon>
                          <i class='bx bx-globe' aria-hidden="true"></i>
                        </template>
                        <template #message-danger v-if="userNationalityError">
                          {{ userNationalityError }}
                        </template>
                      </vs-input>
                    </div>
                  </div>
                  <div class="row justify-content-end">
                    <div class="col-auto">
                      <vs-button
                          flat
                          @click="next"
                      >
                        {{ $t('invoice.buttons.next')}}

                        <template #animate v-if="companyError === false">
                          <i class='bx bx-right-arrow-alt fs-2'  aria-hidden="true"></i>
                        </template>
                        <template #animate v-else>
                          <i class='bx bx-x fs-2'  aria-hidden="true"></i>
                        </template>
                      </vs-button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </transition>


        </div>
      </div>

    </div>
  </transition>
</template>
<script>
import Vue from 'vue'
import axios from 'axios'
import Stepper from '~/components/Stepper.vue'
export default {
  name: "create",
  data: () => ({
    value1: '',
    stepForm: 1,
    bus: new Vue(),
    companies: [],
    form: {
      company: '',
      user: {
        name: '',
        nationality: ''
      }
    }
  }),
  components: {
    Stepper
  },
  async mounted() {

    this.bus.$on('changeStep', this.changeStep)

    await axios.get('/api/companies')
    .then(r => {
      this.companies = r.data.payload.companies
    })
    .catch(e => {
      this.$vs.notification({
        title: this.$t('notification.get.danger.title'),
        text: this.$t('notification.get.danger.text')
      })
    })

    await this.$root.$loading.finish()
  },
  computed: {
    step: {
      get: function () {
        return this.stepForm
      },

      set: function (value) {
        console.log("Пришло на set",value)
        if (value < 0 || value > 5) {
          this.$vs.notification({
            duration: 2000,
            sticky: true,
            position: 'top-right',
            color: 'danger',
            title: 'Ошибка!',
            text: 'Вы ушли за границу данных'
          })
        } else {
          this.stepForm = value
          console.log("Сохранило в set",value)
        }
      }
    },
    companyError () {
      if (this.form.company === '' || this.form.company === null) {
        return this.$t('invoice.errors.company')
      }

      return false
    },

    userNameError () {
      if (this.form.user.name === '' || this.form.user.name === null) {
        return this.$t('invoice.errors.user.name')
      }

      return false
    },
    userNationalityError () {
      if (this.form.user.nationality === '' || this.form.user.nationality === null) {
        return this.$t('invoice.errors.user.nationality')
      }

      return false
    }
  },
  methods: {
    changeStep (index) {
      console.log('changeStep', index)
      this.step = index
    },

    notifyError () {
      this.$vs.notification({
        duration: 2000,
        sticky: true,
        position: 'top-right',
        color: 'danger',
        title: this.$t('invoice.errors.validateInputs.title'),
        text: this.$t('invoice.errors.validateInputs.text')
      })
    },

    next () {
      if (this.step === 1) {
        if (this.companyError) {
         this.notifyError()

          return false
        }
        this.bus.$emit('setStatus',{
          step: this.step,
          status: 'success'
        })
      }
      else if (this.step === 2) {
        if (this.userNationalityError || this.userNameError) {
          this.notifyError()

          return false
        }
        this.bus.$emit('setStatus',{
          step: this.step,
          status: 'success'
        })
      }
    }
  }
}
</script>

<style scoped>
/* Анимации появления и исчезновения могут иметь */
/* различные продолжительности и динамику.       */
.slide-fade-enter-active {
  transition: all .3s ease;
}
.slide-fade-leave-active {
  transition: all .3s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to
  /* .slide-fade-leave-active до версии 2.1.8 */ {
  transform: translateX(10px);
  opacity: 0;
}
</style>