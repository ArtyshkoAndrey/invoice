<template>
  <div>
    <div class="card">

      <div class="card-body">
        <div class="row align-items-center mx-0">
          <div class="col">
            <h6 class="mb-0">
              {{ name }}
            </h6>
          </div>

          <div class="col-auto">
            <div class="row gx-0">
              <div class="col">
                <vs-button
                  icon
                  circle
                  success
                  flat
                  @click="openModal"
                >
                  <em class="bx bx-pencil" />
                </vs-button>
              </div>
              <div class="col">
                <vs-button
                  icon
                  circle
                  danger
                  flat
                  @click="$emit('destroy', id)"
                >
                  <em class="bx bx-trash-alt" />
                </vs-button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <EditItemsModal :bus="bus" />

  </div>

</template>

<script>
import Vue from "vue";
import EditItemsModal from "./EditItemsModal.vue";
export default {
  name: "ItemCardOneField",
  components: {
    EditItemsModal
  },
  props: {
    name: {
      type: String,
      required: true
    },
    id: {
      type: Number,
      required: true
    }
  },
  data: () => ({
    bus: new Vue()
  }),
  mounted() {
    this.bus.$on('update', this.update)
  },
  methods: {
    openModal() {
      this.bus.$emit('openModal', {
        name: this.name,
        id: this.id
      })
    },
    /**
     *
     * @param {object} params
     */
    update (params) {
      this.$emit('update', params)
    }
  }
}
</script>

<style scoped>

</style>
