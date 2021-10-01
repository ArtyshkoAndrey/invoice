<template>
  <vs-dialog width="300px" not-center :loading="loading" v-model="active">
    <template #header>
      <h4 class="not-margin">
        {{ $t('resorts.edit-modal.title')}} <strong>{{ nameTitle }}</strong>
      </h4>
    </template>


    <div class="con-content">
      <vs-input :placeholder="$t('form.inputs.name.placeholder')" v-model="name">
        <template #message-danger v-if="error">
          {{ error }}
        </template>
      </vs-input>
    </div>

    <template #footer>
      <div class="row justify-content-around align-items-center">
        <div class="col-auto">
          <vs-button @click="update" success flat>
            {{ $t('form.save') }}
          </vs-button>
        </div>
        <div class="col-auto">
          <vs-button @click="active=false" danger flat>
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
    this.bus.$on('openModal', this.openModal)
  },
  methods: {
    /**
     * Open modal dialog
     *
     * @param {object} params
     * @var {string} params.name
     * @var {number} params.id
     */
    openModal (params) {
      this.name = params.name
      this.nameTitle = params.name
      this.id = params.id
      this.active = true
    },
    update () {
      this.loading = true

      this.bus.$emit('update', {
        id: this.id,
        name: this.name,
        callbackSuccess: this.callbackSuccess,
        callbackError: this.callbackError
      })
    },

    callbackSuccess () {
      this.active = false
      this.loading = false
      this.error = null
    },

    callbackError (error) {
      this.loading = false
      this.error = error
    }
  }
}
</script>

<style scoped>

</style>
