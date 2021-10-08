<template>
  <transition appear mode="out-in" name="fade">
    <Loader v-if="$root.$loading.show" key="1" />

    <div v-else id="groupCollapse" key="2">

      <div class="row justify-content-center mb-5">
        <div class="col-12 col-mg-8 col-lg justify-content-center">
          <Stepper />
        </div>
      </div>

      <div class="row mx-0">
        <div class="col-12">
          <div class="card">
            <div class="card-title px-3 pb-2 pt-4">
              <h6 class="fw-light text-reset">Шаг 1 из 5 <span class="fw-bolder">Компания</span></h6>
            </div>

            <div class="card-body p-0 pb-3">
              <div class="mx-3 my-2">
                <div class="row">
                  <div class="col-12 col-md-6 col-lg-4">
                    <vs-input v-model="value1"
                              shadow
                              placeholder="User name"
                    >
                      <template #icon>
                        <i class='bx bx-user' aria-hidden="true"></i>
                      </template>
                    </vs-input>
                  </div>
                  <div class="col-12 col-md-6 col-lg-4">
                    <vs-input v-model="value1"
                              shadow
                              placeholder="User name"
                    >
                      <template #icon>
                        <i class='bx bx-user' aria-hidden="true"></i>
                      </template>
                    </vs-input>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </transition>
</template>
<script>
import Stepper from '~/components/Stepper.vue'
export default {
  name: "create",
  data: () => ({
    value1: '',
    stepForm: 1,
  }),
  components: {
    Stepper
  },
  mounted() {
    this.$root.$loading.finish()
  },
  computed: {
    step: {
      get: function () {
        return this.stepForm
      },

      set: function (value) {
        if (value < 0 && value > 5) {
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
        }
      }
    }
  },
  methods: {
  }
}
</script>

<style scoped>

</style>