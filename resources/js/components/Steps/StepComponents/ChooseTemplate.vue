<template>
  <vs-dialog v-model="active" :loading="loading">
    <template #header>
      <h4 class="m-0">
        {{ $t('invoice.create.step_5.template.title') }}
      </h4>
    </template>

    <div class="row">
      <div class="col-12">
        <vs-select v-model="template_id" class="mw-100">
          <vs-option
            v-for="sample in samples"
            :key="sample.id"
            :value="sample.id"
            :label="sample.name"
          >
            {{ sample.name }}
          </vs-option>
        </vs-select>
      </div>
    </div>

    <template #footer>
      <div class="footer-dialog">
        <vs-button
          block
          success
          :disabled="disableButton"
          @click="done"
        >
          {{ $t('invoice.create.step_5.template.done') }}
        </vs-button>
      </div>
    </template>
  </vs-dialog>
</template>

<script>
import Vue from "vue"
import axios from "axios"
export default {
  name: "ChooseTemplate",
  props: {
    bus: {
      required: true,
      type: Vue
    }
  },
  data: () => ({
    active: false,
    template_id: '',
    samples: [],
    loading: true
  }),
  computed: {
    disableButton () {
      return this.template_id === '';
    },
  },
  mounted() {
    this.bus.$on('open', this.open)
  },
  methods: {
    open () {
      axios.get("/api/samples")
      .then(r => {
        if (r.data.success) {
          this.samples = r.data.payload.samples
          this.active = true
          setTimeout(() => {
            this.loading = false
          },500)
        }
         else {
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
    done () {
      this.loading = true
      let sample

      axios.get("/api/samples/" + this.template_id)
      .then(r => {
        if (r.data.success) {
          sample = r.data.payload.sample

          sample.days.forEach(day => {
            if (day.resort === null) {
              day.resort = {
                id: ''
              }
            }
          })

          this.bus.$emit('setTemplate', sample)
          this.active = false
        } else {
          this.error = r.data.message
        }
        this.loading = false
      })
      .catch(e => {
        this.$vs.notification({
          title: this.$t('notification.get.danger.title'),
          text: this.$t('notification.get.danger.text')
        })
        this.loading = false
      })
    }
  }
}
</script>

<style scoped>

</style>