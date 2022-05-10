<template>
  <PanelItem :index="index" :field="field">
    <slot name="value">
      <span
        class="mr-3 text-60"
        v-if="field.loadingWords?.includes(field.value)"
      >
        <Loader width="30" />
      </span>

      <p
        v-if="field.value"
        class="text-90"
        :class="{
          'text-red-500': field.failedWords?.includes(field.value),
        }"
      >
        {{ field.value }}
      </p>
      <p v-else>&mdash;</p>
    </slot>
  </PanelItem>
</template>

<script>
export default {
  props: ['index', 'resource', 'resourceName', 'resourceId', 'field'],
}
</script>
