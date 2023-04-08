const LATITUD_CENTRO = LATITUD;
const LONGITUD_CENTRO = LONGITUD;
ZOOM = 15;

const mapa = new ol.Map({
    target: 'mapa',
    layers: [
        new ol.layer.Tile({
            source: new ol.source.OSM()
        })
    ],
    view: new ol.View({
        center: ol.proj.fromLonLat([LONGITUD_CENTRO, LATITUD_CENTRO]),
        zoom: ZOOM,
    })
});
