<template>
  <div class="row justify-content-center w-100">
    <div v-for="step in steps" class="d-flex w-auto wrapper_step">
      <div class="border some_step d-flex justify-content-center align-items-center rounded-circle"
          :class="step.status"
          @click="setStatusStep(step)"
      >
        <span class="d-flex">{{ step.step + 1 }}</span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Stepper",
  props: {
    count: {
      type: Number,
      required: false,
      default: 5
    }
  },
  data: () => ({
    steps: [],
    localStep: {},
  }),
  mounted () {
    let s = 0
    let status
    while (s < this.count) {
      status = 'default'
      if (s === 0) {
        status = 'active'
        this.localStep = {
          step: s,
          status: 'success',
        }
      }

      this.steps.push(
        {
          status: status,
          step: s
        }
      )
      s++
    }
  },
  methods: {
    setStatusStep (step) {
      let s = this.steps.find(st => st.step === this.localStep.step)
      s.status = this.localStep.status
      console.log('step', s)
      this.localStep = {
        step: step.step,
        status: step.status
      }

      step.status = 'active'
    }
  }
}
</script>

<style lang="scss" scoped>

  .wrapper_step {
    padding: 0;

    margin-left: 30px;
    margin-right: 30px;

    &:first-child {
      margin-left: 0;
    }
    &:last-child {
      margin-right: 0;

      .some_step {
        &:after {
          content: none;
        }
      }
    }
  }

  .some_step {
    background: transparent;
    height: 40px;
    width: 40px;
    cursor: pointer;
    position: relative;
    border-color: rgb(var(--vs-gray-4)) !important;


    &:after {
      content: '';
      display: block;
      position: absolute;
      height: 2px;
      top: calc(50% - 2px);
      width: 60px;
      background: rgb(var(--vs-gray-4)) !important;
      left: 40px;
    }

    &.active {
      background: rgb(var(--vs-primary));
      border-color: rgb(var(--vs-primary)) !important;
      color: white;
    }

    &.success {
      background: rgb(var(--vs-success));
      border-color: rgb(var(--vs-success)) !important;
      color: white;
    }
  }
</style>