<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Responsive Mega Menu - Navigation</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="css/cabecera.css">
<link rel="stylesheet" href="https://kit.fontawesome.com/e2e2d067dc.css" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/e2e2d067dc.js" crossorigin="anonymous"></script>


</head>
<body>
<!-- partial:index.partial.html -->
<div id="header">
  <div class="logo">
  <img class ="logo"src= "img/logo.png">
  </div>  
  <nav>
    
    <ul>
      <li>
        <a href=""><i class="fa-solid fa-bell"></i></a>
      </li>
      <li class="dropdown">
        <a href=""><i class="fa-solid fa-bars"></i></a>
          <ul>
            <li><a href="#">Canciones</a></li>
            <li><a href="#">MatchList</a></li>
          </ul>        
      </li>    
      <li>
        <a href=""><i class="fa-solid fa-user"></i></a>
      </li>
   
    </ul>
    
  </nav>
</div>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script>
$('#header').prepend('<div id="menu-icon"><span class="first"></span><span class="second"></span><span class="third"></span></div>');
	
	$("#menu-icon").on("click", function(){
    $("nav").slideToggle();
    $(this).toggleClass("active");
});


  </script>
   
</body>
</html>
