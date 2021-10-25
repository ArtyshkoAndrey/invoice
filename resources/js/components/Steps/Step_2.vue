<template>
  <div class="card">
    <div class="card-title px-3 pb-2 pt-4">
      <h6 class="fw-light text-reset">
        {{ $t('invoice.create.words.step') }} 2 {{ $t('invoice.create.words.in') }} 6 <span
          class="fw-bolder"
        >{{ $t('invoice.create.step_2.title') }}</span>
      </h6>
    </div>

    <div class="card-body p-0 pb-3">
      <div class="mx-3 my-2">
        <div class="row">
          <div class="col-12 col-md-6 col-lg-4">
            <vs-input v-model="$parent.form.user.name"
                      :placeholder="$t('invoice.inputs.user.name')"
            >
              <template #icon>
                <i aria-hidden="true" class="bx bx-user" />
              </template>
              <template v-if="$parent.userNameError" #message-danger>
                {{ $parent.userNameError }}
              </template>
            </vs-input>
          </div>

          <div class="col-12 col-md-6 mt-2 mt-md-0 col-lg-4">
            <vs-input v-model="$parent.form.user.nationality"
                      :placeholder="$t('invoice.inputs.user.nationality')"
            >
              <template #icon>
                <i aria-hidden="true" class="bx bx-globe" />
              </template>
              <template v-if="$parent.userNationalityError" #message-danger>
                {{ $parent.userNationalityError }}
              </template>
            </vs-input>
          </div>
        </div>
        <div class="row justify-content-end">
          <div class="col-auto">
            <vs-button
              flat
              @click="$parent.next"
            >
              {{ $t('invoice.buttons.next') }}

              <template v-if="$parent.userNationalityError === false && $parent.userNameError === false " #animate>
                <i aria-hidden="true" class="bx bx-right-arrow-alt fs-2" />
              </template>
              <template v-else #animate>
                <i aria-hidden="true" class="bx bx-x fs-2" />
              </template>
            </vs-button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Step2",
}
</script>

<style scoped>

</style>