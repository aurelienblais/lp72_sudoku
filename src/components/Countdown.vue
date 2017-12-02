<template>
    <div class="card blue-grey darken-3 white-text">
        <div class="card-content">
            <div id="countdown">
                <div class="segment" id="minutes">
                    {{ ("00" + countdown.minutes).slice(-2) }}
                </div>
                :
                <div class="segment" id="seconds">
                    {{ ("00" + countdown.seconds).slice(-2) }}
                </div>
            </div>
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
        this.$bus.$emit('end')
      }
    }
  }
</script>

<style scoped>
    #countdown {
        height: 40px;
        font-size: 22pt;
        text-align: center;
    }

    #countdown * {
        display: inline-block;
    }

    .segment {

    }
</style>
