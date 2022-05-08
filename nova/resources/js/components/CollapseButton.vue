<template>
  <IconArrow class="transform" :class="{ '-rotate-90': collapsed }" />
</template>

<script>
export default {
  props: {
    collapsed: {
      type: Boolean,
      default: false,
    },
  },
}
</script>
