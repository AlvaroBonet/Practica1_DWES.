<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>
<body>
    <main>
    <a href="?controller=cliente&function=index">Atras</a>
    <form method="post" action="index.php?controller=cliente&function=save">
        <label for="nombre">nombre</label>
        <input type="text" id="nombre" name="nombre" /><br />
        <label for="dni">dni</label>
        <input type="text" id="dni" name="dni" /><br />
        <label for="telefono">telefono</label>
        <input type="text" id="telefono" name="telefono" /><br />
        <label for="correo">correo</label>
        <input type="text" id="correo" name="correo" /><br />
        <br />
        <button id="enviar">Enviar</button>
    </form>
    </main>
</body>
</html>