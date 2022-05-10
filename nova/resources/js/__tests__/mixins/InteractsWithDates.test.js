import InteractsWithDates from '@/mixins/InteractsWithDates'

require('jsdom-global')()

const VueTestUtils = require('@vue/test-utils')

afterAll(() => {
  delete global.Nova
})

test('it can get user timezone', () => {
  global.Nova = {
    config: {
      timezone: 'UTC',
      userTimezone: 'Asia/Kuala_Lumpur',
    },
  }

  const MessageComponent = {
    template: '<div></div>',
    mixins: [InteractsWithDates],
  }

  const wrapper = VueTestUtils.shallowMount(MessageComponent)

  expect(wrapper.vm.userTimezone).toBe('Asia/Kuala_Lumpur')
})

test('it can fallback to application timezone if user does not define timezone', () => {
  global.Nova = {
    config: {
      timezone: 'UTC',
    },
  }

  const MessageComponent = {
    template: '<div></div>',
    mixins: [InteractsWithDates],
  }

  const wrapper = VueTestUtils.shallowMount(MessageComponent)

  expect(wrapper.vm.userTimezone).toBe('UTC')
})
