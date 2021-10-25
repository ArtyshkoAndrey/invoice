<template>
  <div class="card">
    <div class="card-title px-3 pb-2 pt-4">
      <h6 class="fw-light text-reset">
        {{ $t('invoice.create.words.step') }} 1 {{ $t('invoice.create.words.in') }} 6 <span
          class="fw-bolder"
        >{{ $t('invoice.create.step_1.title') }}</span>
      </h6>
    </div>

    <div class="card-body p-0 pb-3">
      <div class="mx-3 my-2">
        <div class="row">
          <div class="col-12 col-md-6 col-lg-4">
            <vs-select v-model="$parent.form.company" :placeholder="$t('invoice.inputs.company_name')" class="mw-100">
              <template v-if="$parent.companyError" #message-danger>
                {{ $parent.companyError }}
              </template>
              <vs-option v-for="c in companies"
                         :key="c.id"
                         :label="c.name"
                         :value="c.id"
              >
                {{ c.name }}
              </vs-option>
            </vs-select>
          </div>
          <div class="col-12 col-md-6 col-lg-4 mt-2 mt-md-0">
            <vs-select v-model="$parent.form.company"
                       :placeholder="$t('invoice.inputs.company_ref')"
                       class="mw-100"
            >
              <template v-if="$parent.companyError" #message-danger>
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

              <template v-if="$parent.companyError === false" #animate>
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