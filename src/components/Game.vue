<template>
  <div>
      <div class="mask">
          <div>
              <h1>U LOOSE</h1>
              <button>Retry</button>
          </div>
      </div>
    <countdown :countdown="countdown"></countdown>
    <grid size=2></grid>
  </div>
</template>

<script>
import Countdown from '@/components/Countdown'
import Grid from '@/components/Grid'

export default {
  components: { Countdown, Grid },
  name: 'Game',
  data: () => ({
    countdown: {
      minutes: 10,
      seconds: 10
    }
  }),
  mounted () {
    this.$on('end', () => {
      document.querySelector('.mask').style.display = 'flex'
    })
  }
}
</script>

<style scoped>

    .mask {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 2;
        background: rgba(0, 0, 0, 0.5);
        display: none;
        justify-content: center;
        align-items: center;
    }
</style>
