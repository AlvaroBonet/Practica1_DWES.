<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
            <h1>INDEX de Compras</h1>
            <a href="index.php">Ir a inicio</a>
        </header>
        <main>
            <a href="?controller=compra&function=create">Crear compra</a>
            <table>
                <caption>Compras</caption>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Cliente_dni</th>
                        <th>Juego_id</th>
                        <th>Precio</th>
                        <th>Cantidad</th> 
                        <th>Total</th>                       
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    if(isset($GLOBALS['Compras'])){  
                        foreach ($GLOBALS['Compras'] as $id => $value) {
                            echo '<tr>';
                            echo '<td>'. ($id + 1) .'</td>';
                            echo '<td>'.$value['cliente_dni'] .'</td>';
                            echo '<td>'.$nombre_juego.'</td>';
                            echo '<td>'.$value['precio'] .'</td>';
                            echo '<td>'.$value['cantidad'] .'</td>'; 
                            echo '<td>'. ($value['precio'] * $value['cantidad']) .'</td>';
                            echo '<td>'.$value['fecha'] .'</td>';
                            echo '<td>  <a href="?controller=compra&function=edit&id='.$id.'">Editar</a>
                                        <a href="?controller=compra&function=destroy&id='.$id.'">Eliminar</a></td>';
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