<template>
  <div>
    <transition name="fade" appear>
      <Loader v-if="$root.$loading.show && loading" key="1" />

      <div v-else key="2">
        <div class="card p-4">
          <div class="card-title">
            <h3>{{ $t('samples.edit.title') }} "{{ sample.name }}"</h3>
          </div>
          <div class="card-body px-0">
            
            <div v-for="(day, index) in sample.days" :key="index" class="row align-items-center my-2">
              <div class="col-lg-auto col-sm-2 col-4">
                <p class="mb-0">{{ $t('samples.edit.day', {number: index + 1}) }}</p>
              </div>
              <div class="col-lg-auto col-sm-4 col-8">
                <vs-select v-model="day.resort.id" placeholder="Курорты" :disabled="day.free">
                  <vs-option v-for="resort in resorts" :key="resort.id" :label="resort.name" :disabled="day.free" :value="resort.id">
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
                  success
                  @click="save"
                >
                  {{ $t('form.save') }}
                </vs-button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </transition>
  </div>
</template>

<script>
import i18n from "~/plugins/i18n";
import axios from 'axios'
import Loader from '~/components/Loader.vue'
export default {
  name: 'Edit',
  components: {
    Loader
  },
  metaInfo: {
    title: i18n.t('samples.edit.title'),
  },
  data: () => ({
    title: i18n.t('samples.edit.title'),
    sample: {
      days: []
    },
    resorts: [],
    loading: true
  }),
  computed: {
    id () {
      return this.$route.params.id
    }
  },
  async mounted() {
    await axios.get('/api/samples/' + this.id)
    .then(r => {
      let sample = r.data.payload.sample
      sample.days.forEach(day => {
        if (day.resort === null) {
          console.log(day)
          day.resort = {
            id: ''
          }
        }
      })
      this.sample = sample
    })
    .catch(e => {
      if (e.response.status === 404) {
        console.log(e.response.data)
        this.$vs.notification({
          title: 'Ошибка',
          text: e.response.data.message
        })

        this.$router.push({name: 'dashboard.samples.index'})
      }
    })

    await axios.get('/api/resorts')
    .then(r => {
      this.resorts = r.data.payload.resorts
    })

    await this.$root.$loading.finish()
    this.loading = false
  },
  methods: {
    addDay () {
      let day = {
        id: '',
        order: '',
        resort: {
          id: ''
        },
        free: false
      }

      this.sample.days.push(day)
    },
    removeDay (index) {
      this.sample.days = this.sample.days.filter((el, i) => i !== index)
    },
    save () {
      this.$root.$loading.start()
      axios.put('/api/days', {
        sample: this.sample
      })
      .then(r => {
        this.$root.$loading.finish()
        console.log('save data', r.data.payload)
        this.$router.go(-1)

      })
      .catch(e => {
        this.$root.$loading.finish()
        if (e.response.status === 422) {
          this.$vs.notification({
            title: 'Ошибка',
            text: e.response.data.message
          })

          Object.keys(e.response.data.errors).forEach((key) => {
            this.$vs.notification({
              title: key.capitalize(),
              text: e.response.data.errors[key]
            })
          })
        }
        else if (e.response.status === 404) {
          this.$vs.notification({
            title: 'Ошибка',
            text: e.response.data.message
          })
        }
      })
    }
  }
}
</script>

<style scoped>

</style>