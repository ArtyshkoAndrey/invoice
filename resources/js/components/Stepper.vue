<template>
  <div class="row justify-content-center w-100">
    <div v-for="step in steps" class="d-flex w-auto wrapper_step">
      <div class="border some_step d-flex justify-content-center align-items-center rounded-circle"
           :class="step.status"
           @click="setStatusStep(step)"
      >
        <i v-if="step.status === 'success'" class="bx bx-check" aria-hidden="true" />
        <span v-else class="d-flex">{{ step.step }}</span>
      </div>
    </div>
  </div>
</template>

<script>
import Vue from "vue";

export default {
  name: "Stepper",
  props: {
    count: {
      type: Number,
      required: false,
      default: 5
    },
    successfully: {
      type: Boolean,
      required: false,
      default: false
    },
    bus: {
      type: Vue,
      required: true
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
      status = this.successfully ? 'success' : 'default'
      if (s === 0) {
        status = 'active'
        this.localStep = {
          step: s + 1,
          status: this.successfully  ? 'success' : 'default',
        }
      }

      this.steps.push(
        {
          status: status,
          step: s + 1
        }
      )
      s++
    }

    this.bus.$on('setStatus', this.setStatus)
  },
  methods: {
    setStatus (s) {
      let step = this.steps.find(st => st.step === s.step + 1)
      if (this.localStep.step === s.step) {
        this.localStep.status = s.status
      }
      console.log('load new Status', step)
      this.setStatusStep(step)
    },
    setStatusStep (step) {
      console.log('parent step', step.status === 'default' && this.localStep.status === 'default')
      if (step.status === 'default' &&
          step.step - this.localStep.step >= 1 &&
          (step.status === 'default' && this.localStep.status === 'default')
      ) {
        console.log('set step if False')
        return false
      } else {
        let s = this.steps.find(st => st.step === this.localStep.step)
        s.status = this.localStep.status
        console.log('is this step', s)
        this.localStep = {
          step: step.step,
          status: step.status
        }

        step.status = 'active'

        console.log('new step', step)

        this.bus.$emit('changeStep', step.step)
      }
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