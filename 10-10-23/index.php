<?php
# Es necesario importar todos los controladores disponibles por si es necesario acceder a ellos
require_once 'controller/ClienteController.php';
require_once 'controller/JuegoController.php';
require_once 'controller/CompraController.php';
require_once 'db/datos.php'; # Importo los datos de prueba

/**
 * Utilizamos $GLOBALS para establecer variables, datos o contenido accesible desde TODO mi proyecto.
 * En este caso, recogemos el contenido de $datos y lo almacenamos en una variable accesible desde todo el proyecto.
 * SINTAXIS:
 * $GLOBALS['nombre'] = contenido;
 */
$GLOBALS['Clientes'] = $datos['Clientes'];
$GLOBALS['Juegos'] = $datos['Juegos'];
$GLOBALS['Compras'] = $datos['Compras'];

/**
 * En este paso recogemos las variables de la URL (en caso de existan y sean correctas)
 * y llamamos a la funcion del controlador correspondiente.
 */
if(isset($_GET['controller']) && isset($_GET['function'])){
    # $controller contiene 'cliente'
    $controller = $_GET['controller'];

    # $controller contiene 'clienteController'
    $controller = $controller.'Controller';

    # $controller contiene 'ClienteController'
    $controller = ucfirst($controller);

    # $function contiene 'index'
    $function = $_GET['function'];
    
    #existe?
    if (class_exists($controller)) {
        #existe funcion?
        if(method_exists($controller, $function)){
            if(isset($_GET['id'])){
                # Introducir elementos array para especificar funcion concreta
                $id = $_GET['id'];
                call_user_func($controller .'::'.$function, $id);
            }else{
                call_user_func($controller .'::'.$function);
            }
            
        }else{
            include('view/error/error.html');            
        }
    }else{
        include('view/error/error.html');
    }
}else{
    # En este caso no existen controller y function, por tanto NO es un error.
    # Debemos buscar una solucion para lanzar una vista
    include('view/index.php');
}

?>