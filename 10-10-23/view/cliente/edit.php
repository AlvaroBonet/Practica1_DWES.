<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <main>
            <a href="?controller=cliente&function=index">Atras</a>  
            <form method="post" action="index.php?controller=cliente&function=update&id=<?php echo $id ?>">
                <label for="nombre">nombre</label>
                <input value="<?php echo $GLOBALS['Clientes'][$id]['nombre']?>" type="text" id="nombre" name="nombre" /><br />
                <label for="dni">dni</label>
                <input value="<?php echo $GLOBALS['Clientes'][$id]['dni']?>" type="text" id="dni" name="dni" /><br />
                <label for="telefono">telefono</label>
                <input value="<?php echo $GLOBALS['Clientes'][$id]['telefono']?>" type="text" id="telefono" name="telefono" /><br />
                <label for="correo">correo</label>
                <input value="<?php echo $GLOBALS['Clientes'][$id]['correo']?>" type="text" id="correo" name="correo" /><br />
                <br />
                <button type="submit" id="enviar">Enviar</button>
            </form>
        </main>
</body>
</html>