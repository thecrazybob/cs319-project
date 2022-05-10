import { createStore } from 'vuex'
import nova from './nova'

export function registerStore(app) {
  app.use(
    createStore({
      ...nova,
    })
  )
}
