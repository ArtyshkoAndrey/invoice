<template>
  <vs-dialog v-model="active" :loading="loading" not-center width="300px">
    <template #header>
      <h4 class="not-margin">
        {{ translateTitle }} <strong v-if="nameTitle">{{ nameTitle }}</strong>
      </h4>
    </template>


    <div class="con-content">
      <vs-input v-for="field in fields"
                :key="field"
                class="mt-2"
                v-model="data[field]"
                v-if="field !== 'id'"
                :placeholder="$t('form.inputs.' + field + '.placeholder')"
      >
        <template v-if="error[field]" #message-danger>
          {{ error[field][0] }}
        </template>
      </vs-input>

      <span class="text-danger" v-if="error.message">
        {{ error.message }}
      </span>
    </div>

    <template #footer>
      <div class="row justify-content-end align-items-center">
        <div class="col-auto">
          <vs-button flat success @click="save">
            {{ $t('form.save') }}
          </vs-button>
        </div>
        <div class="col-auto">
          <vs-button danger flat @click="active=false">
            {{ $t('form.cancel') }}
          </vs-button>
        </div>
      </div>
    </template>
  </vs-dialog>
</template>

<script>
import Vue from "vue";
export default {
  name: 'EditItemsModal',
  props: {
    bus: {
      type: Vue,
      required: true
    },
    title: {
      type: String,
      required: false,
      default: ''
    },
    fields: {
      type: Array,
      required: true
    },
    inputs: {
      type: Object,
      default: new Object()
    }
  },
  data: () => ({
    active: false,
    data: {},
    nameTitle: '',
    loading: false,
    error: {}
  }),
  mounted() {

    this.data = this.inputs
    if (this.data.name) {
      this.nameTitle = this.data.name
    }

    // Listen parent to open Modal
    this.bus.$on('openModal', this.openModal)
  },
  computed: {
    translateTitle () {
      if (this.title === '') {
        return this.$t('form.title.edit')
      }

      return this.$t(this.title)
    }
  },
  methods: {
    /**
     * Open modal dialog
     */
    openModal() {
      this.active = true
    },

    /**
     * Call event update in Item card, but item cart
     * transfer params and callbacks function
     */
    save () {
      this.loading = true

      this.bus.$emit('save', {
        ...this.data,
        callbackSuccess: this.callbackSuccess,
        callbackError: this.callbackError
      })
    },

    /**
     * Callback if backend update data
     * Close modal and clear error
     *
     */
    callbackSuccess() {
      this.active = false
      this.loading = false
      this.error = {}
    },

    /**
     * Callback if backend return 400 error
     * Viewed error for user and clear loading
     *
     * @param {object} error
     */
    callbackError(error) {
      this.loading = false
      this.error = error
    }
  }
}
</script>

<style scoped>

</style>
