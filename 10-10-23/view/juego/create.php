<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>
<body>
    <main>
    <a href="?controller=juego&function=index">Atras</a>
    <form method="post" action="index.php?controller=juego&function=save">
        <label for="nombre">nombre</label>
        <input type="text" id="nombre" name="nombre" /><br />
        <label for="descripcion">descripcion</label>
        <input type="text" id="descripcion" name="descripcion" /><br />
        <label for="stock">stock</label>
        <input type="text" id="stock" name="stock" /><br />
        <label for="precio">precio</label>
        <input type="text" id="precio" name="precio" /><br />
        <label for="genero">genero</label>
        <input type="text" id="genero" name="genero" /><br />
        <br />
        <button id="enviar">Enviar</button>
    </form>
    </main>
</body>
</html>