<template>
  <BasicButton
    v-bind="{ ...$props, ...$attrs }"
    :component="component"
    ref="button"
    class="shadow relative bg-red-400 hover:bg-red-100 active:bg-red-600 text-red-50 hover:text-red-600 active:text-white dark:text-gray-900"
  >
    <slot />
  </BasicButton>
</template>

<script>
export default {
  props: {
    size: {
      type: String,
      default: 'lg',
    },

    align: {
      type: String,
      default: 'center',
      validator: v => ['left', 'center'].includes(v),
    },

    component: {
      type: String,
      default: 'button',
    },
  },

  methods: {
    focus() {
      this.$refs.button.focus()
    },
  },
}
</script>
