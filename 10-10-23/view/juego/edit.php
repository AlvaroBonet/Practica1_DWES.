<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <main>
            <a href="?controller=juego&function=index">Atras</a>  
            <form method="post" action="index.php?controller=juego&function=update&id=<?php echo $id ?>">
                <label for="nombre">nombre</label>
                <input value="<?php echo $GLOBALS['Juegos'][$genero][$id]['nombre']?>" type="text" id="nombre" name="nombre" /><br />
                <label for="descripcion">descripcion</label>
                <input value="<?php echo $GLOBALS['Juegos'][$genero][$id]['descripcion']?>" type="text" id="descripcion" name="descripcion" /><br />
                <label for="stock">stock</label>
                <input value="<?php echo $GLOBALS['Juegos'][$genero][$id]['stock']?>" type="text" id="stock" name="stock" /><br />
                <label for="precio">precio</label>
                <input value="<?php echo $GLOBALS['Juegos'][$genero][$id]['precio']?>" type="text" id="precio" name="precio" /><br />
                <label for="genero">genero</label>
                <input value="<?php echo $GLOBALS['Juegos'][$genero]?>" type="text" id="genero" name="genero" /><br />
                <br />
                <button type="submit" id="enviar">Enviar</button>
            </form>
        </main>
</body>
</html>