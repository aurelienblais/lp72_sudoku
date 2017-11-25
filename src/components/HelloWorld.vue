<template>
  <div class="hello">
    <h1>Bienvenue sur notre Sudoku !</h1>

    <div class="container">

      <div class="container">

        <h2>Choisissez une difficultée.</h2>
        <ul>
          <li>
            <input type="radio" id="f-option-facile" name="selector">
            <label for="f-option-facile">Facile</label>

            <div class="check"></div>
          </li>

          <li>
            <input type="radio" id="s-option-moyen" name="selector">
            <label for="s-option-moyen">Moyen</label>

            <div class="check"><div class="inside"></div></div>
          </li>

          <li>
            <input type="radio" id="t-option-difficile" name="selector">
            <label for="t-option-difficile">Difficile</label>

            <div class="check"><div class="inside"></div></div>
          </li>
        </ul>

        <h2>Choisissez une taille.</h2>
        <ul>
          <li>
            <input type="radio" id="f-option-2" name="selector">
            <label for="f-option-2">2</label>

            <div class="check"></div>
          </li>

          <li>
            <input type="radio" id="s-option-3" name="selector">
            <label for="s-option-3">3</label>

            <div class="check"><div class="inside"></div></div>
          </li>

          <li>
            <input type="radio" id="t-option-4" name="selector">
            <label for="t-option-4">4</label>

            <div class="check"><div class="inside"></div></div>
          </li>
        </ul>

        <input type="button" value="Générer la grille"/>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'HelloWorld'
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .container{
    display: block;
    position: relative;
    margin: 40px auto;
    height: auto;
    width: 50vw;
    padding: 20px;
  }


  .container ul{
    list-style: none;
    margin: 0;
    padding: 0;
    overflow: auto;
  }
  ul li{
    color: #AAAAAA;
    display: block;
    position: relative;
    float: left;
    width: 100%;
    height: 100px;
    border-bottom: 1px solid #333;
  }

  ul li input[type=radio]{
    position: absolute;
    visibility: hidden;
  }

  ul li label{
    display: block;
    position: relative;
    font-weight: 300;
    font-size: 1.35em;
    padding: 25px 25px 25px 80px;
    margin: 10px auto;
    height: 30px;
    z-index: 9;
    cursor: pointer;
    -webkit-transition: all 0.25s linear;
  }

  ul li:hover label{
    color: #0DFF92;
  }

  ul li .check{
    display: block;
    position: absolute;
    border: 5px solid #AAAAAA;
    border-radius: 100%;
    height: 25px;
    width: 25px;
    top: 30px;
    left: 20px;
    z-index: 5;
    transition: border .25s linear;
    -webkit-transition: border .25s linear;
  }

  ul li:hover .check {
    border: 5px solid #0DFF92;
  }

  ul li .check::before {
    display: block;
    position: absolute;
    content: '';
    border-radius: 100%;
    height: 15px;
    width: 15px;
    top: 5px;
    left: 5px;
    margin: auto;
    transition: background 0.25s linear;
    -webkit-transition: background 0.25s linear;
  }

  input[type=radio]:checked ~ .check {
    border: 5px solid #0DFF92;
  }

  input[type=radio]:checked ~ .check::before{
    background: #0DFF92;
  }

  input[type=radio]:checked ~ label{
    color: #0DFF92;
  }

h1, h2 {
  font-weight: normal;
}

a {
  color: #42b983;
}

  input[type="button"]{
    background-color: #0DFF92;
    color: #fff;
    margin-top: .625rem;
    padding: .75rem 2.5rem;
    box-shadow: 0px 4px 0px 0px #0DFF92;
    border-radius: 5px;
    border: 0;
    font-weight: bold;
    font-size: 1.375rem;
    letter-spacing: 0.28px;
    text-transform: uppercase;
    outline: none;
  :hover{
     box-shadow: 0px 3px 0px 0px #0DFF92;
     cursor: pointer;
     top: 1px;
     position: relative;
   }
  :active{
     box-shadow: 0px 0px 0px 0px #0DFF92;
     cursor: pointer;
     top: 4px;
     position: relative;

   }
  }
</style>
