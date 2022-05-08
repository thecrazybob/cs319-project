<template>
  <PanelItem :index="index" :field="field">
    <template #value>
      <Badge
        class="mt-1"
        :label="field.label"
        :extra-classes="field.typeClass"
      />
    </template>
  </PanelItem>
</template>

<script>
export default {
  props: ['index', 'resource', 'resourceName', 'resourceId', 'field'],
}
</script>
