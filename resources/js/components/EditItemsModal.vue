<template>
  <vs-dialog v-model="active" :loading="loading" not-center width="300px">
    <template #header>
      <h4 class="not-margin">
        {{ translateTitle }} <strong v-if="nameTitle">{{ nameTitle }}</strong>
      </h4>
    </template>


    <div class="con-content">
      <vs-input v-model="name" :placeholder="$t('form.inputs.name.placeholder')">
        <template v-if="error" #message-danger>
          {{ error }}
        </template>
      </vs-input>
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
import i18n from "~/plugins/i18n"
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
    }
  },
  data: () => ({
    active: false,
    name: '',
    nameTitle: '',
    id: null,
    loading: false,
    error: null
  }),
  mounted() {
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
     *
     * @param {object?} params
     * @var {string?} params.name
     * @var {number?} params.id
     */
    openModal(params) {
      if (params) {
        if (typeof params.name !== 'undefined') {
          this.name = params.name
          this.nameTitle = params.name
        }
        if (typeof params.id !== 'undefined') {
          this.id = params.id
        }
      } else {
        this.name = ''
        this.nameTitle = ''
      }
      this.active = true
    },

    /**
     * Call event update in Item card, but item cart
     * transfer params and callbacks function
     */
    save () {
      this.loading = true

      this.bus.$emit('save', {
        id: this.id,
        name: this.name,
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
      this.error = null
    },

    /**
     * Callback if backend return 400 error
     * Viewed error for user and clear loading
     *
     * @param {string} error
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
