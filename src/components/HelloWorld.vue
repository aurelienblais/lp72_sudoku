<template>
  <grid size=3></grid>
</template>

<script>
import Grid from '@/components/Grid'

export default {
  components: { Grid },
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
