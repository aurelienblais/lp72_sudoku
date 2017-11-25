<template>
  <countdown :countdown="countdown"></countdown>
</template>

<script>
import Countdown from '@/components/Countdown'

export default {
  components: { Countdown },
  name: 'HelloWorld',
  data: () => ({
    countdown: {
      minutes: 60,
      seconds: 0
    }
  })
}
</script>

<style scoped>

</style>
