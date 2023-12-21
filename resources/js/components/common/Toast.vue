<template>
  <div
    class="toast text-white border-0 me-2 mt-2"
    :class="[{show}, toastBgClass]"
    role="alert"
    aria-live="assertive"
    aria-atomic="true"
  >
    <div class="toast-header text-white" :class="[{show}, headerBgClass]">
      <strong class="me-auto">{{ headerText }}</strong>
      <!-- <small class="text-muted">just now</small> -->
      <button type="button" class="btn-close btn-close-white" @click="onClose" aria-label="Close" />
    </div>
    <div class="toast-body">
      {{ bodyText }}
    </div>
  </div>
</template>

<script>
import { ToastTypes } from '../../common/constants'

export default {
  props: {
    xKey: {
      type: Number,
      required: true,
    },
    type: {
      type: Number,
      required: true,
    },
    headerText: {
      type: String,
      required: true,
    },
    bodyText: {
      type: String,
      required: true,
    }
  },
  emits:['close'],
  data() {
    return {
      show: false,
      timerId: 0
    }
  },
  computed: {
    toastBgClass() {
      switch (this.type) {
        case ToastTypes.SUCCESS: return 'toast-success-bg'
        case ToastTypes.ERROR: return 'toast-danger-bg'
        default: return ''
      }
    },
    headerBgClass() {
      switch (this.type) {
        case ToastTypes.SUCCESS: return 'header-success-bg'
        case ToastTypes.ERROR: return 'header-danger-bg'
        default: return ''
      }
    }
  },
  mounted() {
    console.log('mounted')
    setTimeout(() => {
      this.show=true;
    },0)
    this.timerId = setTimeout(() => {
      this.onClose()
    },5000)
  },
  methods: {
    onClose(){
      clearTimeout(this.timerId)
      this.show=false;
      setTimeout(() => {
        this.$emit('close', this.xKey)
      },0)
    }
  }
};
</script>

<style lang="scss" scoped>
$success-bg: #51a351;
$danger-bg: #cf5f59;
.header-success-bg {
  background-color: $success-bg;
}
.header-danger-bg {
  background-color: $danger-bg;
}
.toast-success-bg {
  background-color: lighten($success-bg, 10%);
}
.toast-danger-bg {
  background-color: lighten($danger-bg, 10%);
}
</style>