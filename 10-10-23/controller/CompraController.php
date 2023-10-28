<?php
require_once 'Controller.php';
require_once 'db/datos.php';

class CompraController implements Controller{

    /**
     * Funcion que recoge todos los compras y los muestra en una vista
     */
    public static function index(){
        # Recogemos todos los compras y los guardamos en una variable
        # NOTA: lo suyo es ir al modelo, recoger los datos de BD y guardarlos en variable
        $compras = $GLOBALS['compras'];
        $juegos = $GLOBALS['juegos'];

        # Comprobamos si hay un error antes de enviarlo a la vista
        if(isset($GLOBALS['error'])){
            $error = $GLOBALS['error'];
        }
        
        include 'view/compra/index.php';
    }

    public static function create(){
        include 'view/compra/create.php';
    }

    public static function save(){
        /*var_dump($_POST);
        $nombre = $_POST['nombre'];
        $dni = $_POST['dni'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        exit();*/
        CompraController::index();
    }

    public static function edit($id){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $compras = $GLOBALS['Compras'];
            foreach ($compras as $key => $value) {
            if($key == $id){
                #PINTO
                $compras = $value;
            }
        }
        }
        include 'view/compra/edit.php';
    }

    public static function update($id){

        /**
         * PASOS
         * 1. Recoger el valor $id y comprobar si lo recibo correctamente
         * 2. Comprobar que recibo los valores del formulario.
         * 3. Cambiar los elementos del compra
         * 4. Retornar al index de compras
         */

        $cliente_dni = $_POST['cliente_dni'];
        $juego_id = $_POST['juego_id'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
        $fecha = $_POST['fecha'];

        /**
         * Necesito actualizar marca, modelo y matricula
         * del array de compras.
         * ¿Como lo hago?
         * 1. Recorre el array de compras (foreach).
         * 2. El compra con clave $id es el que modifico.
         * 3. Actualizo DIRECTAMENTE los elementos de ese compra.
         * 4. Volver al index
         */
        foreach ($GLOBALS['Compras'] as $key => $value) {
            if($key == $id){
                # Si la clave es la misma que el id, ACTUALIZO
                $GLOBALS['Compras'][$key]['cliente_dni'] = $cliente_dni;
                $GLOBALS['Compras'][$key]['juego_id'] = $juego_id;
                $GLOBALS['Compras'][$key]['precio'] = $precio;
                $GLOBALS['Compras'][$key]['cantidad'] = $cantidad;
                $GLOBALS['Compras'][$key]['fecha'] = $fecha;
            }else{
                # OPCIONAL: mensaje de retorno de NO PODER ACTUALIZAR por no encontrar el compra.
            }
        }
        CompraController::index();
    }

    public static function destroy($id){
        
        /**
         * En destroy eliminamos el elemento del array $GLOBALS['compras']
         * que tenga el $id recibido.
         * 
         * PASOS
         * 1. Recibod id?
         * 2. Existe el id en compras? (metodo de php para ver si esta contenido?)
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

        //   var_dump(array_key_exists($id, $GLOBALS['compras']));
        //   exit();

    # Si existe el id que recibo, elimino
        if(array_key_exists($id, $GLOBALS['Compras'])){
            // var_dump($GLOBALS['compras']);
            unset($GLOBALS['Compras'][$id]);
            // var_dump($GLOBALS['compras']);
        }else{
            # Aqui la respuesta cuando no existe y por tanto no puedo eliminar
            $GLOBALS['error'] = "No se encuentra el compra";
        }
        CompraController::index();
    }
}
?>