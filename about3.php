<!DOCTYPE html>
<html>
<head>

<style>

.flip-box {
  background-color: transparent;
  width: 300px;
  height: 350px;
  perspective: 1000px;
}

.flip-box-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.8s;
  transform-style: preserve-3d;
}

.flip-box:hover .flip-box-inner {
  transform: rotateY(180deg);
}
 
.flip-box-front, .flip-box-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}


.flip-box-back {
  transform: rotateY(180deg);
}
</style>
</head>
<body>

<section> 
    
  <div id="_cf" class="container col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <h5 class="card-title light-text">About me</h5>
      <p class="card-text light-text">    
        I est​ablished my little business in 2018 based on my love for not only makeup, but the way I felt in it. <br>            I'm a HMUA who specializes in boudoir and bridal. <br>
        I'm all about pushing the world's expectations of us as womxn. <br>
        They expect us to be perfect, perfect body, perfect skin, perfect values. <br>
        If you're a mom, you have to be a good mom, but be hot. Be natural, but your natural needs to be flawless. <br>
        Honey, believe me when I tell you... you are worth so much more than expectations. <br>
        Check out my pricing and feel free to contact me with any questions!
       </p>
    </div> 
  </div>   
                
</section>

<div class="flip-box">
  <div class="flip-box-inner">
    <div class="flip-box-front">
      <img src="/assets/img/brianna1.jpg" alt="photo of brianna" style="width:250px;height:350px">
    </div>
    <div class="flip-box">
    <div class="flip-box-inner">
    <div class="flip-box-back">
    <img src="/assets/img/brianna2.jpg" alt="photo of brianna" style="width:250px;height:350px">
    </div>
    </div>
</div>
</div>
</div>
 

</body>
</html>
