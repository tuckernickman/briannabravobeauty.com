<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" integrity="sha256-46qynGAkLSFpVbEBog43gvNhfrOj+BmwXdxFgVK/Kvc=" crossorigin="anonymous" />  
  <link rel="stylesheet" href="/styles/photo.css">

  <!--Java-->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
    integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
  </script>
<link href='https://fonts.googleapis.com/css?family=Raleway:400,800,300' rel='stylesheet' type='text/css'>

</head>
<body>
<h3>Pure CSS carousels</h3>

<div class="carousel-container">
  <h2>slider</h2>
  
  <div class="carousel my-carousel carousel--translate">
    <ul  class="carousel my-carousel carousel--thumb">
    <input class="carousel__activator" type="radio" name="thumb" id="F" checked="checked"/>
    <input class="carousel__activator" type="radio" name="thumb" id="G"/>
    <input class="carousel__activator" type="radio" name="thumb" id="H"/>
    <input class="carousel__activator" type="radio" name="thumb" id="I"/>
    <input class="carousel__activator" type="radio" name="thumb" id="J"/>
    <div class="carousel__controls">
      <label class="carousel__control carousel__control--backward" for="J"></label>
      <label class="carousel__control carousel__control--forward" for="G"></label>
    </div>
    <div class="carousel__controls">
      <label class="carousel__control carousel__control--backward" for="F"></label>
      <label class="carousel__control carousel__control--forward" for="H"></label>
    </div>
    <div class="carousel__controls">
      <label class="carousel__control carousel__control--backward" for="G"></label>
      <label class="carousel__control carousel__control--forward" for="I"></label>
    </div>
    <div class="carousel__controls">
      <label class="carousel__control carousel__control--backward" for="H"></label>
      <label class="carousel__control carousel__control--forward" for="J"></label>
    </div>
    <div class="carousel__controls">
      <label class="carousel__control carousel__control--backward" for="I"></label>
      <label class="carousel__control carousel__control--forward" for="F"></label>
    </div>
    <div class="carousel__track">
      <li class="carousel__slide">
        <h1></h1>
      </li>
      <li class="carousel__slide">
        <h1></h1>
      </li>
      <li class="carousel__slide">
        <h1></h1>
      </li>
      <li class="carousel__slide">
        <h1></h1>
      </li>
      <li class="carousel__slide">
        <h1></h1>
      </li>
    </div>
    <div class="carousel__indicators">
      <label class="carousel__indicator" for="F"></label>
      <label class="carousel__indicator" for="G"></label>
      <label class="carousel__indicator" for="H"></label>
      <label class="carousel__indicator" for="I"></label>
      <label class="carousel__indicator" for="J"></label>
    </div>
</ul>
</div>
</div>
<!--
<div class="carousel-container">
  <h2>thumbnail indicators</h2>
  <ul class="carousel my-carousel carousel--thumb">
    <input class="carousel__activator" type="radio" id="K" name="thumb" checked="checked"/>
    <input class="carousel__activator" type="radio" id="L" name="thumb"/>
    <input class="carousel__activator" type="radio" id="M" name="thumb"/>
    <input class="carousel__activator" type="radio" id="N" name="thumb"/>
    <input class="carousel__activator" type="radio" id="O" name="thumb"/>
    <div class="carousel__controls">
      <label class="carousel__control carousel__control--backward" for="O"></label>
      <label class="carousel__control carousel__control--forward" for="L"></label>
    </div>
    <div class="carousel__controls">
      <label class="carousel__control carousel__control--backward" for="K"></label>
      <label class="carousel__control carousel__control--forward" for="M"></label>
    </div>
    <div class="carousel__controls">
      <label class="carousel__control carousel__control--backward" for="L"></label>
      <label class="carousel__control carousel__control--forward" for="N"></label>
    </div>
    <div class="carousel__controls">
      <label class="carousel__control carousel__control--backward" for="M"></label>
      <label class="carousel__control carousel__control--forward" for="O"></label>
    </div>
    <div class="carousel__controls">
      <label class="carousel__control carousel__control--backward" for="N"></label>
      <label class="carousel__control carousel__control--forward" for="K"></label>
    </div>
    <li class="carousel__slide">
      <h1>K</h1>
    </li>
    <li class="carousel__slide">
      <h1>L</h1>
    </li>
    <li class="carousel__slide">
      <h1>M</h1>
    </li>
    <li class="carousel__slide">
      <h1>N</h1>
    </li>
    <li class="carousel__slide">
      <h1>O</h1>
    </li>
    <div class="carousel__indicators">
      <label class="carousel__indicator" for="K"></label>
      <label class="carousel__indicator" for="L"></label>
      <label class="carousel__indicator" for="M"></label>
      <label class="carousel__indicator" for="N"></label>
      <label class="carousel__indicator" for="O"></label>
    </div>
  </ul>
</div>

  -->
    
  </ul>
</div>
</body>
</html>