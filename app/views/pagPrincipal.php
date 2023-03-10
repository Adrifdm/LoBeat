<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mapa</title>

    <link rel="stylesheet" href=" https://unpkg.com/openlayers@4.6.5/dist/ol.css">
    <link rel="stylesheet" href="../../public/assets/css/mapa.css">
    <script type="text/javascript" src="https://unpkg.com/openlayers@4.6.5/dist/ol.js"></script>

</head>
<body>
    <?php
		require("cabecera.php");
	?>
    <main role="main" class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="titulo">Conoce a gente cerca de ti</h1>
            </div>
            <div class="col-12">
                <div id="mapa"></div>
            </div>
        </div>
    </main>
    <?php
		require("rep.php");
	?>

    <script type="text/javascript" src="../../public/assets/js/mapa.js"></script>
    <script type="text/javascript" src="../../public/assets/js/marcador.js"></script>
</body>
</html>