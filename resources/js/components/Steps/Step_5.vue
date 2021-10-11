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
        <!-- Вывод шаблона -->
        <div v-else>
          <div v-for="(day, index) in template.days" :key="index" class="row align-items-center my-2">
            <div class="col-lg-auto col-sm-2 col-4">
              <p class="mb-0">
                {{ $t('samples.edit.day', {number: index + 1}) }}
              </p>
            </div>
            <div class="col-lg-auto col-sm-4 col-8">
              <vs-select v-model="day.resort.id" placeholder="Курорты" :disabled="day.free">
                <vs-option v-for="resort in resorts" :key="resort.id" :label="resort.name" :value="resort.id" :disabled="day.free">
                  {{ resort.name }}
                </vs-option>
              </vs-select>
            </div>
            <div class="col-lg-auto col-sm-2 col-6 mt-2 mt-lg-0">
              <vs-checkbox v-model="day.free">
                {{ $t('samples.edit.free_day') }}
              </vs-checkbox>
            </div>
            <div class="col-lg-auto col-sm col-6 mt-2 mt-lg-0">
              <vs-button
                circle
                danger
                flat
                @click="removeDay(index)"
              >
                <em class="bx bx-trash-alt d-none d-lg-block" />
                <span class="d-block d-lg-none">{{ $t('form.delete') }}</span>
              </vs-button>
            </div>
            <div class="col-12">
              <hr class="d-block d-lg-none">
            </div>
          </div>

          <div class="row justify-content-between align-items-center mt-3">
            <div class="col-auto">
              <vs-button
                gradient
                @click="addDay"
              >
                {{ $t('samples.edit.add_day') }}
              </vs-button>
            </div>
            <div class="col-auto">
              <vs-button
                :disabled="disabledNext"
                @click="$parent.next"
              >
                {{ $t('invoice.buttons.next') }}
              </vs-button>
            </div>
          </div>
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
import ChooseTemplate from "~/components/Steps/StepComponents/ChooseTemplate"
import axios from "axios"
export default {
  name: "Step5",
  components: {
    Loader,
    ChooseTemplate
  },
  props: {
    sample: {
      type: Object,
      require: true,
      default: null
    }
  },
  data: () => ({
    bus: new Vue(),
    loading: false,
    template: null,
    setTemplateFlag: false,
    resorts: []
  }),
  computed: {
    disabledNext () {
      let status = false

      if (this.template === null) {
        status = true
      } else if (this.template.days.length <= 0) {
        status = true
      } else {
        this.template.days.forEach(day => {
          if ((day.resort.id === '' || day.resort.id === null) && day.free === false) {
            status = true
            return 0
          }
        })
      }

      return status
    }
  },
  watch: {
    template: {
      handler: function (val) {
        this.$parent.form.sample = val
      },
      deep: true
    }
  },
  mounted() {
    this.bus.$on('setTemplate', this.setTemplate)
    if (this.sample !== null) {
      this.setTemplate(this.sample)
    }
  },
  methods: {
    setTemplate (template) {
      if (template !== null)
        this.template = template
      else {
        this.template = {
          days: [],
          name: ''
        }
      }
      this.loading = true
      this.setTemplateFlag = true

      this.getResorts()
    },
    getResorts () {
      axios.get("/api/resorts")
      .then(r => {
        if (r.data.success) {
          this.resorts = r.data.payload.resorts
          this.loading = false
        } else {
          this.$vs.notification({
            title: this.$t('notification.get.danger.title'),
            text: this.$t('notification.get.danger.text')
          })
          this.$router.push({name: 'dashboard.invoice.index'})
        }
      })
      .catch(e => {
        this.$vs.notification({
          title: this.$t('notification.get.danger.title'),
          text: this.$t('notification.get.danger.text')
        })
        this.$router.push({name: 'dashboard.invoice.index'})
      })
    },

    addDay () {
      let day = {
        id: '',
        order: '',
        resort: {
          id: ''
        },
        free: false
      }

      this.template.days.push(day)
    },
    removeDay (index) {
      this.template.days = this.template.days.filter((el, i) => i !== index)
    },
  }
}
</script>

<style scoped>

</style>