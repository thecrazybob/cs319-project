<template>
  <div>
    <Badge :label="field.label" :extra-classes="field.typeClass" />
  </div>
</template>

<script>
export default {
  props: ['resourceName', 'viaResource', 'viaResourceId', 'field'],
}
</script>
