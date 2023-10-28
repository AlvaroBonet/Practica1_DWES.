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
    
    // var_dump($controller);
    // var_dump($function);

    /**
     * Una vez tengo el formato correcto de mi controllador y de mi funcion damos los siguientes paso:
     * 1. Comprobar que existe el controlador.
     * Opciones:
     * - ¿Existe un fichero con nombre ClienteController?
     * - ¿Existe una clase con nombre ClienteContoller?
     * 
     * 2. Comprobar que la existe la funcion dentro del controlador
     */

    /**
      * Comprobamos si existe la classe con el nombre $controller.
      * - Si existe, compruebo si hay una funcion dentro con el nombre $function
      * - Si no existe, debemos hacer otra cosa (ERRRORRRR)
      */
    if (class_exists($controller)) {
        
        if(method_exists($controller, $function)){
            if(isset($_GET['id'])){
                # Introducir elementos array para especificar funcion concreta
                $id = $_GET['id'];
                call_user_func($controller .'::'.$function, $id);
            }else{
                // var_dump('existe '. $function);
            // exit();
            # Ejecutar la funcion que esta dentro del controlador
            /**
             * OPCIONES
             * - ClienteController->index();       -->Funcion static
             * - new ClienteController()->index(); -->Funcion NO static
             */
            # Esta llamada ejecuta la funcion 'index' (contenida en $function) que esta dentro de
            # ClientesController (el controlador $controller)
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


// Necesito transformar el contenido de la variable 'controller' en ClienteController

/**
 * Necesito abrir la funcion index del controlador ClienteController
 */

 /**
  * NOTA: SOBRE VOLVER AL INDEX.PHP
  * A la hora de ir de una vista cualquiera al index.php (controlador frontal),
  * revisar el uso de unset y el uso de parse_url para retirar las variables 
  * de la URL y dejar unicamente el index.php sin interrogacion.
  */
?>