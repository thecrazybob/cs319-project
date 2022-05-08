<template>
  <div class="flex relative" :class="$attrs.class">
    <select
      v-bind="defaultAttributes"
      v-model="selected"
      @change="handleChange"
      class="w-full block form-control form-select"
      :multiple="multiple"
      ref="selectControl"
      :class="{
        'form-control-sm': size == 'sm',
        'form-control-xs': size == 'xs',
        'form-control-xxs': size == 'xxs',
        'form-select-multiple': multiple,
        'form-select-bordered': bordered,
        ...selectClasses,
      }"
    >
      <slot />
      <template v-for="(options, group) in groupedOptions">
        <optgroup :label="group" v-if="group" :key="group">
          <option
            v-bind="attrsFor(option)"
            v-for="option in options"
            :key="option.value"
            :selected="isSelected(option)"
          >
            {{ labelFor(option) }}
          </option>
        </optgroup>
        <template v-else>
          <option
            v-bind="attrsFor(option)"
            v-for="option in options"
            :key="option.value"
            :selected="isSelected(option)"
          >
            {{ labelFor(option) }}
          </option>
        </template>
      </template>
    </select>

    <IconArrow v-if="!multiple" class="pointer-events-none form-select-arrow" />
  </div>
</template>

<script>
import groupBy from 'lodash/groupBy'
import map from 'lodash/map'
import omit from 'lodash/omit'

export default {
  emits: ['change'],

  inheritAttrs: false,

  props: {
    options: {
      type: Array,
      default: [],
    },
    label: { default: 'label' },
    selected: {},
    size: {
      type: String,
      default: 'md',
      validator: val => ['xxs', 'xs', 'sm', 'md'].includes(val),
    },
    bordered: {
      type: Boolean,
      default: true,
    },
    multiple: {
      type: Boolean,
      default: false,
    },
    selectClasses: {
      type: [String, Object, Array],
    },
  },

  methods: {
    labelFor(option) {
      return this.label instanceof Function
        ? this.label(option)
        : option[this.label]
    },

    attrsFor(option) {
      return {
        ...(option.attrs || {}),
        ...{ value: option.value },
      }
    },

    isSelected(option) {
      if (!this.multiple) {
        return option.value == this.selected
      }

      return this.selected.indexOf(option.value) > -1
    },

    handleChange(event) {
      let selected

      if (this.multiple) {
        selected = map(event.target.selectedOptions, option => {
          return option.value
        })
      } else {
        selected = event.target.value
      }

      this.$emit('change', selected)
    },

    resetSelection() {
      this.$refs.selectControl.selectedIndex = 0
    },
  },

  computed: {
    defaultAttributes() {
      return omit(this.$attrs, ['class'])
    },

    groupedOptions() {
      return groupBy(this.options, option => option.group || '')
    },
  },
}
</script>
