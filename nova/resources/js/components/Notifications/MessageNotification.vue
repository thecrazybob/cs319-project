<template>
  <div>
    <div class="flex-none pl-4">
      <Icon :type="icon" :class="notification.iconClass" />
    </div>

    <div class="flex-auto px-4">
      <div class="flex items-center">
        <div class="flex-auto">
          <p class="mr-1 leading-normal">
            {{ notification.message }}
          </p>
        </div>
        <button
          class="flex-none ml-auto"
          @click.prevent.stop="$emit('mark-as-read')"
        >
          <Icon
            type="x-circle"
            :solid="true"
            class="text-gray-300 dark:text-gray-600"
          />
        </button>
      </div>

      <DefaultButton v-if="hasUrl" @click="handleClick" size="sm" class="mt-4">
        {{ notification.actionText }}
      </DefaultButton>
    </div>
  </div>
</template>

<script>
import { mapMutations } from 'vuex'

export default {
  name: 'MessageNotification',

  props: {
    notification: {
      type: Object,
      required: true,
    },
  },

  methods: {
    ...mapMutations(['toggleNotifications']),

    handleClick() {
      this.toggleNotifications()
      this.visit()
    },

    visit() {
      if (this.hasUrl) {
        return Nova.visit(this.notification.actionUrl)
      }
    },
  },

  computed: {
    icon() {
      return this.notification.icon
    },

    hasUrl() {
      return this.notification.actionUrl
    },
  },
}
</script>
