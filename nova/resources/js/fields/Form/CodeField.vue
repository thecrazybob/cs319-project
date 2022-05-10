<template>
  <DefaultField
    :field="currentField"
    :errors="errors"
    :full-width-content="true"
    :show-help-text="showHelpText"
  >
    <template #field>
      <div class="form-input form-input-bordered px-0 overflow-hidden">
        <textarea ref="theTextarea" :id="currentField.uniqueKey" />
      </div>
    </template>
  </DefaultField>
</template>

<script>
import CodeMirror from 'codemirror'

// Modes

import { DependentFormField, HandlesValidationErrors } from '@/mixins'

export default {
  mixins: [HandlesValidationErrors, DependentFormField],

  codemirror: null,

  /**
   * Mount the component.
   */
  mounted() {
    const config = {
      tabSize: 4,
      indentWithTabs: true,
      lineWrapping: true,
      lineNumbers: true,
      theme: 'dracula',
      ...{ readOnly: this.isReadonly },
      ...this.field.options,
    }
    this.codemirror = CodeMirror.fromTextArea(this.$refs.theTextarea, config)
    this.codemirror?.getDoc()?.on('change', (cm, changeObj) => {
      this.value = cm.getValue()
    })

    this.setInitialValue()
  },

  methods: {
    /*
     * Set the initial value for the field
     */
    setInitialValue() {
      this.codemirror?.getDoc()?.setValue(this.currentField.value)
      this.codemirror?.setSize('100%', this.currentField.height)
    },
  },
}
</script>
