<template>
    <div class="container">
        <div class="section">
            <div class="row">
                <div class="col s12">
                    <div id="app">
                        <router-view/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: 'app'
  }
</script>

<style>
    #app {
        font-family: 'Avenir', Helvetica, Arial, sans-serif;
    }
</style>
