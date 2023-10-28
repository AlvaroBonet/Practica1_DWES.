<?php
require_once 'Controller.php';
require_once 'db/datos.php';

class JuegoController implements Controller{

    /**
     * Funcion que recoge todos los juegos y los muestra en una vista
     */
    
    public static function index(){

        /**
         * En caso de en la URL tener genero debido al boton lo recojo y se lo meto a $juegos
         * En caso de no haner y queramos sacar todos se lo paso sin mas
         * Luego en caso de tener genero uso solo un foreach 
         * En caso de no tener genero doble foreach 
         */
        if (isset($_GET['genero'])) {
            $juegos = $GLOBALS['Juegos'][$_GET['genero']];
        }else {
            $juegos = $GLOBALS['Juegos'];
        }

        # Comprobamos si hay un error antes de enviarlo a la vista
        if(isset($GLOBALS['error'])){
            $error = $GLOBALS['error'];
        }
        include 'view/juego/index.php';
    }

    public static function create(){
        include 'view/juego/create.php';
    }

    public static function save(){
        /*var_dump($_POST);
        $nombre = $_POST['nombre'];
        $dni = $_POST['dni'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        exit();*/
        JuegoController::index();
    }

    public static function edit($id){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $genero = $_GET['genero'];
            $juegos = $GLOBALS['Juegos'];
            foreach ($juegos as $key => $value) {
            if($key == $id){
                #PINTO
                $juegos = $value;
            }
        }
        }
        include 'view/juego/edit.php';
    }

    public static function update($id){

        /**
         * PASOS
         * 1. Recoger el valor $id y comprobar si lo recibo correctamente
         * 2. Comprobar que recibo los valores del formulario.
         * 3. Cambiar los elementos del juego
         * 4. Retornar al index de juegos
         */
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $stock = $_POST['stock'];
        $precio = $_POST['precio'];
        $genero = $_POST['genero'];

        /**
         * Necesito actualizar marca, modelo y matricula
         * del array de juegos.
         * ¿Como lo hago?
         * 1. Recorre el array de juegos (foreach).
         * 2. El juego con clave $id es el que modifico.
         * 3. Actualizo DIRECTAMENTE los elementos de ese juego.
         * 4. Volver al index
         */
        foreach ($GLOBALS['Juegos'] as $genero => $nombre) { 
            foreach ($nombre as $id => $value) {
                $GLOBALS['Juegos'][$nombre][$value['nombre']] = $nombre;
                $GLOBALS['Juegos'][$nombre][$value['descripcion']] = $descripcion;
                $GLOBALS['Juegos'][$nombre][$value['stock']] = $stock;
                $GLOBALS['Juegos'][$nombre][$value['precio']] = $precio;
                $GLOBALS['Juegos'][$nombre] = $genero;
            }
        }
        JuegoController::index();
    }

    public static function destroy($id){
        
        /**
         * En destroy eliminamos el elemento del array $GLOBALS['Juegos']
         * que tenga el $id recibido.
         * 
         * PASOS
         * 1. Recibod id?
         * 2. Existe el id en juegos? (metodo de php para ver si esta contenido?)
         * 2.1. Si existe, elimino. (metodo de php para eliminar?)
         * 2.2. Si no existe, no elimino (posible mensaje de retorno de error por no existir)
         */

        /**
          * Utilizamos el metodo array_key_exists(CLAVE, ARRAY)
          *
          * array_key_exists() vs isset()
          *
          * isset() no retorna true para claves de array que correspondan a un valor null, mientras que array_key_exists() si lo hace.
          */

        //   var_dump(array_key_exists($id, $GLOBALS['Juegos']));
        //   exit();

    # Si existe el id que recibo, elimino
        if(array_key_exists($id, $GLOBALS['Juegos'])){
            // var_dump($GLOBALS['Juegos']);
            unset($GLOBALS['Juegos'][$id]);
            // var_dump($GLOBALS['Juegos']);
        }else{
            # Aqui la respuesta cuando no existe y por tanto no puedo eliminar
            $GLOBALS['error'] = "No se encuentra el juego";
        }
        JuegoController::index();
    }
}
?>