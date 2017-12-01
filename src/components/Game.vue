<template>
    <div>
        <div class="mask">
            <div>
                <h1>Perdu !</h1>
                <a v-on:click="reload" class="waves-effect waves-light btn">Rejouer</a>
            </div>
        </div>
        <grid :difficulty="$route.query.difficulty" :size="$route.query.size"></grid>
    </div>
</template>

<script>
  import Grid from '@/components/Grid'

  export default {
    components: {Grid},
    props: ['size'],
    name: 'Game',
    methods: {
      reload () {
        location.reload()
      }
    },
    mounted () {
      this.$bus.$on('end', () => {
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
