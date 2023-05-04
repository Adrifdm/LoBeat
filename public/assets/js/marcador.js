

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

    const { icono, coordenadas, nombre, genero, descripcion } = coordenadasConIcono;

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
            'nombre': nombre,
            'genero' : genero,
            'descripcion' : descripcion,
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
        const { icono, coordenadas, nombre, genero, descripcion } = usuario;

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
                'nombre': nombre,
                'genero' : genero,
                'descripcion' : descripcion,
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
/*
mapa.on('click', function(evt) {
    var feature = mapa.forEachFeatureAtPixel(evt.pixel, function(feature) {
        return feature;
    });
    if (feature) {
        var propiedades = feature.getProperties();
        const contenido = `<p>Nombre: ${propiedades.nombre}</p>
        <p>Género: ${propiedades.genero}</p>
        <p>Descripción: ${propiedades.descripcion}</p>`;

        Swal.fire({
            iconHtml: '<i class="fa fa-user-circle" aria-hidden="true"></i>',            
            title: 'Información del usuario',
            html: contenido,
            confirmButtonText: 'OK'
        });
    }
});*/

mapa.on('click', function(evt) {
    var feature = mapa.forEachFeatureAtPixel(evt.pixel, function(feature) {
      return feature;
    });
    if (feature) {
        var propiedades = feature.getProperties();

        console.log("NATESSS");
        location.reload(true);
        console.log("DESPUEEES");

        fetch(`pagPrincipal.php?nombre=` + encodeURIComponent(propiedades.nombre) + '&genero=' + encodeURIComponent(propiedades.genero) + '&descripcion=' + encodeURIComponent(propiedades.descripcion) + '&mostrar=si')
        .catch(error => {
          console.error('Error al enviar datos:', error);
        });
       
        location.reload(true);

    }
  });
  

refrescarMapaConCategoria();
