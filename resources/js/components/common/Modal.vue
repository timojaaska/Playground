<template>
  <div
    class="modal fade"
    :class="[{ show: show }, sizeClass]"
    tabindex="-1"
    role="dialog"
    aria-hidden="true"
    :style="{display: show ? 'block': 'none'}"
    @click.stop="$emit('close')"
  >
    <div class="modal-dialog" role="document" @click.stop>
      <div class="modal-content">
        <slot />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    show: {
      type: Boolean,
      required: true
    },
    variant: {
      type: String,
      default: ''
    }
  },
  emits: ['close'],
  computed: {
    sizeClass() {
      if (this.variant) {
        return `modal-${this.variant}`
      }
      return ''
    }
  },
}
</script>

<style scoped>
.modal.fade {
  background: rgba(0,0,0,0.50);
  backdrop-filter: blur(6px);
  -webkit-backdrop-filter: blur(6px);
}
</style>