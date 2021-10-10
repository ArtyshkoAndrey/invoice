<template>
  <div class="card">
    <div class="card-title px-3 pb-2 pt-4">
      <h6 class="fw-light text-reset">Шаг 2 из 5 <span class="fw-bolder">Данные пользователя</span></h6>
    </div>

    <div class="card-body p-0 pb-3">
      <div class="mx-3 my-2">
        <div class="row">
          <div class="col-12 col-md-6 col-lg-4">
            <vs-input v-model="$parent.form.user.name"
                      :placeholder="$t('invoice.inputs.user.name')"
            >
              <template #icon>
                <i class='bx bx-user' aria-hidden="true"></i>
              </template>
              <template #message-danger v-if="$parent.userNameError">
                {{ $parent.userNameError }}
              </template>
            </vs-input>
          </div>

          <div class="col-12 col-md-6 col-lg-4">
            <vs-input v-model="$parent.form.user.nationality"
                      :placeholder="$t('invoice.inputs.user.nationality')"
            >
              <template #icon>
                <i class='bx bx-globe' aria-hidden="true"></i>
              </template>
              <template #message-danger v-if="$parent.userNationalityError">
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
              {{ $t('invoice.buttons.next')}}

              <template #animate v-if="$parent.userNationalityError === false && $parent.userNameError === false ">
                <i class='bx bx-right-arrow-alt fs-2'  aria-hidden="true"></i>
              </template>
              <template #animate v-else>
                <i class='bx bx-x fs-2'  aria-hidden="true"></i>
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
  name: "Step_2",
}
</script>

<style scoped>

</style>