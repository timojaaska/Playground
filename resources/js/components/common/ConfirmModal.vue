<template>
  <modal :show="show">
    <div class="modal-header">
      <h5 class="modal-title">
        {{ title }}
      </h5>
      <button
        type="button"
        class="btn-close"
        @click.stop="onClose"
        data-bs-dismiss="modal"
        aria-label="Close"
      />
    </div>
    <div class="modal-body">
      <p>{{ message }}</p>
    </div>
    <div class="modal-footer">
      <div class="d-flex justify-content-end">
        <button
          type="button"
          v-if="cancelButtonLabel"
          :disabled="isLoading"
          class="btn btn-secondary"
          @click="onClose"
        >
          {{ cancelButtonLabel }}
        </button>
        <button
          type="button"
          v-if="acceptButtonLabel"
          :disabled="isLoading"
          class="btn btn-danger ms-1"
          @click="onOk"
        >
          {{ acceptButtonLabel }}
        </button>
      </div>
    </div>
  </modal>
</template>

<script>
import Modal from './Modal.vue'

export default {
  components: {
    Modal
  },
  props: {
    show: {
      type: Boolean,
      required: true
    },
    title: {
      type: String,
      required: true,
    },
    message: {
      type: String,
      required: true
    },
    acceptButtonLabel: {
      type: String,
      required: true
    },
    cancelButtonLabel: {
      type: String,
      required: true
    },
    isLoading: {
      type: Boolean,
      required: false
    },
  },
  emits: ['close'],
  methods: {
    onOk() {
      this.$emit('close', true)
    },
    onClose() {
      this.$emit('close', false)
    },
    handleBackdropClick(e) {
      //if (e.target.className === "modal fade show") this.onClose()
    }
  }

}
</script>