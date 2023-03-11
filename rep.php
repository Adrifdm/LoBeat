
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Responsive Mega Menu - Navigation</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="css/reproc.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body>

<div class = "barra_sonido">
    <div class ="wave"> 
      <div class="wave1"></div>
      <div class="wave1"></div>
      <div class="wave1"></div>
    </div>
    <img src = "img/img.jpg" alt = Arcangel>
    <h5> La Jumpa
       <div class="subtitulo"> Arcangel ft Bad Bunny</div>
    </h5>
    <div class = "icon"> 
      <i class="bi bi-skip-start-fill"></i>
      <i class="bi bi-play-fill"></i>
      <i class="bi bi-skip-end-fill"></i>
    </div>
    <span id="comienzo">0:00</span> 
    <div class="barra">
      <input type= "range" id="seek" min = "0" value = "0" max= "100">
       <div class="barra2" id="barra2">
        <div class="punto"></div>
       </div>
    </div>
    <span id="final">4:15</span> 
    <div class="vol">
         <i class="bi bi-volume-down-fill" id = "vol_icon"></i>
         <input type= "range" id="vol" min = "0"  max= "100">
         <div class="barra_vol"></div>
         <div class="punto" id="puntovol"></div>
    </div>

</div>

</html>