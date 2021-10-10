<template>
  <div class="card">
    <div class="card-title px-3 pb-2 pt-4">
      <h6 class="fw-light text-reset">
        Шаг 5 из 5 <span class="fw-bolder">Программа</span>
      </h6>
    </div>

    <div v-if="!loading" class="card-body p-0 pb-3">
      <div class="mx-3 my-2">
        <div v-if="!setTemplateFlag" class="row">
          <div class="col-12 col-md-auto">
            <vs-button
              success
              @click="bus.$emit('open')"
            >
              {{ $t('invoice.buttons.choose_template') }}
            </vs-button>
          </div>
          <div class="col-12 col-md-auto">
            <vs-button
              success
              flat
              @click="setTemplate(null)"
            >
              {{ $t('invoice.buttons.create_new_template') }}
            </vs-button>
          </div>
        </div>
        <div v-else>

        </div>
      </div>
    </div>
    <div v-else class="card-body p-0 pb-3">
      <Loader />
    </div>
    <ChooseTemplate :bus="bus" />
  </div>
</template>

<script>
import Loader from "~/components/Loader.vue"
import Vue from "vue"
import ChooseTemplate from "~/components/Steps/StepComponents/ChooseTemplate";
export default {
  name: "Step5",
  components: {
    Loader,
    ChooseTemplate
  },
  data: () => ({
    bus: new Vue(),
    loading: false,
    template: {},
    setTemplateFlag: false
  }),
  mounted() {
    this.bus.$on('setTemplate', this.setTemplate)
  },
  methods: {
    setTemplate (template) {
      if (template !== null)
        this.template = template
      this.setTemplateFlag = true
    }
  }
}
</script>

<style scoped>

</style>