

const refrescarMapaConCategoria = categoria => {
   

    fetch(`coordenadas.php?categoria=resto`)
        .then(datos => datos.json())
        .then(coordenadasConIcono => {
           dibujarMarcadoresEnMapaResto(coordenadasConIcono);
        });
        

    fetch(`coordenadas.php?categoria=current_user`)
        .then(datos => datos.json())
        .then(coordenadasConIcono => {
            console.log(coordenadasConIcono);
            dibujarMarcadoresEnMapa(coordenadasConIcono);
        });

};


const dibujarMarcadoresEnMapa = coordenadasConIcono => {

    const { icono, coordenadas, id } = coordenadasConIcono;

    let capa; 

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

        marcador.setProperties({
            'id' : id,
        });

        marcadores.push(marcador);
    });

    capa = new ol.layer.Vector({
        source: new ol.source.Vector({
            features: marcadores,
        }),
    });
    mapa.addLayer(capa);

};

const dibujarMarcadoresEnMapaResto = coordenadasConIcono => {
    const marcadores = [];

    coordenadasConIcono.forEach(usuario => {
        const { icono, coordenadas, id } = usuario;

        coordenadas.forEach(coordenada => {
            let marcador = new ol.Feature({
                geometry: new ol.geom.Point(
                    ol.proj.fromLonLat([coordenada.longitud, coordenada.latitud])
                ),
            });

            marcador.setStyle(new ol.style.Style({
                image: new ol.style.Icon({
                    src: icono,
                })
            }));

            marcador.setProperties({
                'id' : id,
            });
            
            marcadores.push(marcador);
        });
    });

    const sourceMarcadores = new ol.source.Vector({
        features: marcadores,
    });

    const capaMarcadores = new ol.layer.Vector({
        source: sourceMarcadores,
        style: function(feature) {
            return new ol.style.Style({
                image: new ol.style.Icon({
                    src: feature.get('icono'),
                }),
            });
        },
    });
    mapa.addLayer(capaMarcadores);
    
    
};

  mapa.on('click', function(evt) {
    var feature = mapa.forEachFeatureAtPixel(evt.pixel, function(feature) {
      return feature;
    });
    if (feature) {
        var propiedades = feature.getProperties();

        fetch(`pagPrincipal.php?id=` + encodeURIComponent(propiedades.id))
        .catch(error => {
          console.error('Error al enviar datos:', error);
        });

       window.location.href = "pagPrincipal.php";

       
    }
  });
  

refrescarMapaConCategoria();
