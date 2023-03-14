/*let marcador = new ol.Feature({
    geometry: new ol.geom.Point(
        ol.proj.fromLonLat([-3.728839, 40.452273])// En d�nde se va a ubicar
    ),
});

// Agregamos icono
marcador.setStyle(new ol.style.Style({
    image: new ol.style.Icon({
        src: "persona.png",
    })
}));*/

// marcadores debe ser un arreglo
/*const marcadores = []; // Arreglo para que se puedan agregar otros m�s tarde*/


//---------------------------------------------------------------------------------------------

/*const refrescarMapaConCategoria = categoria => {
    fetch(`coordenadas.php?categoria=${categoria}`)
        .then(datos => datos.json())
        .then(coordenadasConIcono => {
            dibujarMarcadoresEnMapa(coordenadasConIcono);
        });
};*/

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

    //....................................................................

  

    //....................................................................

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
//---------------------------------------------------------------------------------------------

/*
marcadores.push(marcador);// Agregamos el marcador al arreglo

let capa = new ol.layer.Vector({
    source: new ol.source.Vector({
        features: marcadores, // A la capa le ponemos los marcadores
    }),
});
// Y agregamos la capa al mapa
mapa.addLayer(capa);*/