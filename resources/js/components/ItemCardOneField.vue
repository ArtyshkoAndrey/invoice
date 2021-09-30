<template>
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
</template>

<script>
export default {
  name: "ItemCardOneField",
  props: {
    name: {
      type: String,
      required: true
    },
    id: {
      type: Number,
      required: true
    }
  }
}
</script>

<style scoped>

</style>
