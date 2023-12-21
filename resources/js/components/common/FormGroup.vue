<template>
  <div class="form-group">
    <label :for="id || 'input-' + name" v-if="label">
      {{ label }}
      <span v-if="required" class="text-danger">*</span>
      <!-- <small v-if="labelDescription">&nbsp;({{ labelDescription }})</small> -->
    </label>
    <input
      v-if="type!=='textarea'"
      :id="id || 'input-' + name"
      :name="name"
      :type="type"
      :placeholder="placeholder"
      :minlength="minlength"
      :maxlength="maxlength"
      class="form-control"
      :class="{'is-invalid': errors}"
      :autocomplete="autocomplete"
      novalidate
      :value="modelValue"
      @change="emitValue"
    >
    <div v-else-if="type==='textarea'">
      <textarea
        :id="id || 'input-' + name"
        :name="name"
        class="form-control"
        :class="{'is-invalid': errors}"
        :disabled="disabled"
        :value="modelValue"
        @change="emitValue"
      />
    </div>
    <div class="invalid-feedback" v-for="(err, i) in errors" :key="i">
      {{ err }}
    </div>
  </div>
</template>

<script>

export default {
  props: {
    id: {
      type: String,
      default: null
    },
    name: {
      type: String,
      default: null
    },
    label: {
      type: String,
      default: null
    },
    type: {
      type: String,
      required: true
    },
    placeholder: {
      type: String,
      default: null
    },
    minlength: {
      type: Number,
      default: null
    },
    maxlength: {
      type: Number,
      default: null
    },
    required: {
      type: Boolean,
      default: false
    },
    disabled: {
      type: Boolean,
      default: false
    },
    autocomplete: {
      type: String,
      default: 'off'
    },
    errors: {
      type: Array,
      default: null
    },
    modelValue: {
      type: [String, Number],
      default: null
    },
    modelModifiers: {
      type: Object,
      default: () => {}
    }
  },
  emits: [
    'update:modelValue'
  ],
  methods: {
    emitValue(e) {
      let value = e.target.value
      if (this.modelModifiers.trim) {
        if (value && typeof value === 'string') {
          value = value.trim()
        }
      }
      this.$emit('update:modelValue', value)
    }
  }
}
</script>