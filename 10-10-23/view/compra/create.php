<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>
<body>
    <main>
    <a href="?controller=compra&function=index">Atras</a>
    <form method="post" action="index.php?controller=compra&function=save">
        <label for="cliente_dni">cliente_dni</label>
        <input type="text" id="cliente_dni" name="cliente_dni" /><br />
        <label for="juego_id">juego_id</label>
        <input type="text" id="juego_id" name="juego_id" /><br />
        <label for="precio">precio</label>
        <input type="text" id="precio" name="precio" /><br />
        <label for="cantidad">cantidad</label>
        <input type="text" id="cantidad" name="cantidad" /><br />
        <label for="fecha">fecha</label>
        <input type="text" id="fecha" name="fecha" /><br />
        <br />
        <button id="enviar">Enviar</button>
    </form>
    </main>
</body>
</html>