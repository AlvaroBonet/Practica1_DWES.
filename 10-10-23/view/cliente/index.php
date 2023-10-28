<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
            <h1>INDEX de Clientes</h1>
            <a href="index.php">Ir a inicio</a>
        </header>
        <main>
            <a href="?controller=cliente&function=create">Crear cliente</a>
            <table>
                <caption>
                    Clientes
                    <a class="btn" href="?controller=cliente&function=index&orden=asc">Asc</a>
                    <a class="btn" href="?controller=cliente&function=index&orden=des">Desc</a>
                </caption>
                <thead>
                    <tr>
                        <th>nombre</th>
                        <th>dni</th>
                        <th>telefono</th>
                        <th>correo</th>
                        <th>acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if(isset($clientes)){ 
                        foreach ($clientes as $id => $value) {
                            echo '<tr>';
                            echo '<td>'.$value['nombre'] .'</td>';
                            echo '<td>'.$value['dni'] .'</td>';
                            echo '<td>'.$value['telefono'] .'</td>';
                            echo '<td>'.$value['correo'] .'</td>';
                            echo '<td>  <a href="?controller=cliente&function=edit&id='.$id.'">Editar</a>
                                        <a href="?controller=cliente&function=destroy&id='.$id.'">Eliminar</a></td>';
                            echo '</tr>';
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