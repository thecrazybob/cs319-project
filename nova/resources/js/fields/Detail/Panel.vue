<template>
  <div>
    <slot>
      <Heading :level="1" v-text="panel.name" />

      <p
        v-if="panel.helpText"
        class="text-gray-500 text-sm font-semibold italic"
        :class="panel.helpText ? 'mt-2' : 'mt-3'"
        v-html="panel.helpText"
      ></p>
    </slot>

    <Card class="mt-3 py-2 px-6">
      <component
        :key="index"
        v-for="(field, index) in fields"
        :index="index"
        :is="resolveComponentName(field)"
        :resource-name="resourceName"
        :resource-id="resourceId"
        :resource="resource"
        :field="field"
        @actionExecuted="actionExecuted"
      />

      <div
        v-if="shouldShowShowAllFieldsButton"
        class="bg-20 -mt-px -mx-6 -mb-6 border-t border-40 p-3 text-center rounded-b"
      >
        <button
          class="block w-full text-sm text-gray-500 font-bold"
          @click="showAllFields"
        >
          {{ __('Show All Fields') }}
        </button>
      </div>
    </Card>
  </div>
</template>

<script>
import { BehavesAsPanel } from '@/mixins'

export default {
  mixins: [BehavesAsPanel],

  methods: {
    /**
     * Resolve the component name.
     */
    resolveComponentName(field) {
      return field.prefixComponent
        ? 'detail-' + field.component
        : field.component
    },

    /**
     * Show all of the Panel's fields.
     */
    showAllFields() {
      return (this.panel.limit = 0)
    },
  },

  computed: {
    /**
     * Limits the visible fields.
     */
    fields() {
      if (this.panel.limit > 0) {
        return this.panel.fields.slice(0, this.panel.limit)
      }

      return this.panel.fields
    },

    /**
     * Determines if should display the 'Show all fields' button.
     */
    shouldShowShowAllFieldsButton() {
      return this.panel.limit > 0
    },
  },
}
</script>
