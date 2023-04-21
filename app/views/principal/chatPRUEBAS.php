<!DOCTYPE html>
<html lang="es">

  <head>
    <meta charset="UTF-8">
    <title>Chat de Pruebas</title>
  </head>

  <body>
    <div style="display: flex">

        <div style="flex: 1">
          <h2>Lista de Contactos</h2>
          <ul>
            <li>Contacto 1</li>
            <li>Contacto 2</li>
            <li>Contacto 3</li>
          </ul>
        </div>

        <div style="flex: 3">
          <h2>Chat</h2>
          <div id="chat-messages"></div>
          <form>
            <input type="text" id="message-input" placeholder="Escribe un mensaje">
            <button type="submit">Enviar</button>
          </form>
        </div>
        
    </div>
  </body>

</html>
