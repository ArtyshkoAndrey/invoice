<template>
  <div>
    <div class="card">
      <div class="card-title px-3 pb-2 pt-4">
        <h6 class="fw-light text-reset">
          {{ $t('invoice.create.words.step') }} 6 {{ $t('invoice.create.words.in') }} 6 <span
            class="fw-bolder"
          >{{ $t('invoice.create.step_6.title') }}</span>
        </h6>
      </div>
      <transition appea mode="out-in" name="fade">
        <div v-if="loading" class="card-body px-3 pb-2 pt-4">
          <Loader />
        </div>
        <div v-else class="card-body p-0 pb-3">
          <div class="mx-3 my-2">
            <div class="row">
              <div class="col-12 col-md-6 col-lg-4">
                <vs-input v-model="h.phone"
                          :danger="phoneValid"
                          :placeholder="$t('invoice.inputs.hotline.phone')"
                >
                  <template #icon>
                    <i class="bx bx-phone" />
                  </template>
                </vs-input>
              </div>

              <div class="col-12 mt-2 mt-md-0 col-md-6 col-lg-4">
                <vs-input v-model="h.cost"
                          :danger="costValid"
                          :placeholder="$t('invoice.inputs.hotline.cost')"
                          type="number"
                >
                  <template #icon>
                    <i>$</i>
                  </template>
                </vs-input>
              </div>
            </div>
            <div class="row justify-content-end">
              <div class="col-auto">
                <vs-button
                  flat
                  @click="$parent.next"
                >
                  {{ $t('invoice.buttons.next') }}

                  <template v-if="costValid === false && phoneValid === false " #animate>
                    <i aria-hidden="true" class="bx bx-right-arrow-alt fs-2" />
                  </template>
                  <template v-else #animate>
                    <i aria-hidden="true" class="bx bx-x fs-2" />
                  </template>
                </vs-button>
              </div>
            </div>
          </div>
        </div>
      </transition>
    </div>
  </div>
</template>

<script>
export default {
  name: "Step6",
  props: {
    // eslint-disable-next-line vue/require-default-prop
    hotline: {
      type: Object,
    }
  },
  data: () => ({
    h: {},
    loading: true
  }),
  computed: {
    costValid() {
      return this.h.cost.length < 1
    },
    phoneValid() {
      if (this.h.phone === null) {
        return true
      }
      return this.h.phone.length < 6
    }
  },
  watch: {
    h: {
      handler: function (newVal) {
        this.$parent.form.hotline = newVal
      },
      deep: true
    },
  },
  mounted() {
    console.log(this.hotline)
    this.h = {
      cost: this.hotline.cost ?? '',
      phone: this.hotline.phone ?? ''
    }
    this.loading = false
  }
}
</script>

<style scoped>

</style>