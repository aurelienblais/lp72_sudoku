import Vue from 'vue'
import Router from 'vue-router'
import Game from '@/components/Game'
import Menu from '@/components/Menu'

Vue.use(Router)

const EventBus = new Vue()

Object.defineProperties(Vue.prototype, {
  $bus: {
    get: function () {
      return EventBus
    }
  }
})

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Menu',
      component: Menu
    },
    {
      path: '/play',
      name: 'Game',
      component: Game
    }
  ]
})
