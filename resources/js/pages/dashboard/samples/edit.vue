<template>
  <div>
    <transition name="fade" appear>
      <Loader v-if="$root.$loading.show" key="1" />

      <div v-else key="2">
        <div class="card p-4">
          <div class="card-title">
            <h3>{{ title }} "{{ sample.name }}"</h3>
          </div>
          <div class="card-body px-0">
            
            <div v-for="(day, index) in sample.days" :key="index" class="row align-items-center">
              <div class="col-auto">
                <p class="mb-0">День {{ index + 1 }}</p>
              </div>
              <div class="col-auto">
                <vs-select v-model="day.resort.id" placeholder="Курорты">
                  <vs-option v-for="resort in resorts" :key="resort.id" :label="resort.name" :value="resort.id">
                    {{ resort.name }}
                  </vs-option>
                </vs-select>
              </div>
              <div class="col-auto">
                <vs-checkbox v-model="day.free">
                  Free day
                </vs-checkbox>
              </div>
              <div class="col-auto">
                <vs-button
                  icon
                  circle
                  danger
                  flat
                  @click="removeDay(index)"
                >
                  <em class="bx bx-trash-alt" />
                </vs-button>
              </div>
            </div>

            <div class="row justify-content-between align-items-center mt-3">
              <div class="col-auto">
                <vs-button
                  gradient
                  @click="addDay"
                >
                  Добавить день
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
    sample: {},
    resorts: []
  }),
  computed: {
    id () {
      return this.$route.params.id
    }
  },
  async mounted() {


    await axios.get('/api/samples/' + this.id)
    .then(r => {
      this.sample = r.data.payload.sample
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
      this.$router.go(-1)
    }
  }
}
</script>

<style scoped>

</style>