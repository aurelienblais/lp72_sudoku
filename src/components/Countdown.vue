<template>
  <div id="countdown">
    <div class="segment" id="minutes">
      {{ ("00" + countdown.minutes).slice(-2) }}
    </div>
    :
    <div class="segment" id="seconds">
      {{ ("00" + countdown.seconds).slice(-2) }}
    </div>
  </div>
</template>

<script>
export default {
  props: ['countdown'],
  mounted () {
    let interval = setInterval(() => {
      if (this.countdown.seconds === 0) {
        this.countdown.minutes--
        this.countdown.seconds = 60
      }
      this.countdown.seconds--
      if (this.countdown.minutes === 0 && this.countdown.seconds === 0) {
        this.notify()
        clearInterval(interval)
      }
    }, 1000)
  },
  methods: {
    notify () {
      this.$parent.$emit('end')
    }
  }
}
</script>

<style scoped>
  #countdown {
    width: 200px;
    height: 40px;
    font-size: 22pt;
    text-align: center;
    letter-spacing: 8px;
    border: 4px solid black;
    border-radius: 10px;
  }

  #countdown * {
    display: inline-block;
  }

  .segment {

  }
</style>
