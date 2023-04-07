
const refrescarMapaConCategoria = categoria => {
    fetch(`coordenadas.php?categoria=hombre`)
        .then(datos => datos.json())
        .then(coordenadasConIcono => {
            dibujarMarcadoresEnMapa(coordenadasConIcono);
        });

    fetch(`coordenadas.php?categoria=mujer`)
        .then(datos => datos.json())
        .then(coordenadasConIcono => {
            dibujarMarcadoresEnMapa(coordenadasConIcono);
        });

    fetch(`coordenadas.php?categoria=current_user`)
        .then(datos => datos.json())
        .then(coordenadasConIcono => {
            dibujarMarcadoresEnMapa(coordenadasConIcono);
        });

};


const dibujarMarcadoresEnMapa = coordenadasConIcono => {

    const { icono, coordenadas } = coordenadasConIcono;

    const marcadores = [];

    
    coordenadas.forEach(coordenada => {
        let marcador = new ol.Feature({
            geometry: new ol.geom.Point(
                ol.proj.fromLonLat([coordenada.longitud, coordenada.latitud])
            ),
        });
        marcador.setStyle(new ol.style.Style({
            image: new ol.style.Icon(({
                src: icono,
            }))
        }));
        marcadores.push(marcador);
    });
    capa = new ol.layer.Vector({
        source: new ol.source.Vector({
            features: marcadores,
        }),
    });
    mapa.addLayer(capa);

};



refrescarMapaConCategoria();
