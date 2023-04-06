
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(muestraPosicion, errorPosicion);
}

function muestraPosicion(pos){
    const latitud = pos.coords.latitude;
    const longitud = pos.coords.longitude;
    window.location.href = "Ubicacion.php?latitud=" + latitud + "&longitud=" + longitud;
}

function errorPosicion(err) {
    switch(err.code) {
        case err.PERMISSION_DENIED:
            alert("Debe permitir el acceso a su posición para que la aplicación pueda funcionar");
            break;
        case err.POSITION_UNAVAILABLE:
            alert("La información sobre su posición actual no está disponible");
            break;
        case err.TIMEOUT:
            alert("No he podido obtener su posición en un tiempo razonable");
            break;
        default:
            alert("Se ha producido un error desconocido al intentar obtener la posición actual");
            break;
    }
}

