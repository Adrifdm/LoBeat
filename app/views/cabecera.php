<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Responsive Mega Menu - Navigation</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="../../public/assets/css/cabecera.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<script src="https://kit.fontawesome.com/e2e2d067dc.js" crossorigin="anonymous"></script>


</head>
<body>
<!-- partial:index.partial.html -->
<div id="header">
  <div class="logo">
    <img class ="logo"src= "../../public/assets/img/logo.png">
  </div>  
  <nav>
    
    <ul>
    <li class="dropdown">
        <a href=""><i class="bi bi-list"></i></a>
          <ul>
            <li><a href="#">Canciones</a></li>
            <li><a href="#">MatchList</a></li>
          </ul>        
      </li>
      <li>
        <a href=""><i class="bi bi-bell-fill"></i></a>

      </li>
          
      <li>
        <a href="profile.php"><i class="bi bi-person-fill"></i></a>

        <a href="logout.php"><i class="fa fa-power-off"></i>

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
