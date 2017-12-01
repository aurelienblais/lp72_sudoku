<template>
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Sudoku</span>
                        <form>
                            Taille :
                            <div class="inline">
                                <input v-on:click="updateSize" class="with-gap" name="size" type="radio" id="4" checked
                                       value="2"/>
                                <label for="4">4</label>
                            </div>
                            <div class="inline">
                                <input v-on:click="updateSize" class="with-gap" name="size" type="radio" id="9"
                                       value="3"/>
                                <label for="9">9</label>
                            </div>
                            <div class="inline">
                                <input v-on:click="updateSize" class="with-gap" name="size" type="radio" id="16"
                                       value="4"/>
                                <label for="16">16</label>
                            </div>
                            <br>
                            Difficulté :
                            <div class="inline">
                                <input v-on:click="updateDifficulty" class="with-gap" name="difficulty" type="radio"
                                       value="easy" id="easy" checked/>
                                <label for="easy">Facile</label>
                            </div>
                            <div class="inline">
                                <input v-on:click="updateDifficulty" class="with-gap" name="difficulty" type="radio"
                                       value="medium" id="medium"/>
                                <label for="medium">Moyenne</label>
                            </div>
                            <div class="inline">
                                <input v-on:click="updateDifficulty" class="with-gap" name="difficulty" type="radio"
                                       value="hard" id="hard"/>
                                <label for="hard">Difficile</label>
                            </div>
                        </form>
                    </div>
                    <div class="card-action">
                        <router-link :to="'/play?size=' + s + '&difficulty=' + d">Jouer</router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: 'Menu',
    data: function () {
      return {
        s: 2,
        d: 'easy'
      }
    },
    methods: {
      updateSize (e) {
        this.s = e.target.value
      },
      updateDifficulty (e) {
        this.d = e.target.value
      }
    }
  }
</script>

<style>
    .inline {
        display: inline;
    }
</style>
