<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
            <h1>INDEX de Juegos</h1>
            <a href="index.php">Ir a inicio</a>
        </header>
        <main>
            <a href="?controller=juego&function=create">Crear Juego</a>
            <button type="submit"> <a href="?controller=juego&function=index&genero=Accion">Accion </a></button>
            <button type="submit"> <a href="?controller=juego&function=index&genero=Aventura">Aventura</a></button>
            <button type="submit"> <a href="?controller=juego&function=index&genero=Deportes">Deportes</a></button>
            <button type="submit"> <a href="?controller=juego&function=index">Todos</a></button>
            <table>
                <caption>Juegos</caption>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>nombre</th>
                        <th>descripcion</th>
                        <th>stock</th>
                        <th>precio</th>
                        <th>genero</th>
                        <th>acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if (isset($_GET['genero'])) {
                        foreach ($juegos as $id => $value) {
                            echo '<tr>';
                            echo '<td>'. $value['id'] .'</td>';
                            echo '<td>'.$value['nombre'] .'</td>';
                            echo '<td>'.$value['descripcion'] .'</td>';
                            echo '<td>'.$value['stock'] .'</td>';
                            echo '<td>'.$value['precio'] .'</td>';
                            echo '<td>'. $_GET['genero'] .'</td>';
                            echo '<td>  <a href="?controller=juego&function=edit&id='.$value['id'].'">Editar</a>
                                        <a href="?controller=juego&function=destroy&id='.$value['id'].'">Eliminar</a></td>';
                            echo '</tr>';
                        }

                    }else {
                        foreach ($juegos as $genero => $nombre) {
                            foreach ($nombre as $id => $value) {
                                echo '<tr>';
                                echo '<td>'. $value['id'] .'</td>';
                                echo '<td>'.$value['nombre'] .'</td>';
                                echo '<td>'.$value['descripcion'] .'</td>';
                                echo '<td>'.$value['stock'] .'</td>';
                                echo '<td>'.$value['precio'] .'</td>';
                                echo '<td>'. $genero .'</td>';
                                echo '<td>  <a href="?controller=juego&function=edit&id='.$value['id'].'">Editar</a>
                                            <a href="?controller=juego&function=destroy&id='.$value['id'].'">Eliminar</a></td>';
                                echo '</tr>';
                            }
                        }
                    }
                        
                ?>
                </tbody>
            </table>  
            <?php
                if(isset($error)){
                    echo '<h3>' . $error . '</h3>';
                }   
                ?>       
        </main>
    </body>
</html>