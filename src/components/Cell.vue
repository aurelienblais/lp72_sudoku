<template>
    <input min="1" :max="max" :data-line="line" :data-column="column" v-on:change="update" type="number" v-if="value != 0" :value="value">
    <input min="1" :max="max" :data-line="line" :data-column="column" v-on:change="update" type="number" v-else="">
</template>


<script>
  export default {
    props: ['value', 'column', 'line', 'max'],
    data: function () {
      return {
      }
    },
    methods: {
      update (e) {
        this.$parent.$emit('updateGrid', e.target.getAttribute('data-line'), e.target.getAttribute('data-column'), parseInt(e.target.value))
      }
    }
  }
</script>

<style scoped>
    input {
        max-width: 1em;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        /* display: none; <- Crashes Chrome on hover */
        -webkit-appearance: none;
        margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
    }
</style>