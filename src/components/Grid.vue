<template>
    <div>
        <table border="1">
            <tr v-for="(line, lineIndex) in lines">
                <td v-for="(value, valueIndex) in line">
                    <cell :max="size*size" :column="valueIndex" :line="lineIndex" :value="value"></cell>
                </td>
            </tr>
        </table>
        <button v-on:click="check"></button>
    </div>
</template>


<script>
    import axios from 'axios'
    import cell from '@/components/Cell'

    export default {
      components: { cell },
      props: ['size'],
      data: function () {
        return {
          lines: []
        }
      },
      methods: {
        check () {
          axios.get('http://127.0.0.1:8000/size/' + this.size)
            .then((response) => {
              this.$nextTick(() => {
                this.lines = response.data.content.puzzle
              })
            })
        }
      },
      mounted () {
        axios.get('http://127.0.0.1:8000/size/' + this.size)
          .then((response) => {
            this.$nextTick(() => {
              this.lines = response.data.content.puzzle
            })
          })
      },
      beforeUpdate () {
        this.$on('updateGrid', (line, column, value) => {
          this.lines[line][column] = value
        })
      }
    }
</script>

<style scoped>
    table {
        border: solid 1px black;
    }

    tr {
        padding: 10px;
    }

    td {
        padding: 10px;
    }
</style>