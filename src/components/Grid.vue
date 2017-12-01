<template>
    <div>
        <div class="row">
            <div class="col s4 offset-s4">
                <countdown :countdown="this.d[difficulty].countdown"></countdown>
            </div>
        </div>
        <div class="card lime lighten-5 col s8 offset-s2">
            <div class="card-content">
                <div class="row">
                    <div class="col s12">
                        <table class="browser-default">
                            <tr :class="[horizontalSplitTop(lineIndex), horizontalSplitBottom(lineIndex), 'browser-default']"
                                v-for="(line, lineIndex) in lines">
                                <td :class="[verticalSplitLeft(valueIndex), verticalSplitRight(valueIndex), 'browser-default']"
                                    v-for="(value, valueIndex) in line">
                                    <cell :max="size*size" :column="valueIndex" :line="lineIndex" :value="value"></cell>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <p class="center-align">
                    <a id="check" class="waves-effect waves-light btn blue-text text-darken-2 white" v-on:click="check">
                        Vérifier        <i id="spinner" class="hide fa fa-circle-o-notch fa-1x fa-spin"
                                           aria-hidden="true"></i>
                    </a>
                    <a id="check" href="/" class="waves-effect waves-light btn white-text text-darken-2 red">
                        Retour
                    </a>

                </p>
            </div>
        </div>
    </div>
</template>


<script>
  import axios from 'axios'
  import cell from '@/components/Cell'
  import Countdown from '@/components/Countdown'

  export default {
    components: {cell, Countdown},
    props: ['size', 'difficulty'],
    data: function () {
      return {
        lines: [],
        uuid: '',
        d: {
          easy: {
            countdown: {
              minutes: this.size * 10,
              seconds: 0
            },
            filled: this.size * this.size * this.size * this.size * 0.75
          },
          medium: {
            countdown: {
              minutes: this.size * 7,
              seconds: 0
            },
            filled: this.size * this.size * this.size * this.size * 0.50
          },
          hard: {
            countdown: {
              minutes: this.size * 5,
              seconds: 0
            },
            filled: this.size * this.size * this.size * this.size * 0.25
          }
        }
      }
    },
    methods: {
      check () {
        document.querySelector('#spinner').classList.remove('hide')
        axios.put('http://thibaudrey.pro/API/web/app.php/check/uuid/' + this.uuid, {test: this.lines})
          .then((response) => {
            this.$nextTick(() => {
              document.querySelector('#check').classList.remove('white')
              document.querySelector('#check').classList.remove('blue-text')
              document.querySelector('#spinner').classList.remove('fa-circle-o-notch')
              document.querySelector('#spinner').classList.remove('fa-spin')
              document.querySelector('#check').classList.add('white-text')
              if (response.data.content === true) {
                document.querySelector('#check').classList.add('green')
                document.querySelector('#spinner').classList.add('fa-check')
                setTimeout(() => {
                  location.href = '/'
                }, 2500)
              } else {
                document.querySelector('#check').classList.add('red')
                document.querySelector('#spinner').classList.add('fa-times')
              }
            })
            setTimeout(() => {
              document.querySelector('#check').classList.remove('red')
              document.querySelector('#spinner').classList.remove('fa-times')
              document.querySelector('#check').classList.add('white')
              document.querySelector('#check').classList.add('blue-text')
              document.querySelector('#spinner').classList.add('fa-circle-o-notch')
              document.querySelector('#spinner').classList.add('fa-spin')
              document.querySelector('#spinner').classList.add('hide')
            }, 3000)
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
      axios.get('http://thibaudrey.pro/API/web/app.php/size/' + this.size + /filled/ + this.d[this.difficulty].filled)
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
    }

    td.content {
        position: relative;
    }

    input[type=number]:after {
        content: "";
        display: block;
        padding-bottom: 100%;
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
        border: 0;
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
        margin: 0 auto;
        border-collapse: collapse;
        border-spacing: 0;
        width: 40vw !important;
        height: 40vw !important;
    }
</style>
