<?php
	session_start();

    if($_SESSION["is_logged"] != true){
    
        header('Location: ../perfil/logout.php'); 
        
        exit;
    } 
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mapa</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
    <link rel="stylesheet" href=" https://unpkg.com/openlayers@4.6.5/dist/ol.css">
    <link rel="stylesheet" href="../../../public/assets/css/mapa.css">
    
    <script type="text/javascript" src="https://unpkg.com/openlayers@4.6.5/dist/ol.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>


</head>
<body>
    <?php
		require("../comun/cabecera.php");
	?>
    <div id="mapa"></div> 
    <?php
		//require("../comun/rep.php");
	?>
</body>
    <script type="text/javascript">
        const LATITUD = <?php echo $_SESSION["logged_latitud"]; ?>;
        const LONGITUD = <?php echo $_SESSION["logged_longitud"]; ?>;
    </script>

    <script type="text/javascript" src="../../../public/assets/js/mapa.js"></script>
    <script type="text/javascript" src="../../../public/assets/js/marcador.js"></script>

</html>