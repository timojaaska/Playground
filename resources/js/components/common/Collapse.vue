<template>
  <div class="compo-collapse">
    <div>
      <div class="d-flex align-items-center" @click.stop="toggle()">
        <div class="header">
          <slot name="header" />
        </div>
        <svg-vue :icon="collapseIcon" :title="collapseButtonTitle" class="svg class ms-2" />
      </div>
    </div>
    <div :class="[contentClass, {'collapse' : collapsible}]">
      <slot name="content" />
    </div>
  </div>
</template>

<script>

import { Collapse } from 'bootstrap';

export default {
  props: {
    title: {
      type: String,
      default: ''
    },
    showIcon: {
      type: String,
      default: 'chevron-down'
    },
    hideIcon: {
      type: String,
      default: 'chevron-up'
    },
    collapsible: {
      type: Boolean,
      default: true
    },
    initiallyCollapsed: {
      type: Boolean,
      default: true
    },
    contentClass: {
      type: String,
      default: ''
    },
    helpText: {
      type: Object,
      default: () => {
      }
    }
  },
  emits:['show', 'hide'],
  data() {
    return {
      collapsed: this.initiallyCollapsed,
    }
  },
  computed: {
    collapseIcon: function() {
      if (this.collapsed) {
        return this.showIcon;
      }
      return this.hideIcon;
    },
    collapseButtonTitle: function() {
      if (this.collapsed) {
        return this.$t('common.expand');
      }
      return this.$t('common.minimize');
    }
  },
  mounted() {
    var collapseEle = this.$el.getElementsByClassName('collapse')[0];
    var collapse = new Collapse(collapseEle, {
      toggle: false
    })
    collapseEle.addEventListener('show.bs.collapse', () => {
      this.collapsed = false;
      this.$emit('show')
    })
    collapseEle.addEventListener('hide.bs.collapse', () => {
      this.collapsed = true;
      this.$emit('hide')
    })
    if (!this.initiallyCollapsed) {
      collapse.show();
    }
  },
  methods: {
    toggle() {
      var collapseEle = this.$el.getElementsByClassName('collapse')[0];
      var collapse = Collapse.getInstance(collapseEle)
      collapse.toggle();
    },
    show() {
      var collapseEle = this.$el.getElementsByClassName('collapse')[0];
      var collapse = Collapse.getInstance(collapseEle)
      collapse.show();
    },
    hide() {
      var collapseEle = this.$el.getElementsByClassName('collapse')[0];
      var collapse = Collapse.getInstance(collapseEle)
      collapse.hide();
    },
  }
}

</script>

<style lang="scss" scoped>
.compo-collapse {
  svg {
    width: 18px;
    height: 18px;
  }
}
.header {
  cursor: pointer;
}
</style>