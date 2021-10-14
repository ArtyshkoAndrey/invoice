<template>
  <div>
    <div class="card">

      <div class="card-body">
        <div class="row align-items-center mx-0">
          <div v-for="(field, index) in fields"
               :key="field"
               class="col-auto"
               :class="field === 'id' && hideId || field === 'password' ? 'd-none' : ''"
          >
            <h6 class="mb-0"
                :style="checkTitleRouter ? 'cursor: pointer' : '' "
                @click="routePush(index)"
            >
              {{ inputs[field] }}
            </h6>
          </div>

          <div class="col-auto ms-auto">
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
                  @click="$emit('destroy', inputs.id)"
                >
                  <em class="bx bx-trash-alt" />
                </vs-button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <EditItemsModal :bus="bus"
                    :title="updateModalTitle"
                    :fields="fields"
                    :inputs="inputs"
    />
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
    item: {
      type: Object,
      required: true
    },
    fields: {
      type: Array,
      required: true
    },
    updateModalTitle: {
      type: String,
      required: false,
      default: ''
    },
    hideId: {
      type: Boolean,
      default: true
    }
  },
  data: () => ({
    bus: new Vue()
  }),
  computed: {
    inputs () {
      let inputs = {}
      this.fields.forEach(field => {
        inputs[field] = this.item[field]
      })
      return inputs;
    },
    checkTitleRouter () {
      return typeof this.$attrs['title-router'] !== 'undefined'
    }
  },
  mounted() {
    this.bus.$on('save', this.update)
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
    },

    routePush (index) {
      console.log(typeof this.$attrs['title-router'] !== 'undefined')
      if (typeof this.$attrs['title-router'] !== 'undefined') {
        if (index === 0 && !this.hideId) {
          this.$emit('title-route')
        }

        if (index === 1 && this.hideId) {
          this.$emit('title-route')
        }
      }
    }
  }
}
</script>

<style scoped>

</style>
