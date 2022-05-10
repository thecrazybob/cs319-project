<template>
  <DefaultField
    :field="currentField"
    :errors="errors"
    :show-help-text="showHelpText"
  >
    <template #field>
      <div class="flex items-center">
        <input
          type="datetime-local"
          class="form-control form-input form-input-bordered"
          ref="dateTimePicker"
          :id="currentField.uniqueKey"
          :dusk="field.attribute"
          :name="field.name"
          :value="formattedDate"
          :class="errorClasses"
          :disabled="currentlyIsReadonly"
          @change="handleChange"
          step="1"
        />

        <span class="ml-3">
          {{ timezone }}
        </span>
      </div>
    </template>
  </DefaultField>
</template>

<script>
import isNil from 'lodash/isNil'
import { DateTime } from 'luxon'
import { DependentFormField, HandlesValidationErrors } from '@/mixins'

export default {
  mixins: [HandlesValidationErrors, DependentFormField],

  data: () => ({
    formattedDate: '',
  }),

  methods: {
    /*
     * Set the initial value for the field
     */
    setInitialValue() {
      if (!isNil(this.currentField.value)) {
        let isoDate = DateTime.fromISO(this.currentField.value, {
          zone: Nova.config('timezone'),
        })

        this.value = isoDate.toString()

        isoDate = isoDate.setZone(this.timezone)

        this.formattedDate = [
          isoDate.toISODate(),
          isoDate.toFormat('HH:mm:ss'),
        ].join('T')
      }
    },

    /**
     * On save, populate our form data
     */
    fill(formData) {
      formData.append(this.field.attribute, this.value || '')
    },

    /**
     * Update the field's internal value
     */
    handleChange(event) {
      let value = event?.target?.value ?? event

      if (filled(value)) {
        this.value = DateTime.fromISO(value, { zone: this.timezone })
          .setZone(Nova.config('timezone'))
          .toString()
      } else {
        this.value = ''
      }

      if (this.field) {
        this.emitFieldValueChange(this.field.attribute, this.value)
      }
    },
  },

  computed: {
    timezone() {
      return Nova.config('userTimezone') || Nova.config('timezone')
    },
  },
}

function filled(value) {
  return !isNil(value) && value !== ''
}
</script>
