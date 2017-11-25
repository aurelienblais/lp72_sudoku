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
  props: ['countdown']
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
