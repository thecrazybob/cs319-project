<template>
  <span
    class="whitespace-nowrap px-2 py-1 rounded-full uppercase text-xs font-bold"
    :class="extraClasses"
  >
    {{ label }}
  </span>
</template>

<script>
export default {
  props: {
    label: {
      type: [Boolean, String],
      required: false,
    },

    extraClasses: {
      type: [Array, String],
      required: false,
    },
  },
}
</script>
