<template>
    <div>
        <table>
            <tr :class="[horizontalSplitTop(lineIndex), horizontalSplitBottom(lineIndex)]" v-for="(line, lineIndex) in lines">
                <td :class="[verticalSplitLeft(valueIndex), verticalSplitRight(valueIndex)]" v-for="(value, valueIndex) in line">
                    <cell :max="size*size" :column="valueIndex" :line="lineIndex" :value="value"></cell>
                </td>
            </tr>
        </table>
        <button v-on:click="check">Vérifier</button>
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
          lines: [],
          uuid: ''
        }
      },
      methods: {
        check () {
          axios.put('http://127.0.0.1:8000/check/uuid/' + this.uuid, {test: this.lines})
            .then((response) => {
              this.$nextTick(() => {
                console.log(response)
              })
            })
        },
        horizontalSplitTop (index) {
          return (index + 1) % this.size === 0 ? 'horizontalBarTop' : ''
        },
        horizontalSplitBottom (index) {
          return (index) % this.size === 0 ? 'horizontalBarBottom' : ''
        },
        verticalSplitLeft (index) {
          return (index) % this.size === 0 ? 'verticalBarLeft' : ''
        },
        verticalSplitRight (index) {
          return (index + 1) % this.size === 0 ? 'verticalBarRight' : ''
        }
      },
      mounted () {
        axios.get('http://127.0.0.1:8000/size/' + this.size)
          .then((response) => {
            this.$nextTick(() => {
              this.uuid = response.data.content.uuid
              this.lines = response.data.content.puzzle.puzzle
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
    td {
        padding: 0;
        height: 50px;
        width: 50px;
    }
    td.content {
        position: relative;
    }
    .horizontalBarTop > td {
        border-bottom: solid 3px black;
    }
    .horizontalBarBottom > td {
        border-top: solid 3px black;
    }
    .verticalBarLeft {
        border-left: solid 3px black !important;
    }
    .verticalBarRight {
        border-right: solid 3px black !important;
    }
    html, body, div, span, applet, object, iframe,
    h1, h2, h3, h4, h5, h6, p, blockquote, pre,
    a, abbr, acronym, address, big, cite, code,
    del, dfn, em, img, ins, kbd, q, s, samp,
    small, strike, strong, sub, sup, tt, var,
    b, u, i, center,
    dl, dt, dd, ol, ul, li,
    fieldset, form, label, legend,
    table, caption, tbody, tfoot, thead, tr, th, td,
    article, aside, canvas, details, embed,
    figure, figcaption, footer, header, hgroup,
    menu, nav, output, ruby, section, summary,
    time, mark, audio, video {
        margin: 0;
        padding: 0;
        border: 0;
        font-size: 100%;
        font: inherit;
        vertical-align: baseline;
    }
    /* HTML5 display-role reset for older browsers */
    article, aside, details, figcaption, figure,
    footer, header, hgroup, menu, nav, section {
        display: block;
    }
    body {
        line-height: 1;
    }
    ol, ul {
        list-style: none;
    }
    blockquote, q {
        quotes: none;
    }
    blockquote:before, blockquote:after,
    q:before, q:after {
        content: '';
        content: none;
    }
    table {
        border-collapse: collapse;
        border-spacing: 0;
    }
</style>