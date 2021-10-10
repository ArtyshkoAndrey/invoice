<template>
  <div class="card">
    <div class="card-title px-3 pb-2 pt-4">
      <h6 class="fw-light text-reset">Шаг 1 из 5 <span class="fw-bolder">Компания</span></h6>
    </div>

    <div class="card-body p-0 pb-3">
      <div class="mx-3 my-2">
        <div class="row">
          <div class="col-12 col-md-6 col-lg-4">

            <vs-select class="mw-100" :placeholder="$t('invoice.inputs.company_name')" v-model="$parent.form.company">
              <template #message-danger v-if="$parent.companyError">
                {{ $parent.companyError }}
              </template>
              <vs-option v-for="c in companies"
                         :label="c.name"
                         :value="c.id"
                         :key="c.id"
              >
                {{ c.name }}
              </vs-option>
            </vs-select>

          </div>
          <div class="col-12 col-md-6 col-lg-4">
            <vs-select class="mw-100"
                       :placeholder="$t('invoice.inputs.company_ref')"
                       v-model="$parent.form.company"
            >
              <template #message-danger v-if="$parent.companyError">
                {{ $parent.companyError }}
              </template>
              <vs-option v-for="c in companies" :key="c.id" :label="c.code" :value="c.id">
                {{ c.code }}
              </vs-option>
            </vs-select>
          </div>
        </div>
        <div class="row justify-content-end">
          <div class="col-auto">
            <vs-button
              flat
              @click="$parent.next"
            >
              {{ $t('invoice.buttons.next') }}

              <template #animate v-if="$parent.companyError === false">
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
  name: "Step1",
  props: {
    companies: {
      required: true,
      type: Array
    }
  }
}
</script>

<style scoped>

</style>